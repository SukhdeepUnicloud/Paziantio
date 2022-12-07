<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;





class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $role = Role::get();
       
        return response()->json($role, 200);
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
        public function getTableColumns($table)
        {
            $columns = DB::getSchemaBuilder()->getColumnListing($table);
        return response()->json($columns);
        }


        public function createTableColumns(Request $request,Role $role)
        {
            $tablecol=$request->get('tablecolum');
            $tablename=$request->get('tablename');
            
            // $cats = $request->all();
            foreach($tablecol as $cat)
            {
                $newColumnType = 'string';
                $newColumnName = $cat;
                Schema::table($tablename, function (Blueprint $table) use ($newColumnType, $newColumnName,$tablename) {
                   if (Schema::hasColumn($tablename, $newColumnName)) 
                        {
                        }
                        else
                        {
                    $table->$newColumnType($newColumnName);
                        }
                });
            }
            return response()->json($request->all());
        }
        public static function getalltables($connection = null)
        {
            return collect(DB::connection($connection)->select('show tables'))->map(function ($val) {
                foreach ($val as $key => $tbl) {
                    return $tbl;
                }
            });
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
            'name' => 'required|unique:roles,name',
        ]); 
       

        $uuid = Str::uuid()->toString();
        Role::create([
            'uuid'=>$uuid,
            'name' => $request['name'],
        ]);
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role,$uuid)
    {
        $role = Role::where('uuid','=',$uuid)->first();
        return response()->json($role);
    }

    public function Register_roles(Role $role)
    {
        $role = Role::where('on_register','=','yes')->get();
        return response()->json($role, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role,$uuid)
    {
        $role = Role::where('uuid','=',$uuid)->first();
        $role->name = $request->get('name');
        $role->update();
 
        return response()->json('Role Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role,$uuid)
    {
        $role = Role::where('uuid','=',$uuid)->first();
        $role->delete();
        return response()->json('Role deleted Successfully');
    }

    public function activeRole($uuid)
    {
        $role = Role::where('uuid','=',$uuid)->first();
        $role->role_status= '1';
        $role->save();
        return response()->json('Status Active');
    }
    public function deactiveRole($uuid)
    {
        $role = Role::where('uuid','=',$uuid)->first();
        $role->role_status= '0';
        $role->save();
        return response()->json('Status Deactive');
    }
    public function ShowRole($uuid)
    {
        $role = Role::where('uuid','=',$uuid)->first();
        $role->on_register= 'yes';
        $role->save();
        return response()->json('Status Active');
    }
    public function HideRole($uuid)
    {
        $role = Role::where('uuid','=',$uuid)->first();
        $role->on_register= 'no';
        $role->save();
        return response()->json('Status Deactive');
    }
    
    
}
