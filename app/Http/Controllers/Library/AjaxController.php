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
}
