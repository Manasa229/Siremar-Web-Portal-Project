<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Clinic;
use App\Models\UserBenefit;

class ClinicController extends Controller
{
    public function addClinic(Request $req){
        $Clinic= new Clinic;
        $Clinic->name= $req->name;
        $Clinic->phone_number= $req->phone_number;
        $Clinic->street1= $req->street1;
        $Clinic->street2= $req->street2;
        $Clinic->county_id= $req->county_id;
        $Clinic->benefits= $req->benefits;
        $Clinic->save();
        return $Clinic;

    }
    public function getClinics(){
        $result = Clinic::selectRaw('name as Name,  CONCAT(IFNULL(clinics.street1, ""),
        " ",clinics.street2)  as Address, phone_number as "Phone Number",benefits as Benefits, id')->get();
        $result = $result->values()->all();
        return $result;     
    }

    public function updateClinic(Request $req){
        $Clinic = Clinic::find($req->id);
        $Clinic->id=$req->id;
        $Clinic->name= $req->name;
        $Clinic->phone_number= $req->phone_number;
        $Clinic->street1= $req->street1;
        $Clinic->street2= $req->street2;
        $Clinic->county_id= $req->county_id;
        $Clinic->benefits= $req->benefits;
        $Clinic->save();
        return $Clinic;   
    }

    public function getClinicsForResidents($user_id){
        return UserBenefit::select('UserBenefits.user_id', 'Clinics.id', 'Clinics.name')
        ->rightJoin('Clinics',function($join)use ($user_id) {
            $join->on('UserBenefits.benefit_id','=','Clinics.id')
            ->where('UserBenefits.user_id','=',$user_id)
            ->where('UserBenefits.benefit_type','=','Clinics');
        })
        ->groupBy('UserBenefits.user_id', 'Clinics.id', 'Clinics.name')
        ->get();
    }

    public function getClinicsForInspectors($county_id){
        $result = Clinic::selectRaw('name as Name,CONCAT(street1, ",", street2) as Address, id')
        ->where('county_id', $county_id)
        ->get();
        $result = $result->values()->all();
        return $result;  
    }
    

    public function getClinicById($id){
        return Clinic::find($id);
    }

    public function deleteClinicById($id){
        $Clinic= Clinic::find($id);
        $Clinic->delete();
        return 'Clinic deleted successfully';
    }
    public function getClinicReportForResidents($user_id){
        return UserBenefit::select('Clinics.name as Name')
        ->join('Users','UserBenefits.user_id','=','Users.id')
        ->join('Clinics','UserBenefits.benefit_id','=','Clinics.id')
        ->where('Users.id','=',$user_id)
        ->where('UserBenefits.benefit_type','=','Clinics')
        ->groupBy('Clinics.name')
        ->get();
    }
    public function getClinicReport(){
        return UserBenefit::selectRaw('Clinics.name as "Name",count(Clinics.id) as "Number of Residents registered"')
        ->join('Users','UserBenefits.user_id','=','Users.id')
        ->join('Clinics','UserBenefits.benefit_id','=','Clinics.id')
        ->where('UserBenefits.benefit_type','=','Clinics')
        ->groupBy('Clinics.id','Clinics.name')
        ->get();
    }
    public function getClinicsReportForInspectors($county_id){
        return UserBenefit::selectRaw('Clinics.name as "Name",count(Clinics.id) as "Number of Residents registered"')
        ->join('Users','UserBenefits.user_id','=','Users.id')
        ->join('Clinics','UserBenefits.benefit_id','=','Clinics.id')
        ->where('UserBenefits.benefit_type','=','Clinics')
        ->where('Clinics.county_id','=',$county_id)  
        ->where('Users.county_id','=',$county_id)  
        ->groupBy('Clinics.id','Clinics.name')
        ->get();
    }
}
