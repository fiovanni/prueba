<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Club;
use App\Models\Jugador;

class FutbolController extends Controller
{
    // Auth----------------------------------------------
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
        // excepciones *

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

        
    // Logeado
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
    
    
    // Futbol----------------------------------------------
    // Listado de Clubes
    public function clubes(Request $request){            
        //filtro nombre
        if(isset($request->nombre)){
            $clubes = Club::where('nombre', '=', $request->nombre)->first(); // club
        }else{
            $clubes = Club::all(); //clubes
        }

        // response
        return response()->json([
            'status' => 200,
            'errors' => [], 
            'message' => '',
            'data' => $clubes          
        ], 200);
    }

    
    // Listado de Jugadores 
    public function jugadores(Request $request){            
        // por club
        $jugadores = Jugador::where('club_id', '=', $request->club_id);                
                        
        //filtros
        // posicion
        if(isset($request->posicion_id)){
            $jugadores = $jugadores->where('posicion_id', '=', $request->posicion_id);
        }
        // nacionalidad
        if(isset($request->nacionalidad_id)){
            $jugadores = $jugadores->where('nacionalidad_id', '=', $request->nacionalidad_id);
        }        
        // cuj
        if(isset($request->cuj)){
            $jugadores = $jugadores->where('cuj', '=', $request->cuj);
        }
        // edad
        if(isset($request->edad)){
            $jugadores = $jugadores->where('edad', '=', $request->edad);
        }

        $jugadores = $jugadores->get();
        
        // response
        return response()->json([
            'status' => 200,
            'errors' => [], 
            'message' => '',
            'data' => $jugadores          
        ], 200);
    }


    // Crear Jugador        
    public function crearJugador(Request $request){
        // valida request
        $request->validate([
            'club_id' => 'required',
            'posicion_id' => 'required',
            'nacionalidad_id' => 'required',
            'nombre' => 'required',
            'apellido' => 'required',
            'cuj' => 'required|unique:jugadores',
            'edad' => 'required',
            'nro_camiseta' => 'required'            
        ]);
        // excepciones *
    
        // inserta         
        $nuevo_jugador = Jugador::create([
            'club_id' => $request->club_id, 
            'posicion_id' => $request->posicion_id, 
            'nacionalidad_id' => $request->nacionalidad_id, 
            'nombre' => $request->nombre, 
            'apellido' => $request->apellido, 
            'cuj' => $request->cuj, 
            'edad' => $request->edad,
            'nro_camiseta' => $request->nro_camiseta, 
            'descripcion' => $request->descripcion 
        ]);

        // response
        return response()->json([
            'status' => 200,
            'errors' => [], 
            'message' => 'Registro de jugador exitoso',
            'data' => $nuevo_jugador
        ], 200);
    }


    public function editarJugador(Request $request){
        // valida request
        // $request->validate([
        //     'club_id' => 'required',
        //     'posicion_id' => 'required',
        //     'nacionalidad_id' => 'required',
        //     'nombre' => 'required',
        //     'apellido' => 'required',
        //     'cuj' => 'required|unique:jugadores',
        //     'edad' => 'required',
        //     'nro_camiseta' => 'required'            
        // ]);
        // // excepciones *

        // actualiza
        // $jugador_actualizado = Jugador::where('id', $request->id)->update([
        //     'club_id' => $request->club_id, 
        //     'posicion_id' => $request->posicion_id, 
        //     'nacionalidad_id' => $request->nacionalidad_id, 
        //     'nombre' => $request->nombre, 
        //     'apellido' => $request->apellido, 
        //     'cuj' => $request->cuj, 
        //     'edad' => $request->edad,
        //     'nro_camiseta' => $request->nro_camiseta, 
        //     'descripcion' => $request->descripcion     
        // ]);
        
        // 'data' => request()->id
        
        // response
        // return response()->json([
            // 'status' => 200,
            // 'errors' => [], 
            // 'message' => 'Actualización de jugador exitosa',
            // 'data' => $jugador_actualizado
        // ], 200);
    }

    //eliminar()
    //ultimaquery()
}