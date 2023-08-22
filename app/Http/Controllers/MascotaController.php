<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mascota;

class MascotaController extends Controller
{
    // Mostrar una lista de mascotas
    public function index()
    {
        return Mascota::get();
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
        return response()->json($mascota);
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
