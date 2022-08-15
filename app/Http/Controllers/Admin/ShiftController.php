<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Shift;
use Illuminate\Http\Request;

class ShiftController extends Controller
{
    public function index()
    {
        $listShift = Shift::withTrashed()->latest()->get();
        return view('admin.shift', compact('listShift'));
    }

    public function deleteSoftShift(Request $request) {
        $checkItem = $request->checkItem;
        Shift::whereIn('id', $checkItem)->delete();
        // foreach ($checkItem as $item) {
        //     Shift::where('id', '=', $item)->delete();
        // };
        return redirect()->route('admin.shift');
    }

    public function restoreShift($id) {
        Shift::withTrashed()
        ->whereId($id)
        ->restore();
        return redirect()->route('admin.shift');
    }
}
