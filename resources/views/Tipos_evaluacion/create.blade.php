@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Agregar Tipo de Evaluación</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('tipos-evaluacion.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="plan_de_estudios" class="form-label">Plan de Estudios</label>
            <input type="text" name="plan_de_estudios" id="plan_de_estudios" class="form-control" maxlength="1" required>
        </div>

        <div class="mb-3">
            <label for="tipo_evaluacion" class="form-label">Tipo de Evaluación</label>
            <input type="text" name="tipo_evaluacion" id="tipo_evaluacion" class="form-control" maxlength="2" required>
        </div>

        <div class="mb-3">
            <label for="descripcion_evaluacion" class="form-label">Descripción</label>
            <input type="text" name="descripcion_evaluacion" id="descripcion_evaluacion" class="form-control" maxlength="80">
        </div>

        <div class="mb-3">
            <label for="descripcion_corta_evaluacion" class="form-label">Descripción Corta</label>
            <input type="text" name="descripcion_corta_evaluacion" id="descripcion_corta_evaluacion" class="form-control" maxlength="10">
        </div>

        <div class="mb-3">
            <label for="calif_minima_aprobatoria" class="form-label">Calificación Mínima Aprobatoria</label>
            <input type="number" name="calif_minima_aprobatoria" id="calif_minima_aprobatoria" class="form-control" min="0" max="10" required>
            <small class="text-muted">Debe estar entre 0 y 10</small>
        </div>

        <div class="mb-3">
            <label for="evaluacion_depende" class="form-label">Evaluación Depende</label>
            <input type="text" name="evaluacion_depende" id="evaluacion_depende" class="form-control" maxlength="2">
        </div>

        <div class="mb-3">
            <label for="usocurso" class="form-label">Uso Curso</label>
            <select name="usocurso" id="usocurso" class="form-select" required>
                <option value="">Selecciona...</option>
                <option value="1">Sí</option>
                <option value="0">No</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="nosegundas" class="form-label">No Segundas</label>
            <select name="nosegundas" id="nosegundas" class="form-select" required>
                <option value="">Selecciona...</option>
                <option value="1">Sí</option>
                <option value="0">No</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="orden" class="form-label">Orden</label>
            <input type="number" name="orden" id="orden" class="form-control">
        </div>

        <div class="mb-3">
            <label for="prioridad" class="form-label">Prioridad</label>
            <input type="number" name="prioridad" id="prioridad" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Guardar</button>
        <a href="{{ route('tipos-evaluacion.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection


