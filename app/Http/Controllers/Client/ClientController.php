<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Booking;
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
        return view('clients.home', compact('allDoctor', 'allPackage'));
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
        $allDoctor = $this->user->getAllDoctor();
        $package = Package_Care::find($id);

        return view('clients.Package', compact('package', 'allDoctor'));
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
        $bookPackage = new User_package();
        $bookPackage->user_id = Auth::user()->id;
        $bookPackage->doctor_package_id = $request->doctor_id;
    }
}
