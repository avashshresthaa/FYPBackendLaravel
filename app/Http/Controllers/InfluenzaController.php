<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Influenza;

class InfluenzaController extends Controller
{
    //
    public function getInfluenza()
    {
        $data = Influenza::with('children.children')->whereParentId(null)->get()->toArray();
        return response()->json([
            "message"=> "Data recieved",
            "data" => ["influenza_details" => $data]
        ]);
    }
}
