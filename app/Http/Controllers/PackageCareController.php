<?php

namespace App\Http\Controllers;

use App\Models\Package_Care;
use Facade\Ignition\Support\Packagist\Package;
use Illuminate\Http\Request;

class PackageCareController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listPackage = Package_Care::all();
        return view('admin.list_package', compact('listPackage'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.package');
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
            'count' => 'required',
            'price' => 'required|numeric',
            'image' => 'required',
            'description' => 'required',
        ], [
            'name.required' => 'Bạn cần phải nhập tên',
            'name.min' => 'Không được nhỏ hơn 5 ký tự',
            'count.required' => 'Bạn cần phải nhập email',
            'price.required' => 'Không được để trống',
            'price.numeric' => 'Phải là số ',
            'image.required' => 'Không được để trống',
            'description.required' => 'Không được để trống',
        ]);

        $doctor = new Package_Care();
        if($request->hasFile('image')) {
            $originName = $request->file('image')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileName = $fileName.'_'.time().'.'.$extension;
            $request->file('image')->move(public_path('img'), $fileName);
        }

        $doctor->name = $request->name;
        $doctor->count = $request->count;
        $doctor->price = $request->price;
        $doctor->image = $fileName;
        $doctor->description = $request->description;
        $doctor->save();

        return redirect()->route('admin.package.index')->with('msg', 'Thêm thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $package = Package_Care::find($id);
        return view('admin.edit-package', compact('package'));
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
        $request->validate([
            'name' => 'required|min:5',
            'count' => 'required',
            'price' => 'required|numeric',
            'image' => 'required',
            'description' => 'required',
        ], [
            'name.required' => 'Bạn cần phải nhập tên',
            'name.min' => 'Không được nhỏ hơn 5 ký tự',
            'count.required' => 'Bạn cần phải nhập email',
            'price.required' => 'Không được để trống',
            'price.numeric' => 'Phải là số ',
            'image.required' => 'Không được để trống',
            'description.required' => 'Không được để trống',
        ]);

        $doctor = Package_Care::find($id);
        if($request->hasFile('image')) {
            $originName = $request->file('image')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileName = $fileName.'_'.time().'.'.$extension;
            $request->file('image')->move(public_path('img'), $fileName);
        }

        $doctor->name = $request->name;
        $doctor->count = $request->count;
        $doctor->price = $request->price;
        $doctor->image = $fileName;
        $doctor->description = $request->description;
        $doctor->save();
        return redirect()->route('admin.package.edit', $doctor->id)->with('msg', 'Update thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Package_Care::destroy($id);
        return redirect()->route('admin.package.index')->with('msg', 'Delete thành công');

    }
}
