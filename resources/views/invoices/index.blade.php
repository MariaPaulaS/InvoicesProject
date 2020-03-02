@extends('layouts.app')

@section('content')


    <div class="col-md-11">


        <a class="btn btn-success" href="{{ route('invoices.create') }}"> Agregar<br></a>

        <a class="btn btn-success" href="{{ route('invoices.import.view') }}"> Importar<br></a>

        <a class="btn btn-primary" href="{{ route('home') }}"> Volver<br></a>




        <div class="justify-content-end">
            <form action="{{ route('invoices.index') }}" method="GET" class="form-inline justify-content-end">
                <div class="form-group">
                    <div class="input-group mb-2">
                        <div>
                            <select name="type" class="form-control mr-sm-2" id="type">
                                <option disabled selected>Buscar por:</option>
                                <option value="title">Nombre</option>
                                <option value="ref">Referencia</option>
                                <option value="client">Cliente</option>
                                <option value="company">Vendedor</option>
                                <option value="state">Estado</option>
                                <option value="expedition_date">Fecha de creación</option>
                                <option value="receipt_date">Fecha de recibida / pagada</option>
                                <option value="duedate">Fecha de vencimiento</option>

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
            <h1>Lista de facturas</h1>

            <h5>Haga clic sobre el nombre de la factura si desea ver la vista completa.</h5>
            <br>
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
                    <th>Creacion</th>
                    <th>Vencimiento</th>
                    <th>Estado</th>
                    <th>Acción</th>
                    </thead>
                    <tbody>
                    @foreach ($invoices as $invoice)
                        <tr>
                            <td class="table-text">
                                <div>{{ $invoice->ref }}</div>
                            </td>
                            <td class="table-text">
                                <div>  <a href="{{url('invoices/show/' . $invoice->id_invoices)}}">
                                        {{$invoice->title}}
                                    </a></div>


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

                            <td class="table-text">
                                <div>{{ $invoice->state }}</div>
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

                {{$invoices->render()}}
            </div>
        </div>
    </div>
@endsection
