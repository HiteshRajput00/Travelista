<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BillingDetails;
use App\Models\BookedVilla;
use App\Models\Villas;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    Public function index()
    {
        return view('admin.dashboard.index');
    }

    Public function Bookedvillas()
    {
        $bookings = BookedVilla::where('booking_status','confirmed')->get();
        return view('admin.bookings.booked_villas',compact('bookings'));
    }

    Public function bookingDetails(Request $request)
    {
        $booking = BookedVilla::where('booking_number',$request->input('booking_number'))->first();
        $guest = BillingDetails::find($booking->billing_details_id);
        $villa = Villas::find($booking->villa_id);
        return view('admin.bookings.booking_details',compact('booking','guest','villa'));
    }
}
