<?php

namespace App\Http\Controllers\travelista;

use App\Http\Controllers\Controller;
use App\Models\BookedVilla;
use App\Models\User;
use App\Models\VillaLocation;
use App\Models\Villas;
use Illuminate\Http\Request;
use Carbon\Carbon;

class SearchController extends Controller
{
    public function autocomplete(Request $req)
    {
        $query = $req->input('query');
        $results = VillaLocation::where('city', 'like', "%$query%")
            ->orwhere('state', 'like', "%$query%")
            ->orwhere('state', 'like', "%$query%")
            ->get();

        return response()->json($results);
    }

    public function search(Request $req)
    {
        $req->validate([
          'travel_to' => 'required',
          'guest' => 'required',
        ]);
        $location = explode(', ', $req->travel_to);
        $guest = $req->guest;
        list($city, $state, $country) = $location;
        $start_date = Carbon::parse($req->input('start_date'));
        $end_date = Carbon::parse($req->input('end_date'));


        $villa_list = Villas::whereDoesntHave('bookings', function ($query) use ($start_date, $end_date) {
            $query->where(function ($query) use ($start_date, $end_date) {
                $query->whereBetween('checkin_date', [$start_date, $end_date])
                    ->orWhereBetween('checkout_date', [$start_date, $end_date])
                    ->orWhere(function ($query) use ($start_date, $end_date) {
                        $query->where('checkin_date', '<=', $start_date)
                            ->where('checkout_date', '>=', $end_date);
                    });
            });
        })->whereHas('location', function ($query) use ($city, $state, $country) {
            $query->where(function ($subQuery) use ($city, $state, $country) {
                $subQuery->where('city', 'like', '%' . $city . '%')
                    ->Where('state', 'like', '%' . $state . '%')
                    ->Where('country', 'like', '%' . $country . '%');

            });
        })->where('guest_capacity', '>=', $guest)->get();

        return view('travelista.villas.index', compact('villa_list'));

    }

    Public function findbooking(Request $request)
    {
        $user = User::where('email',$request->email)->first();
        
    }
}
