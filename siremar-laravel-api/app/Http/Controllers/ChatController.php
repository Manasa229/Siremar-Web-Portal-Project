<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Models\Chat;

class ChatController extends Controller
{
    public function addChat(Request $req){
        $chat = Chat::where('room', '=', $req->room)->firstOrFail();
       
        if ($chat === null) {
            $chat= new Chat;
            $chat->room= $req->room;
        $chat->user_id= $req->user_id;
        $chat->response= $req->response;
        $chat->message= $req->message;
        $chat->save();
        }else{
            Chat::where('room', $req->room)
            ->update(['response' => $req->response,'message'=>$req->message]);
          
        }
        
        return $chat;

    }
    public function getchats(){
        $result = Chat::selectRaw('room,response,message')->get();
        $result = $result->values()->all();
        return $result;     
    }
    public function updatechat(Request $req){
        // $chat = Chat::find($req->id);
        // $chat->room= $req->room;
        // $chat->user_id= $req->user_id;
        // $chat->response= $req->response;
        // $chat->message= $req->message;
        // $chat->save();
        // return $chat;     
    }
    public function getChatById($id){
        $result= Chat::selectRaw('room,response,message')
        ->where('room',$id)->get();
        $result = $result->values()->all();
        return $result;  
    }

    public function getAllChatsById($role_id){
        return Chat::selectRaw('Chats.room,Chats.response,Chats.message')
        ->join('Users','Chats.user_id','=','Users.id')
        ->where('Users.role_id','=',$role_id)
        ->get();
    }
}
