@extends('layouts.backend')

@section('css_before')
<!-- SweetAlert CDN -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<!-- SweetAlert Script -->
<script src="{{ asset('js/sweetAlert.js') }}"></script>

<!-- Page JS Plugins CSS -->
<link rel="stylesheet" href="{{ asset('js/plugins/datatables-bs5/css/dataTables.bootstrap5.min.css') }}">
<link rel="stylesheet" href="{{ asset('js/plugins/datatables-buttons-bs5/css/buttons.bootstrap5.min.css') }}">
@endsection

@section('js_after')
<!-- jQuery (required for DataTables plugin) -->
<script src="{{ asset('js/lib/jquery.min.js') }}"></script>

<!-- Page JS Plugins -->
<script src="{{ asset('js/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('js/plugins/datatables-bs5/js/dataTables.bootstrap5.min.js') }}"></script>
<script src="{{ asset('js/plugins/datatables-buttons/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('js/plugins/datatables-buttons-bs5/js/buttons.bootstrap5.min.js') }}"></script>
<script src="{{ asset('js/plugins/datatables-buttons-jszip/jszip.min.js') }}"></script>
<script src="{{ asset('js/plugins/datatables-buttons-pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ asset('js/plugins/datatables-buttons-pdfmake/vfs_fonts.js') }}"></script>
<script src="{{ asset('js/plugins/datatables-buttons/buttons.print.min.js') }}"></script>
<script src="{{ asset('js/plugins/datatables-buttons/buttons.html5.min.js') }}"></script>

<!-- Page JS Code -->
<script src="{{ asset('js/pages/tables_datatables.js') }}"></script>
@endsection

@if (session('status'))
<meta name="status-message" content="{{ session('status') }}">
@endif

@section('content')
<div class="container mt-3">
    <div class="row">
        <div class="col-md-12">

            @if (session('status'))
            <div class="alert alert-success"> {{ session('status') }}</div>
            @endif

            <div class="d-flex justify-content-between align-items-center mb-3">
                <h4 class="mb-0 px-3">Roles</h4>
                <a href="{{ url('roles/create') }}" class="btn btn-primary">Añadir Roles</a>
            </div>

            <div>
                <table class="table table-bordered table-striped js-dataTable-buttons">
                    <thead>
                        <tr>
                            <th class="text-center" style="width: 80px;">Id</th>
                            <th>Nombre</th>
                            <th class="accion-column" style="width: 35%;">Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($roles as $role)
                        <tr>
                            <td class="text-center">{{$role->id}}</td>
                            <td class="fw-semibold">{{$role->name}}</td>
                            <td class="accion-column">
                                <a href="{{url('roles/'.$role->id.'/give-permissions')}}" class="btn btn-warning">Editar Permisos</a>
                                <a href="{{url('roles/'.$role->id.'/edit')}}" class="btn btn-warning">Editar</a>
                                <form action="{{ url('roles/'.$role->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger delete-button">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<style>
    .accion-column {
        width: 35% !important;
    }
</style>

@endsection
