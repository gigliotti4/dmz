<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\Models\Proceso;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProcesoController extends Controller
{

    public function index()
    {
        $procesos = Proceso::all();
        return view('admin.procesos.index', compact('procesos'));
    }

    public function create()
    {
        return view('admin.procesos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string|max:255',
        ]);

        Proceso::create($request->all());

        return redirect()->route('admin.procesos.index')->with('success', 'Proceso creado exitosamente.');
    }

    public function edit($id)
    {
        $proceso = Proceso::findOrFail($id);
        return view('admin.procesos.edit', compact('proceso'));
    }
  
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string|max:255',
        ]);

        $proceso = Proceso::findOrFail($id);
        $proceso->update($request->all());

        return redirect()->route('admin.procesos.index')->with('success', 'Proceso actualizado exitosamente.');
    }
    public function destroy($id)
    {
        $proceso = Proceso::findOrFail($id);
        $proceso->delete();

        return redirect()->route('admin.procesos.index')->with('success', 'Proceso eliminado exitosamente.');
    }



}
