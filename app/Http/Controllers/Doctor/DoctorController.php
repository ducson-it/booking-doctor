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
        return view('doctors.dashboard', compact('count1','count2','count3','count4','listBook'));
    }

    public function selectShift()
    {
        $listShift = Shift::all();
        return view('doctors.doctor_shift', compact('listShift'));
    }

    public function createShift()
    {
        $createShift = new Doctor_Shift();
        return redirect()->route('doctor.shift.doctor');
    }

    public function profileDoctor() {
        return view('doctors.detail-doctor');
    }

    public function editProfileDoctor() {
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
        if($request->hasFile('image')) {
            $originName = $request->file('image')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileName = $fileName.'_'.time().'.'.$extension;
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
}
