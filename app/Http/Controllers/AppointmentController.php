<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppointmentController extends Controller
{
    //


    
    public function doctorap() //Getting all the list of appointments made
    {
        //doctor appointment show

        $docappointment = Appointment::where('doctorName',auth()->user()->name)->get();  
        return response()->json(['appointments'=>$docappointment], 200);
    }


    public function index() //Getting all the list of appointments made
    {
        //doctor appointment show

       // return Appointment::where('doctorName',auth()->user()->name)->get();  

        $userId = Auth::user()->id;
        

        $appointment = Appointment::whereUserId($userId)->get();
        return response()->json(['appointments'=>$appointment], 200);
    }

    public function store(Request $request)
    {

        $request->validate([
            'name'=>'required|max:191',
            'age'=>'required|max:100',
            'doctorName'=>'required|max:191',
            'hospitalName'=>'required|max:191',
        ]);

        $data = Appointment::where([
            ['datetime', '=', $request->datetime],
            ['hospitalName', '=', $request->hospitalName]
        ])->get();  


        if(count($data) > 0) {
            return response()->json(['message'=>'Appointment already exist'],200);
        }


        $appointment = new Appointment;
        $appointment->name = $request->name;
        $appointment->age = $request->age;
        $appointment->gender = $request->gender;
        $appointment->phone = $request->phone;
        $appointment->datetime = $request->datetime;
        $appointment->doctorName = $request->doctorName;
        $appointment->hospitalName = $request->hospitalName;
        $appointment->describeProblem = $request->describeProblem;
        $appointment->payment = $request->payment;
        $appointment->user_id = Auth::user()->id;

        $appointment->save();
        return response()->json(['message'=>'Appointment created Successfully'],200);

    }


    public function update(Request $request, $id)
    {

        // $request->validate([
        //     'name'=>'required|max:191',
        //     'age'=>'required|max:100',
        //     'doctorName'=>'required|max:191',
        //     'hospitalName'=>'required|max:191',
        // ]);


        $appointment = Appointment::find($id);
        //if product is found
        if($appointment){
        $appointment->name = $request->name;
        $appointment->age = $request->age;
        $appointment->gender = $request->gender;
        $appointment->phone = $request->phone;
        $appointment->datetime = $request->datetime;
        $appointment->doctorName = $request->doctorName;
        $appointment->hospitalName = $request->hospitalName;
        $appointment->describeProblem = $request->describeProblem;
        $appointment->payment = $request->payment;
        $appointment->update();
        return response()->json(['message'=>'Appointment updated Successfully'],200);
        }
        else
        {
            return response()->json(['message'=>'No Product Found'],404);

        }

    }

    public function destroy($id)
    {
        $appointment = Appointment::find($id);
        if($appointment)
        {
            $appointment->delete();
            return response()->json(['message'=> 'Appointment Deleted Successfully'],200);

        }
        else
        {
            return response()->json(['message'=> 'No Such Appointments Found'], 404);
        }
    }

}
