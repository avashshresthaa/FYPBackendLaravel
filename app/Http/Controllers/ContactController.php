<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    //
    function list(){
        $data = Contact::all();
        return response()->json([
            "message" => "Data retrieved",
            "data" => $data
        ]);
    }
}
