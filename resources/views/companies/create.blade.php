@extends('layouts.app1')

@section('content')
    <div class="container">
        <div class="col-sm-offset-3 col-sm-6">
            <div class="panel-title">
                <h1>Agregar compañía</h1>

            </div>
            <!-- Bootstrap Boilerplate... -->

            <div class="panel-body">
                <!-- Display Validation Errors -->
            @include('common.errors')

            <!-- New Task Form -->
                <form action={{ url('companies') }} method="POST" class="form-horizontal">
                {{ csrf_field() }}

                <!-- Attributes Names -->
                    <div class="form-group">
                        <label for="name">Nombre o razón social</label>
                        <input type="text" name="name" id="name" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="nit">Nit</label>
                        <input type="text" name="nit" id="nit" class="form-control">
                    </div>

                    <!-- Add Task Button -->
                    <div class="form-group">

                        <button type="submit" class="btn btn-black">
                            <i class="fa fa-plus"></i> Registrar compañía

                        </button>

                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- TODO: Current Tasks -->
@endsection
