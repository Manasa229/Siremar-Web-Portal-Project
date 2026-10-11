<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserBenefit;

class UserController extends Controller
{
    public function addUser(Request $req){
        try{
        $User= new User;
        $User->first_name= $req->first_name;
        $User->last_name= $req->last_name;
        $User->dob= $req->dob;
        $User->email= $req->email;
        $User->role_id= $req->role_id;
        $User->phone_number= $req->phone_number;
        $User->street1= $req->street1;
        $User->street2= $req->street2;
        $User->county_id= $req->county_id;
        $User->password= $req->password;
        $User->save();
        return $User;
        }
        catch(Exception $e)
        {
        dd($e->getMessage());
        } 

    }

    public function addResident(Request $req){
        try{
        $User= new User;
        $User->first_name= $req->first_name;
        $User->last_name= $req->last_name;
        $User->dob= $req->dob;
        $User->email= $req->email;
        $User->role_id= 2;
        $User->phone_number= $req->phone_number;
        $User->street1= $req->street1;
        $User->street2= $req->street2;
        $User->county_id= $req->county_id;
        $User->password=$req->last_name . substr($req->phone_number, 0,-6);
        $User->save();
        return $User;
        }
        catch(Exception $e)
        {
        dd($e->getMessage());
        } 

    }

    public function updateResident(Request $req){
        $User = User::find($req->id);
        $User->first_name= $req->first_name;
        $User->last_name= $req->last_name;
        $User->dob= $req->dob;
        $User->email= $req->email;
        $User->role_id= $req->role_id;
        $User->phone_number= $req->phone_number;
        $User->street1= $req->street1;
        $User->street2= $req->street2;
        $User->county_id= $req->county_id;
        $User->password= $req->password;
        $User->save();
        return $User;  
    }

    public function addInspector(Request $req){
        try{
        $User= new User;
        $User->first_name= $req->first_name;
        $User->last_name= $req->last_name;
        $User->dob= $req->dob;
        $User->email= $req->email;
        $User->role_id= 1;
        $User->phone_number= $req->phone_number;
        $User->street1= $req->street1;
        $User->street2= $req->street2;
        $User->county_id= $req->county_id;
        $User->password=$req->last_name . substr($req->phone_number, 0,-6);
        $User->save();
        return $User;
        }
        catch(Exception $e)
        {
        dd($e->getMessage());
        } 

    }

    public function updateInspector(Request $req){
        $User = User::find($req->id);
        $User->first_name= $req->first_name;
        $User->last_name= $req->last_name;
        $User->dob= $req->dob;
        $User->email= $req->email;
        $User->role_id= $req->role_id;
        $User->phone_number= $req->phone_number;
        $User->street1= $req->street1;
        $User->street2= $req->street2;
        $User->county_id= $req->county_id;
        $User->password= $req->password;
        $User->save();
        return $User;  
    }


    public function getUsers(){
        $result = User::selectRaw('CONCAT(first_name, " ", last_name) as Name,  CONCAT(IFNULL(users.street1, ""),
        " ",users.street2)  as Address, id')->get();
        $result = $result->values()->all();
        return $result;     
    }

    public function getResidents(){
        $result = User::selectRaw('CONCAT(first_name, " ", last_name) as Name,  CONCAT(IFNULL(users.street1, ""),
        " ",users.street2)  as Address,email as Email, phone_number as "Phone Number", id')
        ->where('role_id', 2)
        ->get();
        $result = $result->values()->all();
        return $result;     
    }

    public function getUsersForResidents($user_id){
        return UserBenefit::select('userId','Users.name')
        ->rightJoin('Users', 'UserBenefits.benefit_id', '=', 'Users.id')
        ->where('UserBenefits.user_id', $user_id)
        ->get();
    }

    public function getUsersForAdmin($county_id){
        $result = User::selectRaw('name as Name,CONCAT(street1, ",", street2) as Address, id')
        ->where('role_id',2)
        ->get();
        $result = $result->values()->all();
        return $result;  
    }

    public function getResidentsForInspectors($county_id){
        $result = User::selectRaw('name as Name,CONCAT(street1, ",", street2) as Address, id')
        ->where('county_id', $county_id)
        ->where('role_id',2)
        ->get();
        $result = $result->values()->all();
        return $result;  
    }

    public function getInspectors(){
        $result = User::selectRaw('CONCAT(first_name, " ", last_name) as Name,  CONCAT(IFNULL(users.street1, ""),
        " ",users.street2)  as Address,email as Email, phone_number as "Phone Number", id')
        ->where('role_id',1)
        ->get();
        $result = $result->values()->all();
        return $result;
    }
    

    public function getUserById($id){
        return User::find($id);
    }

    public function deleteUserById($id){
        $User= User::find($id);
        $User->delete();
        return 'User deleted successfully';
    }
}
