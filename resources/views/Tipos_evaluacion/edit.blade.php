@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Editar Tipo de Evaluación</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('tipos-evaluacion.update', $tipo->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="plan_de_estudios" class="form-label">Plan de Estudios</label>
            <input type="text" name="plan_de_estudios" id="plan_de_estudios" class="form-control" maxlength="1" value="{{ old('plan_de_estudios', $tipo->plan_de_estudios) }}" required>
        </div>

        <div class="mb-3">
            <label for="tipo_evaluacion" class="form-label">Tipo de Evaluación</label>
            <input type="text" name="tipo_evaluacion" id="tipo_evaluacion" class="form-control" maxlength="2" value="{{ old('tipo_evaluacion', $tipo->tipo_evaluacion) }}" required>
        </div>

        <div class="mb-3">
            <label for="descripcion_evaluacion" class="form-label">Descripción</label>
            <input type="text" name="descripcion_evaluacion" id="descripcion_evaluacion" class="form-control" maxlength="80" value="{{ old('descripcion_evaluacion', $tipo->descripcion_evaluacion) }}">
        </div>

        <div class="mb-3">
            <label for="descripcion_corta_evaluacion" class="form-label">Descripción Corta</label>
            <input type="text" name="descripcion_corta_evaluacion" id="descripcion_corta_evaluacion" class="form-control" maxlength="10" value="{{ old('descripcion_corta_evaluacion', $tipo->descripcion_corta_evaluacion) }}">
        </div>

        <div class="mb-3">
            <label for="calif_minima_aprobatoria" class="form-label">Calificación Mínima Aprobatoria</label>
            <input type="number" name="calif_minima_aprobatoria" id="calif_minima_aprobatoria" class="form-control" min="0" max="10" value="{{ old('calif_minima_aprobatoria', $tipo->calif_minima_aprobatoria) }}" required>
            <small class="text-muted">Debe estar entre 0 y 10</small>
        </div>

        <div class="mb-3">
            <label for="evaluacion_depende" class="form-label">Evaluación Depende</label>
            <input type="text" name="evaluacion_depende" id="evaluacion_depende" class="form-control" maxlength="2" value="{{ old('evaluacion_depende', $tipo->evaluacion_depende) }}">
        </div>

        <div class="mb-3">
            <label for="usocurso" class="form-label">Uso Curso</label>
            <select name="usocurso" id="usocurso" class="form-select" required>
                <option value="">Selecciona...</option>
                <option value="1" {{ old('usocurso', $tipo->usocurso) == 1 ? 'selected' : '' }}>Sí</option>
                <option value="0" {{ old('usocurso', $tipo->usocurso) == 0 ? 'selected' : '' }}>No</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="nosegundas" class="form-label">No Segundas</label>
            <select name="nosegundas" id="nosegundas" class="form-select" required>
                <option value="">Selecciona...</option>
                <option value="1" {{ old('nosegundas', $tipo->nosegundas) == 1 ? 'selected' : '' }}>Sí</option>
                <option value="0" {{ old('nosegundas', $tipo->nosegundas) == 0 ? 'selected' : '' }}>No</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="orden" class="form-label">Orden</label>
            <input type="number" name="orden" id="orden" class="form-control" value="{{ old('orden', $tipo->orden) }}">
        </div>

        <div class="mb-3">
            <label for="prioridad" class="form-label">Prioridad</label>
            <input type="number" name="prioridad" id="prioridad" class="form-control" value="{{ old('prioridad', $tipo->prioridad) }}">
        </div>

        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ route('tipos-evaluacion.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection



