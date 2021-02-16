<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\ResidentDetails;
use App\Http\Resources\ResidentDetails as resident_res;
use Illuminate\Support\Facades\DB;

class ResidentController extends Controller
{
    public function index()
    {
        //Get all residents
        $resident = ResidentDetails::get();

        // Return a collection of $resident with pagination
        return resident_res::collection($resident);
    }
	
	public function getResidentsByCity($city, $auth)
    {	
		if($auth != 1){
			return "You are not authorised to view this page.";
		}
		$users = DB::select('select rd.name, rd.age from resident_details as rd inner join city_name as cn on rd.city_id=cn.id where LOWER(cn.city_name) = ?', array($city));
		
        //Get all residents by city
		return response()->json($users,200);
    }
	
	public function getCarsByStreetName($street_name, $auth)
    {	
		if($auth != 1){
			return "You are not authorised to view this page.";
		}
		
		$street_name = str_replace('-',' ',$street_name);
		
		$users = DB::select('select cra.license_number, cc.color, cb.brand_name from car_registration_address as cra inner join street_name as sn on cra.street_id=sn.street_id inner join car_colors as cc on cra.color_id=cc.color_id inner join car_brands as cb on cra.brand_id=cb.brand_id where LOWER(sn.street_name) = ?', array($street_name));
		
        //Get all cars by street
		return response()->json($users,200);
    }
	
	public function getOwnerByCar($license_number, $auth)
    {	
		if($auth != 1){
			return "You are not authorised to view this page.";
		}
		
		$license_number = str_replace('-',' ',$license_number);
		
		$users = DB::select('select rd.name from resident_details as rd inner join car_registration_address as cra on rd.car_address_data=cra.id where LOWER(cra.license_number)=?', array($license_number));
		
        //Get owner by license number
    	return response()->json($users,200);
    }
	
	public function getAddressByName($name, $auth)
    {	
		if($auth != 1){
			return "You are not authorised to view this page.";
		}
		
		$name = str_replace('-',' ',$name);
		
		$users = DB::select('select rd.name, concat(cra.address, " ", sn.street_name, " ", cn.city_name) as address from resident_details as rd inner join car_registration_address as cra on rd.car_address_data=cra.id inner join street_name as sn on rd.street_id=sn.street_id inner join city_name as cn on cn.id=rd.city_id where LOWER(rd.name)=?', array($name));
		
        //Get all address by resident name
		return response()->json($users,200);
    }
}