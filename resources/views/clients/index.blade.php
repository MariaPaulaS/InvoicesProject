@extends('layouts.app')

@section('content')


    <div class="col-md-11">


        <a class="btn btn-success" href="{{ route('clients.create') }}"> Agregar cliente<br></a>

        <a class="btn btn-primary" href="{{ route('home') }}"> Volver<br></a>

        <div class="justify-content-end">
            <form action="{{ route('clients.index') }}" method="GET" class="form-inline justify-content-end">
                <div class="form-group">
                    <div class="input-group mb-2">
                        <div>
                            <select name="type" class="form-control mr-sm-2" id="type">
                                <option disabled selected>Buscar por:</option>
                                <option value="first_name">Nombre</option>
                                <option value="last_name">Apellido</option>
                                <option value="id_card">Identificación</option>
                                <option value="number_phone">Teléfono</option>
                                <option value="email">E-mail</option>
                                <option value="address">Dirección</option>
                                <option value="city">Ciudad</option>
                                <option value="country">País</option>
                            </select>
                        </div>
                        <input type="text" class="form-control input-group-prepend" name="search" placeholder="Ingresa tu búsqueda" required>
                        <div>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-search"></i> Buscar</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>



        <div class="panel-title">
            <h1>Lista de clientes</h1>
            <br>

        </div>
        <!-- Tabla -->

            <div class="panel panel-default">
             <!--   <div class="panel-heading">
                    Listado de clientes
                </div> -->

                <div class="panel-body">
                    <table class="table table-striped task-table">
                        <thead>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Identificacion</th>
                        <th>Teléfono</th>
                        <th>E-mail</th>
                        <th>Dirección</th>
                        <th>Ciudad</th>
                        <th>Acción</th>
                        </thead>
                        <tbody>
                        @foreach ($clients as $client)
                            <tr>
                                <td class="table-text"><div>{{ $client->first_name }}</div></td>
                                <td class="table-text"><div>{{ $client->last_name }}</div></td>
                                <td class="table-text"><div>{{ $client->id_card }}</div></td>
                                <td class="table-text"><div>{{ $client->number_phone }}</div></td>
                                <td class="table-text"><div>{{ $client->email }}</div></td>
                                <td class="table-text"><div>{{ $client->address }}</div></td>
                                <td class="table-text"><div>{{ $client->city }} - {{ $client->country}} </div></td>
                                <td>
                                    <button type="submit" class="btn btn-success" onclick="location.href='clients/{{ $client->id_clients }}/edit'">
                                        <i class="fa fa-pencil"></i>Editar
                                    </button>

                                    <form action="{{ url('clients') }}/{{ $client->id_clients }}"  method="POST">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}

                                        <button type="submit" class="btn btn-danger">
                                            <i class="fa fa-trash"></i> Eliminar
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{$clients->render()}}
                </div>
            </div>
    </div>
@endsection
