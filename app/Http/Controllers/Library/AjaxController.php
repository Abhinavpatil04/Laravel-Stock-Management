<?php

namespace App\Http\Controllers\Library;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class AjaxController extends Controller

{
    public function index() {
        $msg = "This is a simple message.";
        return response()->json(array('msg'=> $msg), 200);
     }
    public function fetchrecord(Request $request)
    {
        $data = DB::table("assets")->where('rfid_tag',$rfid)->get(); 
        return response()->json([
            'status' => 1,
            'status' => $data,
        ]);

        
        /*if($request->get('rfid'))
        {
            $rfid = $request->get('rfid');
            $data = DB::table("assets")->where('rfid_tag',$rfid)->count(); 
            if($data > 0)
            {
                echo"not_uniquw";
            }     
            else{
                echo"unique";
            }
        }*/
    }
}
