<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ferry;
use App\Models\UserBenefit;

class FerryController extends Controller
{
    public function addFerry(Request $req){
        $Ferry= new Ferry;
        $Ferry->name= $req->name;
        $Ferry->date_of_ferry= $req->date_of_ferry;
        $Ferry->street1= $req->street1;
        $Ferry->ferry_time= $req->ferry_time;
        $Ferry->street2= $req->street2;
        $Ferry->county_id= $req->county_id;
        $Ferry->benefits= $req->benefits;
        $Ferry->save();
        return $Ferry; 

    }
    public function getFerry(){
        $result = Ferry::selectRaw('name as Name,  date_of_ferry as "Date of Ferry",CONCAT(IFNULL(ferry.street1, ""),
        " ",ferry.street2)  as Address,ferry_time as "Time at Ferry starts",benefits as Benefits, id')->get();
        $result = $result->values()->all();
        return $result;     
    }

    public function updateFerry(Request $req){
        $Ferry = Ferry::find($req->id);
        $Ferry->id=$req->id;
        $Ferry->name= $req->name;
        $Ferry->date_of_ferry= $req->date_of_ferry;
        $Ferry->street1= $req->street1;
        $Ferry->ferry_time= $req->ferry_time;
        $Ferry->street2= $req->street2;
        $Ferry->county_id= $req->county_id;
        $Ferry->benefits= $req->benefits;
        $Ferry->save();
        return $Ferry;  
    }

    public function getFerryForResidents($user_id){
        return UserBenefit::select('UserBenefits.user_id', 'Ferry.id', 'Ferry.name')
        ->rightJoin('Ferry',function($join)use ($user_id) {
            $join->on('UserBenefits.benefit_id','=','Ferry.id')
            ->where('UserBenefits.user_id','=',$user_id)
            ->where('UserBenefits.benefit_type','=','Ferry');
        })
        ->groupBy('UserBenefits.user_id', 'Ferry.id', 'Ferry.name')
        ->get();
    }

    public function getFerryForInspectors($county_id){
        $result = Ferry::selectRaw('name as Name,CONCAT(street1, ",", street2) as Address, id')
        ->where('county_id', $county_id)
        ->get();
        $result = $result->values()->all();
        return $result;  
    }
    

    public function getFerryById($id){
        return Ferry::find($id);
    }

    public function deleteFerryById($id){
        $Ferry= Ferry::find($id);
        $Ferry->delete();
        return 'Ferry deleted successfully';
    }
    public function getFerryReportForResidents($user_id){
        return UserBenefit::select('Ferry.name as Name')
        ->join('Users','UserBenefits.user_id','=','Users.id')
        ->join('Ferry','UserBenefits.benefit_id','=','Ferry.id')
        ->where('Users.id','=',$user_id)
        ->where('UserBenefits.benefit_type','=','Ferry')
        ->groupBy('Ferry.name')
        ->get();
    }
    public function getFerryReport(){
        return UserBenefit::selectRaw('Ferry.name as "Name",count(Ferry.id) as "Number of Residents registered"')
        ->join('Users','UserBenefits.user_id','=','Users.id')
        ->join('Ferry','UserBenefits.benefit_id','=','Ferry.id')
        ->where('UserBenefits.benefit_type','=','Ferry')
        ->groupBy('Ferry.id','Ferry.name')
        ->get();
    }
    public function getFerryReportForInspectors($county_id){
        return UserBenefit::selectRaw('Ferry.name as "Name",count(Ferry.id) as "Number of Residents registered"')
        ->join('Users','UserBenefits.user_id','=','Users.id')
        ->join('Ferry','UserBenefits.benefit_id','=','Ferry.id')
        ->where('UserBenefits.benefit_type','=','Ferry')
        ->where('Ferry.county_id','=',$county_id)  
        ->where('Users.county_id','=',$county_id)  
        ->groupBy('Ferry.id','Ferry.name')
        ->get();
    }
}
