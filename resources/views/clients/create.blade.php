@extends('layouts.app1')

@section('content')
    <div class="container">
        <div class="col-sm-offset-3 col-sm-6">
            <div class="panel-title">
                <h1>Agregar cliente</h1>

            </div>
            <!-- Bootstrap Boilerplate... -->

            <div class="panel-body">
                <!-- Display Validation Errors -->
            @include('common.errors')

            <!-- New Task Form -->
                <form action={{ url('clients') }} method="POST" class="form-horizontal">
                {{ csrf_field() }}

                <!-- Attributes Names -->
                    <div class="form-group">
                        <label for="first_name">Nombre</label>
                        <input type="text" name="first_name" id="first_name" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="last_name">Apellido</label>
                        <input type="text" name="last_name" id="last_name" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="id_card">Identificación</label>
                        <input type="text" name="id_card" id="id_card" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="number_phone">Telefono</label>
                        <input type="text" name="number_phone" id="number_phone" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="email">E-mail</label>
                        <input type="email" name="email" id="email" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="address">Dirección</label>
                        <input type="text" name="address" id="address" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="city">Ciudad</label>
                        <input type="text" name="city" id="city" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="country">País</label>
                        <input type="text" name="country" id="country" class="form-control">
                    </div>

                    <!-- Add Task Button -->
                    <div class="form-group">

                        <button type="submit" class="btn btn-black">
                            <i class="fa fa-plus"></i> Registrar cliente

                        </button>

                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- TODO: Current Tasks -->
@endsection
