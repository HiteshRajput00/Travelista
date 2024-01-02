<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BookedVilla;
use App\Models\VillaLocation;
use App\Models\Villas;
use Illuminate\Http\Request;

class villasController extends Controller
{
    public function AddVillaPage()
    {
        return view('admin.villas.add_villa');
    }

    Public function Allvillas()
    {
        $data = Villas::all();
        return view('');
    }

    public function storeVilla(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'villa_name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'city' => 'required',
            'state' => 'required',
            'country' => 'required',
            'image' => 'required'
        ]);
        $service = json_encode( $request->service);
        $data = new Villas();
        $data->villa_name = $request->villa_name;
        $data->description = $request->description;
        $data->price = $request->price;
        $data->bedrooms = $request->bedrooms;
        $data->bathrooms = $request->Bathrooms;
        $data->Guest_Capacity = $request->Guest_Capacity;
        $data->amenities = $service;
        if ($request->hasFile('image')) {
            $file = $request->file('image');            // image saving
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('images', $filename);
            $image = $filename;
        }
        $data->image = $image;
        $data->save();

        if($data) {
            $addr = new VillaLocation();
            $addr->villa_id = $data->id;
            $addr->city = $request->city;
            $addr->state = $request->state;
            $addr->country = $request->country;
            $addr->lat = $request->latitude;
            $addr->lang = $request->longitude;
            $addr->save();
        }
        return redirect()->back()->with('success');
    }
}
