<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Flight;
use App\Models\UserBenefit;

class FlightController extends Controller
{
    public function addFlight(Request $req){
        $Flight= new Flight;
        $Flight->airlines_name= $req->airlines_name;
        $Flight->date_of_departure= $req->date_of_departure;
        $Flight->flight_number= $req->flight_number;
        $Flight->flight_time= $req->flight_time;
        $Flight->destination= $req->destination;
        $Flight->county_id= $req->county_id;
        $Flight->benefits= $req->benefits;
        $Flight->save();
        return $Flight;

    }
    public function getFlights(){
        $result = Flight::selectRaw('airlines_name as Name, flight_number as "Flight number", date_of_departure as "Date of Departure",
        destination as Destination, flight_time as "Time of departure",benefits as Benefits, id')->get();
        $result = $result->values()->all();
        return $result;     
    }

    public function updateFlight(Request $req){
        $Flight = Flight::find($req->id);
        $Flight->id=$req->id;
        $Flight->airlines_name= $req->airlines_name;
        $Flight->date_of_departure= $req->date_of_departure;
        $Flight->flight_number= $req->flight_number;
        $Flight->flight_time= $req->flight_time;
        $Flight->destination= $req->destination;
        $Flight->county_id= $req->county_id;
        $Flight->benefits= $req->benefits;
        $Flight->save();
        return $Flight;  
    }

    public function getFlightsForResidents($user_id){
        return UserBenefit::select('UserBenefits.user_id', 'Flights.id', 'Flights.airlines_name as Name')
        ->rightJoin('Flights',function($join)use ($user_id) {
            $join->on('UserBenefits.benefit_id','=','Flights.id')
            ->where('UserBenefits.user_id','=',$user_id)
            ->where('UserBenefits.benefit_type','=','Flights');
        })
        ->groupBy('UserBenefits.user_id', 'Flights.id', 'Flights.airlines_name')
        ->get();
    }

    public function getFlightsForInspectors($county_id){
        $result = Flight::selectRaw('name as Name,CONCAT(street1, ",", street2) as Address, id')
        ->where('county_id', $county_id)
        ->get();
        $result = $result->values()->all();
        return $result;  
    }
    

    public function getFlightById($id){
        return Flight::find($id);
    }

    public function deleteFlightById($id){
        $Flight= Flight::find($id);
        $Flight->delete();
        return 'Flight deleted successfully';
    }
    public function getFlightReportForResidents($user_id){
        return UserBenefit::select('Flights.airlines_name as Name')
        ->join('Users','UserBenefits.user_id','=','Users.id')
        ->join('Flights','UserBenefits.benefit_id','=','Flights.id')
        ->where('Users.id','=',$user_id)
        ->where('UserBenefits.benefit_type','=','Flights')
        ->groupBy('Flights.airlines_name')
        ->get();
    }
    public function getFlightReport(){
        return UserBenefit::selectRaw('Flights.airlines_name as "Name",count(Flights.id) as "Number of Residents registered"')
        ->join('Users','UserBenefits.user_id','=','Users.id')
        ->join('Flights','UserBenefits.benefit_id','=','Flights.id')
        ->where('UserBenefits.benefit_type','=','Flights')
        ->groupBy('Flights.id','Flights.airlines_name')
        ->get();
    }
    public function getFlightsReportForInspectors($county_id){
        return UserBenefit::selectRaw('Flights.airlines_name as "Name",count(Flights.id) as "Number of Residents registered"')
        ->join('Users','UserBenefits.user_id','=','Users.id')
        ->join('Flights','UserBenefits.benefit_id','=','Flights.id')
        ->where('UserBenefits.benefit_type','=','Flights')
        ->where('Flights.county_id','=',$county_id)  
        ->where('Users.county_id','=',$county_id)  
        ->groupBy('Flights.id','Flights.airlines_name')
        ->get();
    }
}
