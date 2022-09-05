<?php

namespace App\Http\Controllers\Library;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class AjaxController extends Controller

{
    public function getBookDetails($rfidTag = 0): \Illuminate\Http\JsonResponse
    {
        $bookDetails['data'] = DB::table('assets')
            ->orderBy("id")
            ->select('id','name','author','publication','edition','language','cost')
            ->where('rfid_tag',$rfidTag)
            ->get();

        return response()->json($bookDetails);
    }
    public function getmemberDetails($rfid = 0): \Illuminate\Http\JsonResponse
    {
        $memberDetails['data'] = DB::table('users')
            ->orderBy("id")
            ->select('id','fname','lname','email','mobile')
            ->where('rfid_tag',$rfid)
            ->get();

       return response()->json($memberDetails);
    }
    public function getRfidTag($bookid = null): \Illuminate\Http\JsonResponse
    {
        $bookrfidtag['data'] = DB::table('assets')
            ->orderBy("id")
            ->select('id','rfid_tag')
            ->where('id',$bookid)
            ->get();


       return response()->json($bookrfidtag);
    }
    public function getMember($memberno = null): \Illuminate\Http\JsonResponse
    {
        $memberRfigtag['data'] = DB::table('users')
            ->orderBy("id")
            ->select('id','rfid_tag')
            ->where('id',$memberno)
            ->get();


       return response()->json($memberRfigtag);
    }
}
