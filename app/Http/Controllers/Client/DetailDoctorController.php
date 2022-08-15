<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Booking;
use App\Models\Shift;
use Illuminate\Support\Facades\Auth;
use phpDocumentor\Reflection\Types\Null_;
use PhpParser\Node\Expr\Cast\Bool_;

class DetailDoctorController extends Controller
{

    public function __construct()
    {
        $this->user = new User();
    }

    public function detailDoctor(Request $request, $id)
    {
        $doctorId = $this->user->getShiftDoctorDetail($id);
        $shiftDoctor = User::find($id)->shifts;
        return view('clients.detail_doctor', compact('doctorId', 'shiftDoctor'));
    }

    public function ajaxDetailDoctor(Request $request)
    {
        $output = '';
        $shifts = User::find($request->doctorId)->shifts()->where('date', '=', $request->selectDate)->get();

        if (count($shifts) > 0) {

            $output .= '<div class="checkbox-book d-flex flex-wrap justify-content-between">';
            foreach ($shifts as $key => $shift) {
                $output .= '<div class="checkbox-item p-2">
                        <input type="checkbox" name="chooseShift" id="checkboxOne' . $key . '"
                            value="' . $shift->id . '">
                        <label for="checkboxOne' . $key . '">' . $shift->name . '</label>
                        </div>';
            }
            $output .= '</div>';
            return Response($output);
        } else {
            $output .= '<div class="checkbox-book d-flex flex-wrap justify-content-center">
                            <h1>bác sĩ đã hết ca</h1>
                        </div>';
            return Response($output);
        }
    }

    public function booking(Request $request)
    {
        $booking = new Booking();

        $booking->doctor_id = $request->nameDoctor;
        $booking->patient_id = $request->namePatient;
        $booking->status = 1;
        $booking->date = $request->setTodaysDate;
        $booking->shiftId = $request->chooseShift;
        $booking->package_Id = 1;
        $booking->count = 1;
        $booking->save();
        return redirect()->route('detailPatient', $request->namePatient);
    }

    public function detailPatient($id)
    {

        $listBook = Booking::where('patient_id', '=', Auth::user()->id)->with('user','shift')->get();
        // dd($listBook);
        return view('clients.detail_patient', compact('listBook'));
    }

    public function ajaxStatusBooking(Request $request)
    {
        $output = '';
        if ($request->selectStatus == 1) {
            $output .= '<button id="status-booking" value="1" class="btn btn-warning">Pending</button>';
            return response($output);
        } elseif ($request->selectStatus == 2) {
            $output .= '<button id="status-booking" value="2" class="btn btn-success">Success</button>';
            return response($output);
        }  elseif ($request->selectStatus == 3) {
            $output .= '<button id="status-booking" value="3" class="btn btn-primary">Process</button>';
            return response($output);
        }
         else {
            $output .= '<button id="status-booking" value="4" class="btn btn-danger">Pending</button>';
            return response($output);
        }
    }

    public function deleteBooking($id) {
        Booking::find($id)->delete();
        return redirect()->route('detailPatient', Auth::user()->id);
    }
}
