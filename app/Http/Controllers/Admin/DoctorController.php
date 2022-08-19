<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listDoctor = Role::find(2)->users;
        return view('admin.doctor', compact('listDoctor'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.create-doctor');
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
            'password' => 'required'
        ], [
            'name.required' => 'Ban can phai nhap ten',
            'password.required' => 'Ban can phai password',
            'name.min' => 'Khong duoc nho hon 5 ky tu',
            'email.required' => 'Ban can phai nhap emil',
            'email.unique' => 'Da ton tai email',
        ]);

        $doctor = new User();
        // $doctor->fill($request->all());
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
        return redirect()->route('admin.doctor.index')->with('msg', 'tao user thanh cong');
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
        $doctor = Role::find(2)->users()
            ->where('id', $id)
            ->first();
        return view('admin.edit-doctor', compact('doctor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $doctor = User::find($id);
        $request->validate([
            'name' => 'required|min:5',
            'email' => 'required|unique:users',
            'phone' => 'required',
            'address' => 'required',
            'image' => 'required',
            'description' => 'required',
            'level' => 'required',
        ], [
            'name.required' => 'Bạn cần phải nhập tên',
            'password.required' => 'Bạn cần phải nhập password',
            'name.min' => 'Không được nhỏ hơn 5 ký tự',
            'email.required' => 'Bạn cần phải nhập email',
            'email.unique' => 'Email đã tồn tại',
            'phone.required' => 'Không được để trống',
            'address.required' => 'Không được để trống',
            'image.required' => 'Không được để trống',
            'description.required' => 'Không được để trống',
            'level.required' => 'Không được để trống',
        ]);

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

        return redirect()->route('admin.doctor.index')->with('msg', 'Update thành công');
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

        return redirect()->route('admin.doctor.index')->with('msg', 'Delete thành công');

    }
}
