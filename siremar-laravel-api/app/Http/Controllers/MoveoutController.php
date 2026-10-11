<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Models\Moveout;

class MoveoutController extends Controller
{


    public function addMoveout(Request $req){
        $Moveout= new Moveout;
        $Moveout->date_of_moveout= $req->date_of_moveout;
        $Moveout->moveout_time= $req->moveout_time;
        $Moveout->user_id= $req->user_id;
        $Moveout->save();

        
        return $Moveout;

    }
    public function getMoveouts(){
        return Moveout::selectRaw('CONCAT(first_name, ",", last_name)  as "Name",Moveouts.date_of_moveout as "Moveout date",Moveouts.moveout_time as "Moveout time",Moveouts.id')
        ->join('Users','Moveouts.user_id','=','Users.id')
        ->get();    
    }
    public function getMoveoutsForInspectors($county_id){
        return Moveout::selectRaw('CONCAT(first_name, ",", last_name)  as "Name",Moveouts.date_of_moveout as "Moveout date",Moveouts.moveout_time as "Moveout time",Moveouts.id')
        ->join('Users','Moveouts.user_id','=','Users.id')
        ->where('Users.county_id',$county_id)
        ->get(); 
    }
    public function updateMoveout(Request $req){
        $Moveout = Moveout::find($req->id);
        $Moveout->date_of_moveout= $req->date_of_moveout;
        $Moveout->moveout_time= $req->moveout_time;
        $Moveout->user_id= $req->user_id;
        $Moveout->save();
        return $Moveout;     
    }
    public function getMoveoutById($id){
        $result= Moveout::selectRaw('user_id,date_of_moveout,moveout_time')
        ->get();
        $result = $result->values()->all();
        return $result;  
    }

}
