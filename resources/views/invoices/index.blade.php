@extends('layouts.app1')

@section('content')


    <div class="col-md-11">


        <a class="btn btn-success" href="{{ route('home') }}"> Volver<br></a>
        <p><br></p>


        <div class="panel-title">
            <h1>Lista de facturas</h1>
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
                    <th>Referencia</th>
                    <th>Titulo</th>
                    <th>Vendedor</th>
                    <th>Cliente</th>
                    <th>Expedicion</th>
                    <th>Vencimiento</th>
                    <th>Acción</th>
                    </thead>
                    <tbody>
                    @foreach ($invoices as $invoice)
                        <tr>
                            <td class="table-text">
                                <div>{{ $invoice->ref }}</div>
                            </td>
                            <td class="table-text">
                                <div>{{ $invoice->title }}</div>
                            </td>

                            <td class="table-text">
                                <div>{{ $invoice->companies->name }}</div>
                            </td>

                            <td class="table-text">
                                <div>{{$invoice->clients->first_name . ' ' .$invoice->clients->last_name }}</div>
                            </td>


                            <td class="table-text">
                                <div>{{ $invoice->expedition_date }}</div>
                            </td>

                            <td class="table-text">
                                <div>{{ $invoice->duedate }}</div>
                            </td>

                            <td>
                                <button type="submit" class="btn btn-success"
                                        onclick="location.href='invoices/{{ $invoice->id_invoices }}/edit'">
                                    <i class="fa fa-pencil"></i>Editar
                                </button>

                                <form action="{{ url('invoices') }}/{{ $invoice->id_invoices }}" method="POST">
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
            </div>
        </div>
    </div>
@endsection
