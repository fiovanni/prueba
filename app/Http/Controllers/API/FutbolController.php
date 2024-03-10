<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Club;
use App\Models\Jugador;

class FutbolController extends Controller
{    
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
        //// por club
        $jugadores = Jugador::with('posicion','nacionalidad')->where('club_id', '=', $request->club_id);
           
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
        // mensajes
        // bail
    
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


    // Editar Jugador
    public function editarJugador(Request $request){
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
        // mensajes
        // bail

        // actualiza
        $jugador_actualizado = Jugador::where('id', $request->id)->update([
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
            'message' => 'Actualización de jugador exitosa',
            'data' => $jugador_actualizado
        ], 200);
    }


    // Borrar Jugador
    public function borrarJugador(Request $request){
        // busca
        $jugador=Jugador::find($request->id);
        // si existe
        if($jugador != null){
            // borrar
            $jugador->update(['estado' => 'inactivo']); //borrado logico
            // $jugador->delete(); //borrado fisico            

            // response
            return response()->json([
                'status' => 200,
                'errors' => [], 
                'message' => 'Borrado de jugador exitoso',
                'data' => $jugador
            ], 200);

        }else{            
            // si no existe
            // response
            return response()->json([
                'status' => 404,
                'errors' => [], 
                'message' => 'No existe registro',
                'data' => []
            ], 404);
        }
    }


    // Historiales de Jugadores
    public function historialesJugadores(Request $request){
        // $historialJugador = Historial::find($request->id)->first(); //get {id}        
        $historialJugador = Jugador::with('historial.club');
        // filtros
        // nombre
        if(isset($request->nombre)){
            $historialJugador = $historialJugador->where('nombre', '=', $request->nombre);
        }
        // apellido
        if(isset($request->apellido)){
            $historialJugador = $historialJugador->where('apellido', '=', $request->apellido);
        }
        // cuj
        if(isset($request->cuj)){
            $historialJugador = $historialJugador->where('cuj', '=', $request->cuj);
        }

        $historialJugador = $historialJugador->first();

        // si existe
        if($historialJugador != null){
            // response
            return response()->json([
                'status' => 200,
                'errors' => [], 
                'message' => '',
                'data' => $historialJugador
            ], 200);
            
        }else{
            // si no existe
            return response()->json([
                'status' => 404,
                'errors' => [], 
                'message' => 'No existe registro',
                'data' => []
            ], 404);
        }
    }
}