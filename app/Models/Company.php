<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Company extends Model implements Auditable
{

    use \OwenIt\Auditing\Auditable;
    use HasFactory;
    

    protected $fillable = [
        'uuid',
        'name',
        'description',
        'address_street',
        'address_street_no',
        'address_street_postalcode',
        'address_city',
        'phone',
        'vat_no',
        'tax_no',
        'logo',
        'file_path',
        'website',
        'company_type',
         'register',    
    ];
    

        ///////Retrieve relation of company ////

        public function companies()
        {
        return $this->belongsTo(Company::class,'company_id');
        }

        ///// relationship for get multiple location /////
        public function locations()
        {
        return $this->hasMany(Location::class,'company_id');
        }
        ///// relationship for get multiple User /////
        public function users()
        {
        return $this->hasMany(User::class);
        }
            
}
