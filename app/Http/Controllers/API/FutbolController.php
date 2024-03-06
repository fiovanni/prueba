<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class FutbolController extends Controller
{
    // auth
    // Registro user
    public function register(Request $request){
        // valida request
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed'
        ]);
        // excepciones *

        // inserta user
        $pass = Hash::make($request->password);
        
        $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = $pass;
        $user->save();

        // response
        return response()->json([
            'status' => 200,
            'errors' => [], 
            'message' => 'Registro de user exitoso',
            'data' => [
                'name' => $request->name,
                'email' => $request->email,
                'password' => $pass
            ]                  
        ], 200);
    }

    // Login user
    public function login(Request $request){
        // valida request
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        // excepxiones *

        // compara con bd
        $user = User::where('email', '=', $request->email)->first();
        // si existe
        if(isset($user->id)){
            // todo ok
            if(Hash::check($request->password, $user->password)){ 
                // crea token
                $token = $user->createToken("auth_token")->plainTextToken;

                return response()->json([
                    'status' => 200,
                    'errors' => [], 
                    'message' => 'User logeado exitosamente',
                    'data' => [
                        'acces_token' => $token
                    ]                  
                ], 200);

            // contraseña incorrecta
            }else{ 
                // response
                return response()->json([
                    'status' => 404,
                    'errors' => [], 
                    'message' => 'Contraseña incorrecta',
                    'data' => []                  
                ], 404);
            }
        
        }else{ 
            // si no existe
            // response
            return response()->json([
                'status' => 404,
                'errors' => [], 
                'message' => 'User no registrado',
                'data' => []                  
            ], 404);
        }
        
    }

    
    // logeado con el token
    // user actual
    public function userProfile(){
        // response
        return response()->json([
            'status' => 200,
            'errors' => [], 
            'message' => 'Token de user',
            'data' => auth()->user()                  
        ], 200);        
    }

    // Logout
    public function logout(){
        // borrar token de sesion del user
        auth()->user()->tokens()->delete();

        // response
        return response()->json([
            'status' => 200,
            'errors' => [], 
            'message' => 'Logout de user exitoso, sesión cerrada',
            'data' => []                  
        ], 200);  
    }   
        
        
    // Futbol
    // endpoints
}