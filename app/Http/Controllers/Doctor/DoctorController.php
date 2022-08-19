<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Doctor_Shift;
use App\Models\Role;
use App\Models\User;
use App\Models\Shift;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DoctorController extends Controller
{
    public function index()
    {
        $count1 = Booking::where('status', 1)
            ->where('doctor_id', Auth::user()->id)
            ->count();
        $count2 = Booking::where('status', 2)
            ->where('doctor_id', Auth::user()->id)
            ->count();;
        $count3 = Booking::where('status', 3)
            ->where('doctor_id', Auth::user()->id)
            ->count();
        $count4 = Booking::where('status', 4)
            ->where('doctor_id', Auth::user()->id)
            ->count();
        $listBook = Booking::where('doctor_id', Auth::user()->id)->get();
        return view('doctors.dashboard', compact('count1', 'count2', 'count3', 'count4', 'listBook'));
    }

    public function selectShift()
    {
        return view('doctors.doctor_shift');
    }

    public function ajaxGetSchedule(Request $request)
    {
        $output = '';
        $allshift = Shift::all();
        $doctorShift = Doctor_Shift::where('doctor_id', $request->doctorId);
        $output .= '<div class="checkbox-book d-flex flex-wrap justify-content-between">';
        if ($doctorShift->count() > 0) {
            foreach ($allshift as $key => $shift) {
                if ($shift->id == $doctorShift->shift_doctor_id && $doctorShift->date == $request->selectDate) {
                    $output .= '<div class="d-none checkbox-item p-2">
                            <input type="checkbox" name="chooseShift[]" id="checkboxOne' . $key . '"
                            value="' . $shift->id . '">
                                <label for="checkboxOne' . $key . '">' . $shift->name . '</label>
                                </div>';
                } else {
                    $output .= '<div class="checkbox-item p-2">
                            <input type="checkbox" name="chooseShift[]" id="checkboxOne' . $key . '"
                                value="' . $shift->id . '">
                            <label for="checkboxOne' . $key . '">' . $shift->name . '</label>
                            </div>';
                }
            }
        } else {
            foreach ($allshift as $key => $shift) {
                $output .= '<div class="checkbox-item p-2">
                            <input type="checkbox" name="chooseShift[]" id="checkboxOne' . $key . '"
                                value="' . $shift->id . '">
                            <label for="checkboxOne' . $key . '">' . $shift->name . '</label>
                            </div>';
            }
            $output .= '</div>';
        }
        return Response($output);
    }
    public function createShift(Request $request)
    {
        $shifts = $request->input('chooseShift');
        foreach ($shifts as  $shift) {
            Doctor_Shift::firstOrCreate([
                'shift_doctor_id' => $shift,
                'date' => $request->setTodaysDate,
                'doctor_id' => Auth::user()->id,
            ]);
        }
        return redirect()->route('doctor.shift.doctor')->with('msg', "Thêm thành công");
    }

    public function profileDoctor()
    {
        return view('doctors.detail-doctor');
    }

    public function editProfileDoctor()
    {
        return view('doctors.edit-doctor');
    }

    public function updateProfileDoctor(Request $request)
    {
        $request->validate([
            'name' => 'required|min:5',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'image' => 'required',
            'description' => 'required',
        ], [
            'name.required' => 'Bạn cần phải nhập tên',
            'name.min' => 'Không được nhỏ hơn 5 ký tự',
            'email.required' => 'Bạn cần phải nhập email',
            'phone.required' => 'Không được để trống',
            'address.required' => 'Không được để trống',
            'image.required' => 'Không được để trống',
            'description.required' => 'Không được để trống',
        ]);

        $doctor = User::find(Auth::user()->id);
        if ($request->hasFile('image')) {
            $originName = $request->file('image')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileName = $fileName . '_' . time() . '.' . $extension;
            $request->file('image')->move(public_path('img'), $fileName);
        }

        $doctor->name = $request->name;
        $doctor->email = $request->email;
        $doctor->phone = $request->phone;
        $doctor->address = $request->address;
        $doctor->image = $fileName;
        $doctor->description = $request->description;
        $doctor->level = $request->select;
        $doctor->save();

        return redirect()->route('doctor.profile.edit')->with('msg', 'Update thành công');
    }

    public function managerPatient()
    {
        $listPatient = Booking::where('doctor_id', Auth::user()->id)
            ->whereIn('status', ['2', '3'])
            ->get();
        return view('doctors.manager-patient', compact('listPatient'));
    }

    public function diagnosePatient($id)
    {
        return view('doctors.diagnose-patient', compact('id'));
    }

    public function createDiagnose(Request $request,$id)
    {
        $request->validate([
            'excel' => 'required'
        ], [
            'excel.required' => 'Bạn cần phải nhập',

        ]);
        $book = Booking::find($id);
        if ($request->hasFile('excel')) {
            $originName = $request->file('excel')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('excel')->getClientOriginalExtension();
            $fileName = $fileName . '_' . time() . '.' . $extension;
            $request->file('excel')->move(public_path('img'), $fileName);
        }
        $book->status = '3';
        $book->file = $fileName;
        $book->save();

        return redirect()->route('doctor.manager.patient')->with('msg', 'Đã gửi ');
    }

    public function downloadDiagnose($id){
        $book = Booking::find($id);
        $file_path = public_path('img/'.$book->file);
        return response()->download($file_path);
    }

    public function editDiagnose($id)
    {
        return view('doctors.edit-patient', compact('id'));
    }

    public function updateDiagnose(Request $request, $id)
    {
        $book = Booking::find($id);
        if ($request->hasFile('excel')) {
            $originName = $request->file('excel')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('excel')->getClientOriginalExtension();
            $fileName = $fileName . '_' . time() . '.' . $extension;
            $request->file('excel')->move(public_path('img'), $fileName);
        }
        $book->file = $fileName;
        $book->save();
        return redirect()->route('doctor.edit.diagnose')->with('msg', 'Thay đổi thành công');
    }
}
