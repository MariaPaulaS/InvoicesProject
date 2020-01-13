@extends('layouts.app1')

@section('content')
    <div class="container">
        <div class="col-sm-offset-3 col-sm-6">
            <div class="panel-title">
                <h1>Agregar producto</h1>

            </div>
            <!-- Bootstrap Boilerplate... -->

            <div class="panel-body">
                <!-- Display Validation Errors -->
            @include('common.errors')

            <!-- New Task Form -->
                <form action={{ url('products') }} method="POST" class="form-horizontal">
                {{ csrf_field() }}

                <!-- Attributes Names -->
                    <div class="form-group">
                        <label for="name_product">Nombre</label>
                        <input type="text" name="name_product" id="name_product" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="ref">Referencia</label>
                        <input type="text" name="ref" id="ref" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="price">Precio</label>
                        <input type="text" name="price" id="price" class="form-control">
                    </div>
                    <!-- Add Task Button -->
                    <div class="form-group">

                        <button type="submit" class="btn btn-black">
                            <i class="fa fa-plus"></i> Registrar producto

                        </button>

                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- TODO: Current Tasks -->
@endsection
