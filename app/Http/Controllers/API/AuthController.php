<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use function PHPUnit\Framework\isTrue;


class AuthController extends Controller
{
    //
    public function register(Request $request)
    {
        $data = $request->validate([
            'name'=>'required|string|max:191',
            'email'=>'required|email|max:191|unique:users,email',
            'password'=>'required|string'

        ]);

        $user = User::create([
            'name'=> $data['name'],
            'email'=> $data['email'],

            // Hashmake will bycrypte the password
            'password'=> Hash::make($data['password']),

        ]);

        //Creating a token

        $token = $user->createToken('yourWellbeingToken')->plainTextToken;
        $isTrue = true;

        $response = [
            'created' => $isTrue,
            'user' => $user,
            'token' => $token,
        ];

        return response($response, 201);
    }

    public function logout()
    {

        auth()->user()->tokens()->delete(); 
        //Auth::logout();    
        return response(['message' => 'Logged out successfully']);
    }

    public function login(Request $request)
    {
        $data = $request->validate([
            
            'email'=>'required|email|max:191',
            'password'=>'required|string'

        ]);


        //user variable created to call User model email is coming from the user table  $data is the input field value
        $user = User::where('email', $data['email'])->first();


        // if else condition used to check the data and password
        // Input field password was checked

        if(!$user || !Hash::check($data['password'], $user->password))
        {
            return response(['message'=>'Invalid Credential'], 401);
        }
        else
        {
            $token = $user->createToken('yourWellbeingToken')->plainTextToken;
            $response = [
                'user' => $user,
                'token' => $token,
            ]; 
            
            return response($response, 200);

        }
    }

    
}
