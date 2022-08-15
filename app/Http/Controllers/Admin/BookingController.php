<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Booking;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function index() {
        $listBook = Booking::where('status', '1')->with('user','shift')->get();
        $listBook2 = Booking::where('status', '2')->with('user','shift')->get();
        $listBook3 = Booking::where('status', '3')->with('user','shift')->get();
        $listBook4 = Booking::where('status', '4')->with('user','shift')->get();

        return view('admin.processBooking', compact('listBook','listBook2','listBook3','listBook4'));
    }

    public function confirm($id) {
        Booking::find($id)->update(
            ['status' => 2]
        );

        return redirect()->route('admin.booking');
    }

    public function cancel($id) {
        Booking::find($id)->update(
            ['status' => 4]
        );

        return redirect()->route('admin.booking');
    }
}
