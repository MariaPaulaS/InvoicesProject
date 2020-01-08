@extends('layouts.app1')

@section('content')

    <div class="col-md-12">
        <!-- Tabla -->
        @if (count($clients) > 0)
            <div class="panel panel-default">
                <div class="panel-heading">
                    Listado de clientes
                </div>

                <div class="panel-body">
                    <table class="table table-striped task-table">
                        <thead>
                        <th>Cliente</th>
                        <th>R.U.C.</th>
                        <th>Dirección</th>
                        <th>Teléfono</th>
                        <th>E-mail</th>
                        <th>Acción</th>
                        </thead>
                        <tbody>
                        @foreach ($clients as $client)
                            <tr>
                                <td class="table-text"><div>{{ $client->first_name }}</div></td>
                                <td class="table-text"><div>{{ $client->last_name }}</div></td>
                                <td class="table-text"><div>{{ $client->id_card }}</div></td>
                                <td class="table-text"><div>{{ $client->number_phone }}</div></td>
                                <td>
                                    <button type="submit" class="btn btn-success" onclick="location.href='clientes/{{ $cliente->id }}'">
                                        <i class="fa fa-pencil"></i>Editar
                                    </button>

                                    <form action="{{ url('cliente') }}/{{ $client->id_clients }}" method="POST">
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
        @endif
    </div>
@endsection
