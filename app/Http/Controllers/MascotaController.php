<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mascota;

class MascotaController extends Controller
{
    // Mostrar una lista de mascotas
    public function index()
    {
        $mascotas = Mascota::all();
        return response()->json($mascotas);
    }

    // Mostrar el formulario de creación de mascotas
    public function create()
    {
        return view('mascotas.create');
    }

    // Almacenar una nueva mascota en la base de datos
    public function store(Request $request)
    {
       
        $mascotas = Mascota::create($request->post());
        return response()->json([
            'mascotas' => $mascotas
        ]);

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
        
     $mascota->fill($request->post())->save();
     return response()->json([

       'mascota' => $mascota
    ]);
}
    

    // Eliminar una mascota de la base de datos
    public function destroy(Mascota $mascota)
    {
        $mascota->delete();
        return response()->json([
          'mensaje' => 'Mascota Eliminada'
        ]);
    }
}

