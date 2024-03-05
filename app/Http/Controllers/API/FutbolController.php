<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class FutbolController extends Controller
{
    // Autenticacion
    public function register(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed'
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->save();

        return response()->json([
            // "status" => 1,
            // "msg" => 'Registro de user exitoso'

            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password            
        ]);
    }

    // public function login(Request $request){
        
    // }

    
    // public function showProfile(){
        
    // }

    // public function logout(){
        
    // }       
    
    
    // Futbol
}