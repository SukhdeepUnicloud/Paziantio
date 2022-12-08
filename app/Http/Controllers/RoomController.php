<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Company;
use App\Models\Location;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Mail\MailNotify;
use Illuminate\Http\Request;
use Mail;
use DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rooms =Room::join('companies', 'companies.uuid', '=', 'rooms.company_id')
        ->join('locations', 'locations.uuid', '=', 'rooms.location_id')
        ->select('rooms.*','companies.name as cname','locations.name as locname')
        ->get();
        return response()->json($rooms, 200);
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
        $request->validate([
            'company_id' => 'required',
            'location_id' => 'required',
            'name' => 'required|min:5',
            'description' => 'required',
            'capacity' => 'required',
        ]);
        $uuid = Str::uuid()->toString();
        Room::create([
            'uuid'=>$uuid,
            'company_id'=>$request['company_id'],
            'location_id'=>$request['location_id'],
            'name' =>$request['description'],
            'description' => $request['description'],
            'capacity' => $request['capacity'],
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function show(Room $room)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function edit(Room $room,$uuid)
    {
        $rooms = Room::where('uuid','=',$uuid)->first();
       return response()->json($rooms);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Room $room,$uuid)
    {
        $room = Room::where('uuid','=',$uuid)->first();
        $room->uuid = $request->get('uuid');
        $room->company_id = $request->get('company_id');
        $room->location_id = $request->get('location_id');
        $room->name = $request->get('name');
        $room->description = $request->get('description');
        $room->capacity = $request->get('capacity');
        $room->update();
  
         return response()->json('Room Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function destroy(Room $room,$uuid)
    {
        $room = Room::where('uuid','=',$uuid)->first();
        $room->delete();
        $response =1;
        return response()->json($response);
    }
}
