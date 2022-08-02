<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class ClientController extends Controller
{

    public $user;

    public function __construct()
    {
        $this->user = new User();
    }

    public function index() {
        $limitDoctor = $this->user->getLimitDoctor();
        return view('clients.home', compact('limitDoctor'));
    }

    public function detailDoctor($id) {
        $limitDoctor = $this->user->getShiftDoctorDetail($id);
        return view('clients.detail_doctor', compact('limitDoctor'));
    }
}
