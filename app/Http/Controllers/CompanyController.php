<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use File;
use Session;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $company = Company::get();
        return response()->json($company, 200);
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
    {     $request->validate([
            
        'name' => 'required',
        'description' => 'required',
        'address_street' => 'required',
        'address_street_no' => 'required',
        'address_street_postalcode' => 'required',
        'address_city' => 'required',
        'phone' => 'required',
        'vat_no' => 'required',
        'tax_no' => 'required',
        'website' => 'required',
        'company_type' => 'required',
        'register' => 'required',
    ]);
        $company = new Company;
        $uuid = Str::uuid()->toString();
        $company->uuid = $uuid;
        $company->name = $request->get('name');
        $company->description = $request->get('description');
        $company->address_street = $request->get('address_street');
        $company->address_street_no = $request->get('address_street_no');
        $company->address_street_postalcode = $request->get('address_street_postalcode');
        $company->address_city = $request->get('address_city');
        $company->phone = $request->get('phone');
        $company->vat_no = $request->get('vat_no');
        $company->tax_no = $request->get('tax_no');
        if ($request->hasFile('file')) {
            $image = $request->file('file');
            $destination = public_path('assets/app/public/company_profiles/'.$uuid.'/users/avatar');
            if (!File::isDirectory($destination)) {
                mkdir($destination, 0777, true);
                chmod($destination, 0777);
            }
            $filename = 'image-' . time() . '-' . Str::random(15) . '.' . $image->getClientOriginalExtension();
            $image->move($destination, $filename);
            $company->logo = $filename;
            $company->path = $destination;
        }

        
      
        $company->website = $request->get('website');
        $company->company_type = $request->get('company_type');
        $company->register = $request->get('register');
        $company->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company,$uuid)
    {
        $company = Company::where('uuid','=',$uuid)->first();
       return response()->json($company);
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Company $company,$uuid)
    {
        $company = company::where('uuid','=',$uuid)->first();
       $company->name = $request->get('name');
       $company->description = $request->get('description');
       $company->address_street = $request->get('address_street');
       $company->address_street_no = $request->get('address_street_no');
       $company->address_street_postalcode = $request->get('address_street_postalcode');
       $company->address_city = $request->get('address_city');
       $company->phone = $request->get('phone');
       $company->vat_no = $request->get('vat_no');
       $company->tax_no = $request->get('tax_no');
       
       

         if ($request->hasFile('file')) {
            $image = $request->file('file');
            $destination = public_path('assets/app/public/company_profiles/'.$uuid.'/users/avatar');
            if (!File::isDirectory($destination)) {
                mkdir($destination, 0777, true);
                chmod($destination, 0777);
            }
            $filename = 'image-' . time() . '-' . Str::random(15) . '.' . $image->getClientOriginalExtension();
            $image->move($destination, $filename);
            $company->logo = $filename;
     
        }
       $company->website = $request->get('website');
       $company->company_type = $request->get('company_type');
       $company->register = $request->get('register');
  
        $company->update();
 
        return response()->json('Location Update Successfully');
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company,$uuid)
    {
        $company = Company::where('uuid','=',$uuid)->first();
        $company->delete();
        $reponse=1;
        return response()->json($reponse);
        
    }
    public function formSubmit(Request $request)
    {
        $imageName = time().'.'.$request->image->getClientOriginalExtension();
        $request->image->move(public_path('companies'), $imageName);   
        
    	return response()->json(['success'=>'You have successfully upload image.']);
    }
    public function upload(Request $request){
            
        $request->validate([
           'file' => 'required|mimes:jpg,jpeg,png,csv,txt,xlx,xls,pdf|max:2048'
        ]);

     
   }
}
