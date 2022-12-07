<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Room extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    use HasFactory;

    protected $fillable = [
        'company_id','location_id','name', 'description','capacity','uuid',
    ];

    
///// relationship for get multiple location /////
public function location()
{
return $this->hasMany(Location::class,'company_id','location_id');
}

///// relationship for get multiple features /////
public function features()
{
return $this->hasMany(Feature::class,'company_id','location_id');
}


///////Retrieve relation of  for A location ///

public function locations()
{
return $this->belongsTo(Location::class,'company_id');
}


///////Retrieve relation of  for A Feature ///

public function retrivefeature()
{
return $this->belongsTo(Feature::class,'company_id');
}

}
