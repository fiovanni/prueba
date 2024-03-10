<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    // Registro User
    public function register(Request $request){
        try{
            // valida request
            $request->validate([
                'name' => 'required',
                'email' => 'required|email|unique:users',
                'password' => 'required|confirmed'
            ]);

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
        
        // captura exception
        }catch(ValidationException $e){
            // manejo de mensajes
            $errors = $e->validator->getMessageBag();
            // response
            return response()->json([
                'status' => 422,
                'errors' => $errors->keys(), 
                'message' => 'Error de validación',
                'data' => $errors->first()
            ], 422);
        }
    }


    // Login User
    public function login(Request $request){
        // try
            // valida request
            $request->validate([
                'email' => 'required|email',
                'password' => 'required'
            ]);
                    
            // compara con bd
            $user = User::where('email', '=', $request->email)->first();
            // si existe
            if(isset($user->id)){
                // todo ok
                if(Hash::check($request->password, $user->password)){ 
                    // crea token
                    $token = $user->createToken("auth_token")->plainTextToken;
                    // response
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


    // Logeado------------------
    // User Actual
    public function userProfile(){
        // response
        return response()->json([
            'status' => 200,
            'errors' => [], 
            'message' => 'Token de user',
            'data' => auth()->user()                  
        ], 200);        
    }


    // Log Out
    public function logout(){
        // borra token de sesion
        auth()->user()->tokens()->delete();

        // response
        return response()->json([
            'status' => 200,
            'errors' => [], 
            'message' => 'Logout de user exitoso, sesión cerrada',
            'data' => []                  
        ], 200);  
    }  
}
