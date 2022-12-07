<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Location extends Model implements Auditable
{
 
    use \OwenIt\Auditing\Auditable;
    use HasFactory;
    

    protected $fillable = [
        'uuid',
        'company_id', 
        'name',
        'description',
        'address_street',
         'address_street_no',
          'address_postalcode',
           'address_city',
            'phone',
    ];

//// relationship for get multiple rooms for  A location can have multiple rooms/////
public function rooms()
{
    return $this->hasMany(Room::class,'company_id');
}

///// relationship for get multiple features for A location can have multiple features /////
public function features()
{
    return $this->hasMany(Feature::class,'company_id');
}

    ///////Retrieve relation of company for A company can have multiple locations

    public function companies()
    {
        return $this->belongsTo(Company::class,'company_id');
    }
    ///////Retrieve relation of room

    public function retrieveRooms()
    {
        return $this->belongsTo(Room::class,'company_id');
    }

}
