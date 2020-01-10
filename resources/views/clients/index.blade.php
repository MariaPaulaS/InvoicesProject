@extends('layouts.app1')

@section('content')


    <div class="col-md-11">


        <a class="btn btn-success" href="{{ route('home') }}"> Volver<br></a>
        <p><br></p>


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
                                <td>
                                    <button type="submit" class="btn btn-success" onclick="location.href='clients/{{ $client->id_clients }}/edit'">
                                        <i class="fa fa-pencil"></i>Editar
                                    </button>

                                    <form action="{{ url('clients') }}/{{ $client->id_clients }}"  method="POST">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}

                                        <button type="submit" class="btn btn-danger">
                                            <i class="fa fa-trash"></i>Eliminar
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
    </div>
@endsection
