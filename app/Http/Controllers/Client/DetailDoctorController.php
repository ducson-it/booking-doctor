<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Booking;
use App\Models\Doctor_Shift;
use App\Models\Shift;
use App\Models\User_package;
use Facade\Ignition\Support\Packagist\Package;
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
        $issetBooking = Booking::where('doctor_id', $request->doctorId)
            ->where('date', $request->selectDate)
            ->first();
        if (count($shifts) > 0) {
            $output .= '<div class="checkbox-book d-flex flex-wrap justify-content-between">';
            foreach ($shifts as $key => $shift) {
                if (!empty($issetBooking)) {
                    if ($issetBooking->doctor_id == $shift->pivot->doctor_id && $issetBooking->shiftId == $shift->pivot->shift_doctor_id && $issetBooking->date == $request->selectDate) {
                        $output .= '<div class="d-none checkbox-item p-2">
                        <input type="checkbox" disable name="chooseShift" id="checkboxOne' . $key . '"
                        value="' . $shift->id . '">

                            <label for="checkboxOne' . $key . '">' . $shift->name . '</label>
                            </div>';
                    } else {
                        $output .= '<div class="checkbox-item p-2">
                        <input type="checkbox" name="chooseShift" id="checkboxOne' . $key . '"
                            value="' . $shift->id . '">
                        <label for="checkboxOne' . $key . '">' . $shift->name . '</label>
                        </div>';
                    }
                } else {
                    $output .= '<div class="checkbox-item p-2">
                        <input type="checkbox" name="chooseShift" id="checkboxOne' . $key . '"
                            value="' . $shift->id . '">
                        <label for="checkboxOne' . $key . '">' . $shift->name . '</label>
                        </div>';
                }
            }
            $output .= '</div>';
        } else {
            $output .= '<div class="checkbox-book d-flex flex-wrap justify-content-center">
                            <h1>bác sĩ đã hết ca</h1>
                        </div>';
                    }
        return Response($output);
    }

    public function booking(Request $request)
    {
        if (!empty($request->chooseShift)) {
            // $itemPackage = User_package::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->first();
            // if (!empty($itemPackage)) {
            //     if ($itemPackage->count > 0) {
            //         $countPackage = $itemPackage->count - 1;

            //         User_package::where('user_id', Auth::user()->id)->update(
            //             ['count' => $countPackage],
            //         );
            //     } else {
            //         $countPackage = 0;
            //     }
            // } else {
            //     $countPackage = 0;
            // }

            $booking = new Booking();

            $booking->doctor_id = $request->nameDoctor;
            $booking->patient_id = $request->namePatient;
            $booking->status = 1;
            $booking->date = $request->setTodaysDate;
            $booking->shiftId = $request->chooseShift;
            // if (!empty($itemPackage)) {
            //     $booking->package_Id = $itemPackage->id;
            // } else {
            //     $booking->package_Id = 0;
            // }
            // $booking->count = $countPackage;
            // if (!empty($itemPackage)) {
            //     $booking->buy_number = $itemPackage->buy_number;
            // } else {
            //     $booking->buy_number = 0;
            // }
            $booking->save();

            return redirect()->route('detailPatient', $request->namePatient);
        } else {
            return redirect()->back()->with('msg', 'Mời bạn chọn ca bác sĩ');
        }
    }

    public function detailPatient($id)
    {

        $listBook = Booking::where('patient_id', '=', Auth::user()->id)->with('user', 'shift')->orderBy('id', 'desc')->get();
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
        } elseif ($request->selectStatus == 3) {
            $output .= '<button id="status-booking" value="3" class="btn btn-primary">Process</button>';
            return response($output);
        } else {
            $output .= '<button id="status-booking" value="4" class="btn btn-danger">Pending</button>';
            return response($output);
        }
    }

    public function deleteBooking($id)
    {
        Booking::find($id)->delete();
        return redirect()->route('detailPatient', Auth::user()->id);
    }

    public function editProfile($id)
    {
        return view('clients.edit-profile');
    }

    public function updateProfilePatient(Request $request,$id)
    {
        $patient = User::find($id);
        $request->validate([
            'name' => 'required|min:5',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'image' => 'required',
            'description' => 'required',
        ], [
            'name.required' => 'Bạn cần phải nhập tên',
            'password.required' => 'Bạn cần phải nhập password',
            'name.min' => 'Không được nhỏ hơn 5 ký tự',
            'email.required' => 'Bạn cần phải nhập email',
            'phone.required' => 'Không được để trống',
            'address.required' => 'Không được để trống',
            'image.required' => 'Không được để trống',
            'description.required' => 'Không được để trống',
        ]);

        if($request->hasFile('image')) {
            $originName = $request->file('image')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileName = $fileName.'_'.time().'.'.$extension;
            $request->file('image')->move(public_path('img'), $fileName);
        }

        $patient->name = $request->name;
        $patient->email = $request->email;
        $patient->phone = $request->phone;
        $patient->address = $request->address;
        $patient->image = $fileName;
        $patient->description = $request->description;
        $patient->save();

        return redirect()->back()->with('msg', 'Update thành công');
    }
}
