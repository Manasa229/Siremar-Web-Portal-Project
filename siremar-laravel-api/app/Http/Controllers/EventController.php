<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\UserBenefit;

class EventController extends Controller
{
    public function addEvent(Request $req){
        $Event= new Event;
        $Event->name= $req->name;
        $Event->date_of_event= $req->date_of_event;
        $Event->street1= $req->street1;
        $Event->event_time= $req->event_time;
        $Event->street2= $req->street2;
        $Event->county_id= $req->county_id;
        $Event->benefits= $req->benefits;
        $Event->save();
        return $Event;  

    }
    public function getEvents(){
        $result = Event::selectRaw('name as Name,  date_of_event as "Date of Event",CONCAT(IFNULL(events.street1, ""),
        " ",events.street2)  as Address, phone_number as "Phone Number",event_time as "Time at event starts",benefits as Benefits, id')->get();
        $result = $result->values()->all();
        return $result;     
    }

    public function updateEvent(Request $req){
        $Event = Event::find($req->id);
        $Event->id=$req->id;
        $Event->name= $req->name;
        $Event->date_of_event= $req->date_of_event;
        $Event->street1= $req->street1;
        $Event->event_time= $req->event_time;
        $Event->street2= $req->street2;
        $Event->county_id= $req->county_id;
        $Event->benefits= $req->benefits;
        $Event->save();
        return $Event;  
    }

    public function getEventsForResidents($user_id){
        return UserBenefit::select('UserBenefits.user_id', 'Events.id', 'Events.name')
        ->rightJoin('Events',function($join)use ($user_id) {
            $join->on('UserBenefits.benefit_id','=','Events.id')
            ->where('UserBenefits.user_id','=',$user_id)
            ->where('UserBenefits.benefit_type','=','Events');
        })
        ->groupBy('UserBenefits.user_id', 'Events.id', 'Events.name')
        ->get();
    }

    public function getEventsForInspectors($county_id){
        $result = Event::selectRaw('name as Name,CONCAT(street1, ",", street2) as Address, id')
        ->where('county_id', $county_id)
        ->get();
        $result = $result->values()->all();
        return $result;  
    }
    
    public function getEventById($id){
        return Event::find($id);
    }

    public function deleteEventById($id){
        $Event= Event::find($id);
        $Event->delete();
        return 'Event deleted successfully';
    }
    public function getEventReport(){
        return UserBenefit::selectRaw('Events.name as "Name",count(Events.id) as "Number of Residents registered"')
        ->join('Users','UserBenefits.user_id','=','Users.id')
        ->join('Events','UserBenefits.benefit_id','=','Events.id')
        ->where('UserBenefits.benefit_type','=','Events')
        ->groupBy('Events.id','Events.name')
        ->get();
    }
    public function getEventsReportForInspectors($county_id){
        return UserBenefit::selectRaw('Events.name as "Name",count(Events.id) as "Number of Residents registered"')
        ->join('Users','UserBenefits.user_id','=','Users.id')
        ->join('Events','UserBenefits.benefit_id','=','Events.id')
        ->where('UserBenefits.benefit_type','=','Events')
        ->where('Events.county_id','=',$county_id)  
        ->where('Users.county_id','=',$county_id)  
        ->groupBy('Events.id','Events.name')
        ->get();
    }
}
