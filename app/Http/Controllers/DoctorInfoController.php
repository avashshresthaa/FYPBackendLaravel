<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DoctorInfo;

class DoctorInfoController extends Controller
{
    //
    public function getDoctorInfo()
    {
        $data = DoctorInfo::all();
        return $data;
    }
}
