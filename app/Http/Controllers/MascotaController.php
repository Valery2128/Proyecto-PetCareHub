<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mascota;
use App\Models\CondicionSalud;
use Illuminate\Support\Facades\Auth;

class MascotaController extends Controller
{
    // Mostrar una lista de mascotas
    public function index()
    {       
      
        return Mascota::where('user_id',auth()->user()->id)->get();
    }
    public function viewindex()
    {
        return view('mascota.index');
    }
    public function registrarcontrol($id)
    {
        $mascota = Mascota::find($id);
        if ($mascota == null) {
            return redirect("/home");
        }
        return view('mascota.registrarcontrol', compact('mascota'));
    }
    public function registrarindicador($id)
    { 
        $mascota = Mascota::find($id);
        if ($mascota == null) {
            return redirect("/home");
        }
        return view('mascota.registrarindicador', compact('mascota'));
    }
    public function registrarsalud($id)
    { 
        $mascota = Mascota::find($id);
        if ($mascota == null) {
            return redirect("/home");
        }
        return view('mascota.registrarsalud', compact('mascota'));
    }
    public function reportes($id)
    { 
        $condiciones = CondicionSalud::where('id_mascota', $id)->get();
        $mascota = Mascota::find($id);
        return view('mascota.reportes', compact('condiciones', 'mascota'));
    }
    public function registrarsaludstore(Request $request)
    { 
        $input = $request->only('id', 'tipo_condicion', 'fecha_registro', 'descripcion');
        try {
            CondicionSalud::create([
                'id_mascota' => $input['id'],
                'tipo_condicion' => $input['tipo_condicion'],
                'fecha_registro' => $input['fecha_registro'],
                'descripcion' => $input['descripcion']
            ]);
            return redirect('/home')->with('success', 'Registro de salud creado');
        } catch (\Exception $e) {
            dd($e);
            return redirect('/home')->with('error', 'error');
        }
    }
    public function registrarseguimiento($id)
    { 
        $mascota = Mascota::find($id);
        if ($mascota == null) {
            return redirect("/home");
        }
        return view('mascota.registrarseguimiento', compact('mascota'));
    }
    public function registrarveterinario($id)
    { 
        $mascota = Mascota::find($id);
        if ($mascota == null) {
            return redirect("/home");
        }
        return view('mascota.registrarveterinario', compact('mascota'));
    }
    // Mostrar el formulario de creación de mascotas
    public function create(array $mascotas)
    {
        try {
            
            $response = Mascota::create([
                'nombre' => $mascotas['nombre'],
                'edad' => $mascotas($mascotas['edad']),
                'tipo_mascota' => $mascotas['tipo_mascota'],
                'rasgos_fisicos' => $mascotas['rasgos_fisicos'],
                'tipo_alimento' => $mascotas['tipo_alimento'],
                'recomendaciones_medicas' => $mascotas['recomendaciones_medicas'],

            ]);
            return response()->json([
                'msg' => "Item creado en la base de datos",
                'mascota' => $response
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'error' => $th->getMessage(),
                'file' => $th->getFile(),
                'line' => $th->getLine(),
            ]);
        }
    }

    // Almacenar una nueva mascota en la base de datos


    public function store(Request $request)
    {
        try {
            $mascota = new Mascota;
            // $mascota->create($request->all());
            $mascotaData = $request->post();
            $mascotaData['user_id'] = auth()->user()->id; // Asignar el ID del usuario autenticado esta perfecto 
            $mascota = Mascota::create($mascotaData);

            return response()->json([
                'msg' => "Item creado en la base de datos",
                'mascota' => $mascota
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'error' => $th->getMessage(),
                'file' => $th->getFile(),
                'line' => $th->getLine(),
            ]);
        }
    }




    // Mostrar el detalle de una mascota
    public function show(Mascota $mascota)
    {
        dd('Solicitud para obtener mascotas del usuario autenticado recibida.');
        
        $userId = auth()->user()->id;
        $mascotas = Mascota::where('user_id', $userId)->get();
        return response()->json(['mascotas' => $mascotas]);
    }

    // Mostrar el formulario de edición de una mascota
    public function edit(Mascota $mascota)
    {
        return view('mascotas.edit', compact('mascota'));
    }

    // Actualizar los datos de una mascota en la base de datos
    public function update(Request $request, Mascota $mascota)
    {
        try {
            //code...
            $mascota->update($request->all());
            $mascota->fill($request->post())->save();
            return response()->json([
                'msg' => "Item actualizado en la base de datos",
                'mascota' => $mascota
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'error' => $th->getMessage(),
                'file' => $th->getFile(),
                'line' => $th->getLine(),
            ]);
        }
    }
    public function mascotasDeUsuarioAutenticado()
    {
        
        $userId = auth()->user()->id; // no te creo jajajaja 
        dd($userId);
        $mascotas = Mascota::where('user_id', $userId)->get();
        return response()->json(['mascotas' => $mascotas]);
    }
    



    // Eliminar una mascota de la base de datos
    public function destroy(Mascota $mascota)
    {
        try {
            $mascota->delete();
            return response()->json([
                'msg' => "Item eliminado en la base de datos",
                'mascota' => $mascota
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'error' => $th->getMessage(),
                'file' => $th->getFile(),
                'line' => $th->getLine(),
            ]);
        }
    }
}
