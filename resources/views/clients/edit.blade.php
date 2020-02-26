@extends('layouts.app1')

@section('content')
    <div class="container">
        <div class="col-sm-offset-3 col-sm-6">
            <div class="panel-title">
                <h1>Editar datos del cliente</h1>

            </div>
            <!-- Bootstrap Boilerplate... -->

            <div class="panel-body">
                <!-- Display Validation Errors -->
            @include('common.errors')

            <!-- New Task Form -->
                <form action="{{ url('clients') }}/{{ $client->id_clients }}" method="POST">
                {{ csrf_field() }}
                {{ method_field('PUT') }}

                <!-- Attributes Names -->
                    <div class="form-group">
                        <label for="first_name">Nombre</label>
                        <input type="text" name="first_name" id="first_name" class="form-control"
                               value="{{ $client->first_name }}">
                    </div>

                    <div class="form-group">
                        <label for="last_name">Apellido</label>
                        <input type="text" name="last_name" id="last_name" class="form-control"
                               value="{{ $client->last_name }}">
                    </div>

                    <div class="form-group">
                        <label for="id_card">Identificación</label>
                        <input type="text" name="id_card" id="id_card" class="form-control"
                               value="{{ $client->id_card }}">
                    </div>


                    <div class="form-group">
                        <label for="number_phone">Teléfono</label>
                        <input type="text" name="number_phone" id="number_phone" class="form-control"
                               value="{{ $client->number_phone }}">
                    </div>

                    <div class="form-group">
                        <label for="email">E-mail</label>
                        <input type="email" name="email" id="email" class="form-control" value="{{ $client->email}}">
                    </div>

                    <div class="form-group">
                        <label for="address">Dirección</label>
                        <input type="text" name="address" id="address" class="form-control" value="{{ $client->address }}">
                    </div>

                    <div class="form-group">
                        <label for="city">Ciudad</label>
                        <input type="text" name="city" id="city" class="form-control" value="{{ $client->city }}">
                    </div>

                    <div class="form-group">
                        <label for="country">País</label>
                        <input type="text" name="country" id="country" class="form-control" value="{{ $client->country }}">
                    </div>



                    <!-- Add Task Button -->
                    <div class="form-group">

                        <button type="submit" class="btn btn-black">
                            <i class="fa fa-plus"></i> Modificar datos

                        </button>

                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- TODO: Current Tasks -->
@endsection
