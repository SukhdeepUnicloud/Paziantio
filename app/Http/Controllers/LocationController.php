<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $locations = Location::get();
       
        return response()->json($locations, 200);
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            
            'name' => 'required|min:5',
            'description' => 'required',
            'address_street' => 'required',
            'address_street_no' => 'required',
            'address_postalcode' => 'required',
            'address_city' => 'required',
            'phone' => 'required',
        ]);
        $uuid = Str::uuid()->toString();
        Location::create([
            'uuid'=>$uuid,
            'company_id' =>$request['company_id'],
            'name' => $request['name'],
            'description' => $request['description'],
            'address_street' => $request['address_street'],
            'address_street_no' => $request['address_street_no'],
            'address_postalcode' => $request['address_postalcode'],
            'address_city' => $request['address_city'],
            'phone' =>$request['phone'],
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function show(Location $location)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function edit($uuid)
    {
        $location = Location::where('uuid','=',$uuid)->first();
       return response()->json($location);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Location $location,$uuid)
    {
       $location = Location::where('uuid','=',$uuid)->first();
       $location->name = $request->get('name');
       $location->description = $request->get('description');
       $location->address_street = $request->get('address_street');
       $location->address_street_no = $request->get('address_street_no');
       $location->address_postalcode = $request->get('address_postalcode');
       $location->address_city = $request->get('address_city');
       $location->phone = $request->get('phone');
        $location->update();
 
        return response()->json('Location Update Successfully');
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function destroy(Location $location,$uuid)
    {
        $post = Location::where('uuid','=',$uuid)->first();
        $post->delete();
        return response()->json('Location deleted Successfully');
        //
    }
    
    public function fetch_related_locations($uuid)
    {
        $location = Location::where('company_id','=',$uuid)->get();
        $html='';
        foreach($location as $list)
        {
        $html.='<option value="'.$list->uuid.'">'.$list->name.'</option>';
        }
        echo $html;

       return response()->json($html);
    }

}
