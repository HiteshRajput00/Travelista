<?php

namespace App\Http\Controllers\travelista;

use App\Http\Controllers\Controller;
use App\Models\BookedVilla;
use App\Models\Villas;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    Public function index()
    {
        return view('travelista.dashborad.index');
    }

    Public function AboutUs()
    {
        return view('travelista.site-pages.about-us.about_us');
    }

    Public function ContactUs()
    {
        return view('travelista.site-pages.contact-us.index');
    }

    Public function insurance()
    {
        return view('travelista.site-pages.insurance.index');
    }

    Public function Packages()
    {
        return view('travelista.site-pages.packeges.index');
    }

    Public function Hotels()
    {
        return view('travelista.site-pages.hotels_page.index');
    }

    Public function Blogs()
    {
        return view('travelista.site-pages.blogs.blog-home');
    }

    Public function BlogDetails()
    {
        return view('travelista.site-pages.blogs.blog-single');
    }

    Public function villaPage()
    {
        $villa_list = Villas::all();
        return view('travelista.villas.index',compact('villa_list'));
    }

    Public function villaDetails($id)
    {
        $villa = Villas::find($id);
        $bookings = $villa->bookings()->get(['checkin_date', 'checkout_date']);
        return view('travelista.villas.details',compact('villa','bookings'));
    }
}
