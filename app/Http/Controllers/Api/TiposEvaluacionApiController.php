<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\TiposEvaluacion;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * Controlador API para la gestión de Tipos de Evaluación.
 *
 * Maneja las operaciones CRUD del recurso TiposEvaluacion
 * mediante endpoints REST, retornando respuestas en formato JSON.
 *
 * @package App\Http\Controllers\Api
 */
class TiposEvaluacionApiController extends Controller
{
    /**
     * Obtiene el listado completo de tipos de evaluación.
     *
     * @return JsonResponse
     *
     * @example GET /api/tipos-evaluacion
     */
    public function index(): JsonResponse
    {
        $tipos = TiposEvaluacion::all();
        return response()->json($tipos);
    }

    /**
     * Almacena un nuevo tipo de evaluación.
     *
     * @param Request $request
     * @return JsonResponse
     *
     * @example POST /api/tipos-evaluacion
     */
    public function store(Request $request): JsonResponse
    {
        $request->validate([
            'plan_de_estudios' => 'required|string|size:1',
            'tipo_evaluacion' => 'required|string|size:2',
            'descripcion_evaluacion' => 'nullable|string|max:80',
            'descripcion_corta_evaluacion' => 'nullable|string|max:10',
            'calif_minima_aprobatoria' => 'nullable|integer',
            'evaluacion_depende' => 'nullable|string|size:2',
            'usocurso' => 'nullable|string|size:1',
            'nosegundas' => 'nullable|string|size:1',
            'orden' => 'nullable|integer',
            'prioridad' => 'nullable|integer',
        ]);

        $tipo = TiposEvaluacion::create($request->all());
        return response()->json($tipo, 201);
    }

    /**
     * Muestra un tipo de evaluación específico.
     *
     * @param int $id
     * @return JsonResponse
     *
     * @example GET /api/tipos-evaluacion/{id}
     */
    public function show(int $id): JsonResponse
    {
        try {
            $tipo = TiposEvaluacion::findOrFail($id);
            return response()->json($tipo);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'error' => 'Tipo de evaluación no encontrado'
            ], 404);
        }
    }

    /**
     * Actualiza un tipo de evaluación existente.
     *
     * @param Request $request
     * @param int $id
     * @return JsonResponse
     *
     * @example PUT /api/tipos-evaluacion/{id}
     */
    public function update(Request $request, int $id): JsonResponse
    {
        $request->validate([
            'plan_de_estudios' => 'required|string|size:1',
            'tipo_evaluacion' => 'required|string|size:2',
            'descripcion_evaluacion' => 'nullable|string|max:80',
            'descripcion_corta_evaluacion' => 'nullable|string|max:10',
            'calif_minima_aprobatoria' => 'nullable|integer',
            'evaluacion_depende' => 'nullable|string|size:2',
            'usocurso' => 'nullable|string|size:1',
            'nosegundas' => 'nullable|string|size:1',
            'orden' => 'nullable|integer',
            'prioridad' => 'nullable|integer',
        ]);

        $tipo = TiposEvaluacion::findOrFail($id);
        $tipo->update($request->all());

        return response()->json($tipo);
    }

    /**
     * Elimina un tipo de evaluación.
     *
     * @param int $id
     * @return JsonResponse
     *
     * @example DELETE /api/tipos-evaluacion/{id}
     */
    public function destroy(int $id): JsonResponse
    {
        TiposEvaluacion::findOrFail($id)->delete();
        return response()->json(null, 204);
    }
}
