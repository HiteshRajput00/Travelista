<?php

namespace App\Http\Controllers\travelista;

use App\Http\Controllers\Controller;
use App\Models\VillaLocation;
use App\Models\Villas;
use Illuminate\Http\Request;

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
        $location = explode(', ', $req->travel_to);
        $guest = $req->guest;
        list($city, $state,$country) = $location;
        $villa_list = Villas::whereHas('location', function ($query) use ($city, $state,$country) {
            $query->where(function ($subQuery) use ($city, $state,$country) {
                $subQuery->where('city', 'like', '%' . $city . '%')
                    ->Where('state', 'like', '%' .$state . '%')
                    ->Where('country', 'like', '%' .$country . '%');

            });
        })
            ->where('guest_capacity', '>=', $guest)
            ->get();
        return view('travelista.villas.index', compact('villa_list'));
        // $data = Villas::where('city', 'like', '%' . $location . '%')
        //     ->Where('state', 'like', '%' . $location . '%')
        //     ->Where('country', 'like', '%' . $location . '%')->where('guest_capacity', '>=', $guest)->get();
        // dd($villas);
    }
}
