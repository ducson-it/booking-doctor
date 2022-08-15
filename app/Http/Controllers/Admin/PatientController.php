<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use App\Models\Constants;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listPatient = Role::find(3)->users;
        return view('admin.patient', compact('listPatient'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.create-patient');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:5',
            'email' => 'required|unique:users',
            // 'password' => 'required'
        ], [
            'name.required' => 'Ban can phai nhap ten',
            // 'password.required' => 'Ban can phai password',
            'name.min' => 'Khong duoc nho hon 5 ky tu',
            'email.required' => 'Ban can phai nhap emil',
            'email.unique' => 'Da ton tai email',
        ]);

        $doctor = new User();
        $doctor->name = $request->name;
        $doctor->email = $request->email;
        $doctor->password = $request->password;
        $doctor->role_id = $request->role;
        $doctor->level = '';
        $doctor->image = '';
        $doctor->phone = '';
        $doctor->address = '';
        $doctor->description = '';
        $doctor->gender = '';
        $doctor->save();
        return redirect()->route('admin.patient.index')->with('msg', 'tao user thanh cong');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $patient = Role::find(Constants::ROLE_PATIENT)->user()
            ->where('id', $id)
            ->first();
        return view('admin.edit-patient', compact('patient'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Doctor $doctor)
    {
        $request->validate([
            'name' => 'required|min:5',
            'email' => 'required|unique:users'
        ], [
            'name.required' => 'Ban can phai nhap ten',
            'name.min' => 'Khong duoc nho hon 5 ky tu',
            'email.required' => 'Ban can phai nhap emil',
            'email.unique' => 'Da ton tai email',
        ]);


        $doctor->name = $request->name;
        $doctor->email = $request->email;
        // $doctor->level = $request->select;
        $doctor->save();

        return redirect()->route('admin.patient.index')->with('msg', 'update thanh cong');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::destroy($id);

        return redirect()->route('admin.doctor.index')->with('msg', 'delete thanh cong');

    }
}
