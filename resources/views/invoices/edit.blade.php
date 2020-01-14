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
                <form action={{ url('invoices') }} method="POST" class="form-horizontal">
                {{ csrf_field() }}

                <!-- Attributes Names -->
                    <div class="form-group">
                        <label for="title">Título</label>
                        <input type="text" name="title" id="title" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="ref">Referencia</label>
                        <input type="text" name="ref" id="ref" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="id_companies">Vendedor</label>
                        <select name="id_companies" id="id_companies"
                                class="form-control @error('company') is-invalid @enderror">
                            @foreach($companies as $company)
                                <option
                                    value=' {{ $company->id_companies }}'> {{ $company->nit . ': ' . $company->name }} </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="id_clients">Cliente</label>
                        <select name="id_clients" id="id_clients"
                                class="form-control @error('client') is-invalid @enderror">
                            @foreach($clients as $client)
                                <option
                                    value='{{ $client->id_clients }}'> {{ $client->id_card . ': ' . $client->first_name . ' ' . $client->last_name  }} </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="state">Estado: </label>
                        <select name="state" id="state">
                            @if (isset($invoice->state))
                                <option value='Pagada' selected>Pagada</option>
                                <option value='Sin pagar'> Sin pagar</option>
                                <option value='Vencida'> Vencida</option>
                            @else
                                <option value='Sin pagar' selected>Sin pagar</option>
                                <option value='Pagada'> Pagada</option>
                                <option value='Vencida'> Vencida</option>
                            @endif
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
    </div>
    <!-- TODO: Current Tasks -->
@endsection
