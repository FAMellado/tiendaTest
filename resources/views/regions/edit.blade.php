@extends('layouts.backend')

@section('content')

<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Editar Región
                        <a href="{{ url('regions') }}" class="btn btn-success float-end">Volver</a>
                    </h4>
                </div>

                <div class="card-body">
                    <form action="{{ route('regions.update', $region->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="name">Nombre</label>
                            <input type="text" id="name" name="name" value="{{ $region->name }}" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-success">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
