<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;

class TodoController extends Controller
{
    //Show the homepage
    public function index(){
        $todo = Todo::orderByDesc('id')
                ->get();

        return view('homepage', ['todo' => $todo]);
    }

    public function addActivity(Request $req){
        $activity = $req->activity;
        $add = Todo::create([
            'activity'=>$activity,
            'done'=>0,
            'created_at'=>NOW(),
            'updated_at'=>NOW()
        ]);

        if($add){
            echo"Task successfuly insert!";
        }
        else{
            echo"gagal";
        }
    }

    public function checkActivity($id){
        $update = Todo::find($id);
        $update->done = 1;
        $update->updated_at = NOW();
        $update->save();

        return json_encode(array('statusCode'=>200));
    }

    public function unCheckActivity($id){
        $update = Todo::find($id);
        $update->done = 0;
        $update->updated_at = NOW();
        $update->save();

        return json_encode(array('statusCode'=>200));
    }
}
