@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Detalles del Tipo de Evaluación</h1>

    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <td>{{ $tipo->id }}</td>
        </tr>
        <tr>
            <th>Plan de Estudios</th>
            <td>{{ $tipo->plan_de_estudios }}</td>
        </tr>
        <tr>
            <th>Tipo de Evaluación</th>
            <td>{{ $tipo->tipo_evaluacion }}</td>
        </tr>
        <tr>
            <th>Descripción</th>
            <td>{{ $tipo->descripcion_evaluacion }}</td>
        </tr>
        <tr>
            <th>Descripción Corta</th>
            <td>{{ $tipo->descripcion_corta_evaluacion }}</td>
        </tr>
        <tr>
            <th>Calif. Mínima Aprobatoria</th>
            <td>{{ $tipo->calif_minima_aprobatoria }}</td>
        </tr>
        <tr>
            <th>Evaluación Depende</th>
            <td>{{ $tipo->evaluacion_depende }}</td>
        </tr>
        <tr>
            <th>Uso Curso</th>
            <td>{{ $tipo->usocurso }}</td>
        </tr>
        <tr>
            <th>No Segundas</th>
            <td>{{ $tipo->nosegundas }}</td>
        </tr>
        <tr>
            <th>Orden</th>
            <td>{{ $tipo->orden }}</td>
        </tr>
        <tr>
            <th>Prioridad</th>
            <td>{{ $tipo->prioridad }}</td>
        </tr>
    </table>

    <a href="{{ route('tipos-evaluacion.index') }}" class="btn btn-secondary">Volver</a>
    <a href="{{ route('tipos-evaluacion.edit', $tipo->id) }}" class="btn btn-primary">Editar</a>
</div>
@endsection
