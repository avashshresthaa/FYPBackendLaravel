<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Covid;

class CovidController extends Controller
{
    //
    
public function getCovid()
{
    $data = Covid::with('children.children')->whereParentId(null)->get()->toArray();
    return response()->json([
        "message"=> "Data recieved",
        "data" => ["covid_details" => $data]
    ]);
}
}
