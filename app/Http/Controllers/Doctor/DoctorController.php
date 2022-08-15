<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use App\Models\Doctor_Shift;
use App\Models\User;
use App\Models\Shift;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function index()
    {
        $listDoctor = User::where('role_id', '=', 2)->get();
        return view('doctors.dashboard');
    }

    public function selectShift() {
        $listShift = Shift::all();
        return view('doctors.doctor_shift', compact('listShift'));
    }

    public function createShift() {
        $createShift = new Doctor_Shift();
        return redirect()->route('doctor.shift.doctor');
    }
}
