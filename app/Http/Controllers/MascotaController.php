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
        return Mascota::create([
            'nombre' => $mascotas['nombre'],
            'edad' => $mascotas($mascotas['edad']),
            'tipo_mascota' => $mascotas['tipo_mascota'],
            'rasgos_fisicos' => $mascotas['rasgos_fisicos'],
            'tipo_alimento' => $mascotas['tipo_alimento'],
            'recomendaciones_medicas' => $mascotas['recomendaciones_medicas'],
         
        ]);
    }

    // Almacenar una nueva mascota en la base de datos
  
       
        public function store(Request $request)
        {
            $mascota = new Mascota;
            $mascota->create($request -> all());
            // $mascotaData = $request->post();
            $mascotaData['user_id'] = auth()->user()->id; // Asignar el ID del usuario autenticado
            // $mascota = Mascota::create($mascotaData);
        
            return response()->json([
                'mascota' => $mascota
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
        $mascota->update($request -> all());
    //  $mascota->fill($request->post())->save();
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

