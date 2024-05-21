@extends('layouts.backend')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">

                @if (session('status'))
                    <div class="alert alert-success"> {{ session('status') }}</div>
                @endif

                <div class="card">
                    <div class="card-header">
                        <h4>Usuarios
                            <a href=" {{ url('users/create') }} " class="btn btn-primary float-end">Añadir Usuarios</a>
                        </h4>
                    </div>

                    <div class="card-body">

                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Nombre</th>
                                    <th>Correo electrónico</th>
                                    <th>Roles</th>
                                    <th>Acción</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td> {{ $user->id }} </td>
                                        <td> {{ $user->name }} </td>
                                        <td> {{ $user->email }} </td>
                                        <td>
                                            @if (!empty($user->getRoleNames()))
                                                @foreach ($user->getRoleNames() as $roleName)
                                                    <label class="badge bg-primary mx-1"> {{ $roleName }} </label>
                                                @endforeach
                                            @endif
                                        </td>
                                        <td>
                                            <a href=" {{ url('users/' . $user->id . '/edit') }} "
                                                class="btn btn-warning">Editar</a>
                                            <a href=" {{ url('users/' . $user->id . '/delete') }} "
                                                class="btn btn-danger">Eliminar</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
