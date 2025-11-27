@extends('layouts.app')

@section('title', 'Tipos de Evaluación')

@section('content')
<div class="container">
    <div class="row mb-4">
        <div class="col">
            <h2>Tipos de Evaluación</h2>
        </div>
        <div class="col text-end">
            <a href="{{ route('tipos-evaluacion.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-circle"></i> Nuevo Tipo
            </a>
        </div>
    </div>

    <!-- Mensajes -->
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <!-- Filtros -->
    <div class="card mb-3">
        <div class="card-body">
            <form action="{{ route('tipos-evaluacion.index') }}" method="GET" class="row g-3">
                <div class="col-md-4">
                    <input type="text" name="plan" class="form-control" placeholder="Plan de Estudios" value="{{ request('plan') }}">
                </div>
                <div class="col-md-4">
                    <input type="text" name="tipo" class="form-control" placeholder="Tipo de Evaluación" value="{{ request('tipo') }}">
                </div>
                <div class="col-md-4">
                    <input type="text" name="desc" class="form-control" placeholder="Descripción corta" value="{{ request('desc') }}">
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-primary w-100">Buscar</button>
                </div>
                @if(request()->hasAny(['plan','tipo','desc']))
                    <div class="col-12 mt-2">
                        <a href="{{ route('tipos-evaluacion.index') }}" class="btn btn-sm btn-secondary">
                            Limpiar filtros
                        </a>
                    </div>
                @endif
            </form>
        </div>
    </div>

    <!-- Tabla -->
    <div class="card">
        <div class="card-body">
            @if($tipos->count() > 0)
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead class="table-dark">
                            <tr>
                                <th>ID</th>
                                <th>Plan</th>
                                <th>Tipo</th>
                                <th>Descripción</th>
                                <th>Calif. Min.</th>
                                <th>Uso Curso</th>
                                <th>No Segundas</th>
                                <th>Orden</th>
                                <th>Prioridad</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($tipos as $tipo)
                                <tr>
                                    <td>{{ $tipo->id }}</td>
                                    <td>{{ $tipo->plan_de_estudios }}</td>
                                    <td>{{ $tipo->tipo_evaluacion }}</td>
                                    <td>{{ Str::limit($tipo->descripcion_evaluacion, 50) }}</td>
                                    <td>{{ $tipo->calif_minima_aprobatoria }}</td>
                                    <td>{{ $tipo->usocurso ? 'Sí' : 'No' }}</td>
                                    <td>{{ $tipo->nosegundas ? 'Sí' : 'No' }}</td>
                                    <td>{{ $tipo->orden }}</td>
                                    <td>{{ $tipo->prioridad }}</td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('tipos-evaluacion.show', $tipo->id) }}" class="btn btn-sm btn-info">Ver</a>
                                            <a href="{{ route('tipos-evaluacion.edit', $tipo->id) }}" class="btn btn-sm btn-warning">Editar</a>
                                            <form action="{{ route('tipos-evaluacion.destroy', $tipo->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Seguro de eliminar?')">Eliminar</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="mt-3">
                        {{ $tipos->appends(request()->query())->links() }}
                    </div>
                </div>
            @else
                <div class="alert alert-info">
                    No hay tipos de evaluación registrados.
                    <a href="{{ route('tipos-evaluacion.create') }}">Crear el primero</a>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection

