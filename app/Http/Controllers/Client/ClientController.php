<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Doctor_Shift;
use App\Models\News;
use App\Models\Package_Care;
use App\Models\Shift;
use App\Models\User;
use App\Models\User_package;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{

    public $user;

    public function __construct()
    {
        $this->user = new User();
    }

    public function index()
    {
        $allDoctor = $this->user->getAllDoctor();
        $allPackage = Package_Care::all();
        $allNew = News::all();
        $allShift = Shift::all();
        return view('clients.home', compact('allDoctor', 'allPackage', 'allNew', 'allShift'));
    }

    public function detailDoctor($id)
    {
        $doctorId = $this->user->getShiftDoctorDetail($id);
        $shiftDoctor = User::find($id)->shifts;
        return view('clients.detail_doctor', compact('doctorId', 'shiftDoctor'));
    }

    public function detailPatient()
    {
        return view('admin.create-patient');
    }

    public function selectPackage($id)
    {
        $itemPackage = User_package::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->first();
        $allDoctor = $this->user->getAllDoctor();
            $package = Package_Care::find($id);
        if (!empty($itemPackage)) {
            if ($itemPackage->package_id == $id) {
                if ($itemPackage->count > 0) {
                    return redirect()->back()->with('msg', 'Bạn chưa sử dụng hết gói đã mua');
                }else{
                    return view('clients.Package', compact('package', 'allDoctor'));
                }
            } elseif ($itemPackage->package_id != $id) {
                if ($itemPackage->count > 0) {
                    return redirect()->back()->with('msg', 'Bạn chưa sử dụng hết gói đã mua');
                } else {
                    return view('clients.Package', compact('package', 'allDoctor'));
                }
            };
        } else {
            return view('clients.Package', compact('package', 'allDoctor'));
        }
    }


    public function ajaxSearch(Request $request)
    {
        $allDoctorSearch = User::where('role_id', '2')
            ->where('name', 'LIKE', '%' . $request->searchDoctor . '%')
            ->get();
        $html = view('clients.ajaxSearch', [
            'allDoctorSearch' => $allDoctorSearch,
        ])->render();
        return response()->json([
            'success' => true,
            'html' => $html
        ], 200);
    }

    public function packageBill(Request $request)
    {
        $getPackage = Package_Care::find($request->packageId);
        $getDoctor = User::find($request->doctor_package);
        return view('clients.checkout', compact('getPackage', 'getDoctor'));
    }

    public function saveBill(Request $request)
    {
        $itemPackage = User_package::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->first();
        if (!empty($itemPackage)) {
            if ($itemPackage->package_id == $request->package_id) {
                $countBuyNumber = $itemPackage->package_id + 1;
            }
            $bookPackage = new User_package();
            $bookPackage->user_id = Auth::user()->id;
            $bookPackage->doctor_package_id = $request->doctor_id;
            $bookPackage->package_id = $request->package_id;
            $bookPackage->count = $request->package_count;
            $bookPackage->buy_number = $countBuyNumber;
            $bookPackage->save();
            $doctor = User::find($request->doctor_id);
            return view('clients.buy_package_success', compact('doctor'));
        } else {
            $bookPackage = new User_package();
            $bookPackage->user_id = Auth::user()->id;
            $bookPackage->doctor_package_id = $request->doctor_id;
            $bookPackage->package_id = $request->package_id;
            $bookPackage->count = $request->package_count;
            $bookPackage->buy_number = 1;
            $bookPackage->save();
            $doctor = User::find($request->doctor_id);
            return view('clients.buy_package_success', compact('doctor'));
        }
    }

    public function scheduleClient(Request $request)
    {
        $checks= Doctor_Shift::where('date', $request->dateSchedule)
                            ->where('date', $request->selectSchedule)
                            ->get();
        return view('clients.check-schedule', compact('checks'));
    }


    public function newMain($id)
    {
        $details = News::find($id);

        return view('clients.new-main', compact('details'));
    }
}
