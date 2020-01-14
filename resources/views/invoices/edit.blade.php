@extends('layouts.app1')

@section('content')
    <div class="container">
        <div class="col-sm-offset-3 col-sm-6">
            <div class="panel-title">
                <h1>Editar factura</h1>

            </div>
            <!-- Bootstrap Boilerplate... -->

            <div class="panel-body">
                <!-- Display Validation Errors -->
            @include('common.errors')

            <!-- New Task Form -->
                <form action={{ url('invoices') }}/{{ $invoice->id_invoices }} method="POST" class="form-horizontal">
                {{ csrf_field() }}
                {{ method_field('PUT') }}

                <!-- Attributes Names -->
                    <div class="form-group">
                        <label for="title">Título</label>
                        <input type="text" name="title" id="title" class="form-control" value="{{ $invoice->title}}">
                    </div>

                    <div class="form-group">
                        <label for="ref">Referencia</label>
                        <input type="text" name="ref" id="ref" class="form-control" value="{{ $invoice->ref}}">
                    </div>

                    <div class="form-group">
                        <label for="id_companies">Vendedor</label>
                        <select name="id_companies" id="id_companies"
                                class="form-control @error('company') is-invalid @enderror">

                            <option value='{{ $invoice->companies->id_companies }}'
                                    selected>{{$invoice->companies->nit . ': ' . $invoice->companies->name }}</option>
                            @foreach($companies as $company)

                                @if($company->id_companies != $invoice->companies->id_companies )
                                    <option
                                        value=' {{ $company->id_companies }}'> {{ $company->nit . ': ' . $company->name }} </option>
                                @endif
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="id_clients">Cliente</label>
                        <select name="id_clients" id="id_clients"
                                class="form-control @error('client') is-invalid @enderror">
                            <option value='{{ $invoice->clients->id_clients }}'
                                    selected>{{ $invoice->clients->id_card . ': ' . $invoice->clients->first_name . ' ' . $invoice->clients->last_name }}</option>
                            @foreach($clients as $client)

                                @if($client->id_clients != $invoice->clients->id_clients )

                                    <option
                                        value='{{ $client->id_clients }}'> {{ $client->id_card . ': ' . $client->first_name . ' ' . $client->last_name  }} </option>

                                @endif
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="state">Estado</label>
                        <select name="state" id="state">
                            <option value='{{ $invoice->state }}'
                                    selected>{{ $invoice->state}}</option>
                            @foreach($states as $state)

                                @if($state != $invoice->state )

                                    <option
                                        value='{{ $state }}'> {{ $state }} </option>

                                @endif
                            @endforeach
                        </select>
                    </div>

                    <!-- Add Task Button -->
                    <div class="form-group">

                        <button type="submit" class="btn btn-black">
                            <i class="fa fa-plus"></i> Actualizar factura

                        </button>

                    </div>


                </form>



            </div>
        </div>


        <div class="row ">
            <div class="col-xl-12 col-lg-12 col-md-6">
                <div class="card o-hidden border-1 my-3">
                    <div class="card-header text-right">
                        <a class="btn btn-primary" href="/invoices/{{ $invoice->id_invoices }}/invoice_product/create"> Añadir productos</a>
                    </div>
                    <div class="card-body p-0">
                        <div class="col col-md-12 table-responsive-sm">

                            <table class="table">
                                <thead>
                                <tr>

                                    <th scope="col">Código</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Cantidad</th>
                                    <th scope="col">Precio Unitario</th>
                                    <th scope="col">Total</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($invoice->products as $product)
                                    <tr>
                                        <td>{{ $product->ref }}</td>
                                        <td>{{ $product->name_product }}</td>
                                        <td>{{ $product->pivot->quantity }}</td>
                                        <td>{{ '$'.$product->pivot->unit_value }}</td>
                                        <td>{{ '$'.$product->pivot->total_value }}</td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                        <div class="card-footer">
                            <div class="row text-right">
                                <div class="col-sm-2 col-sm-offset-9">
                                    <p><b> Subtotal: {{ '$'.$invoice->subtotal }}</b></p>
                                    <p><b> IVA (16%): {{'$'.$invoice->iva }} </b></p>
                                    <p><b>Total: {{'$'.$invoice->total }}</b></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>






    <!-- TODO: Current Tasks -->
@endsection
