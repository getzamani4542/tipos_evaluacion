<?php

namespace App\Http\Controllers;

use App\Models\TiposEvaluacion;
use Illuminate\Http\Request;

class TiposEvaluacionController extends Controller
{
    public function index()
    {
       
        $tipos = TiposEvaluacion::orderBy('prioridad')
                                 ->orderBy('orden')
                                 ->paginate(10);
        return view('tipos_evaluacion.index', compact('tipos'));
    }

    public function create()
    {
        return view('tipos_evaluacion.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'plan_de_estudios' => 'required|string|max:100',
            'tipo_evaluacion' => 'required|string|max:100',
            'descripcion_evaluacion' => 'required|string|max:255',
            'descripcion_corta_evaluacion' => 'nullable|string|max:100',
            'calif_minima_aprobatoria' => 'required|numeric|min:0|max:10',
            'evaluacion_depende' => 'nullable|string|max:100',
            'usocurso' => 'boolean',
            'nosegundas' => 'boolean',
            'orden' => 'integer',
            'prioridad' => 'integer',
        ]);

        try {
            TiposEvaluacion::create($validatedData);
            return redirect()->route('tipos-evaluacion.index')
                             ->with('success', 'Tipo de evaluación creado exitosamente');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()
                             ->with('error', 'Error al crear el tipo de evaluación: ' . $e->getMessage());
        }
    }

    public function show($id)
    {
        $tipo = TiposEvaluacion::findOrFail($id);
        return view('tipos_evaluacion.show', compact('tipo'));
    }

    public function edit($id)
    {
        $tipo = TiposEvaluacion::findOrFail($id);
        return view('tipos_evaluacion.edit', compact('tipo'));
    }

    public function update(Request $request, $id)
    {
        $tipo = TiposEvaluacion::findOrFail($id);

        $validatedData = $request->validate([
            'plan_de_estudios' => 'required|string|max:100',
            'tipo_evaluacion' => 'required|string|max:100',
            'descripcion_evaluacion' => 'required|string|max:255',
            'descripcion_corta_evaluacion' => 'nullable|string|max:100',
            'calif_minima_aprobatoria' => 'required|numeric|min:0|max:10',
            'evaluacion_depende' => 'nullable|string|max:100',
            'usocurso' => 'boolean',
            'nosegundas' => 'boolean',
            'orden' => 'integer',
            'prioridad' => 'integer',
        ]);

        try {
            $tipo->update($validatedData);
            return redirect()->route('tipos-evaluacion.index')
                             ->with('success', 'Tipo de evaluación actualizado exitosamente');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()
                             ->with('error', 'Error al actualizar el tipo de evaluación: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $tipo = TiposEvaluacion::findOrFail($id);
            $nombre = $tipo->tipo_evaluacion;
            $tipo->delete();

            return redirect()->route('tipos-evaluacion.index')
                             ->with('success', "El tipo de evaluación '$nombre' fue eliminado exitosamente");
        } catch (\Exception $e) {
            return redirect()->route('tipos-evaluacion.index')
                             ->with('error', 'Error al eliminar el tipo de evaluación: ' . $e->getMessage());
        }
    }
}
