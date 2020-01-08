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
    <form action="/index" method="POST" class="form-horizontal">
        {{ csrf_field() }}

        <!-- Attributes Names -->
        <div class="form-group">
            <label for="client-first-name">Nombre</label>
                <input type="text" name="name" id="client-first-name" class="form-control">
        </div>

            <div class="form-group">
                <label for="client-last-name">Apellido</label>
                <input type="text" name="name" id="client-last-name" class="form-control">
            </div>

            <div class="form-group">
                <label for="client-id-card">Identificación</label>
                <input type="text" name="name" id="client-id-card" class="form-control">
            </div>

            <div class="form-group">
                <label for="client-phone">Telefono</label>
                <input type="text" name="name" id="client-phone" class="form-control">
            </div>

            <!-- Add Task Button -->
        <div class="form-group">

                <button type="submit" class="btn btn-black">
                    <i class="fa fa-plus"></i> Registrar cliente

                </button>

        </div>
    </form>
</div>

<!-- TODO: Current Tasks -->
@endsection
