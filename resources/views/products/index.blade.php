@extends('layouts.app1')

@section('content')


    <div class="col-md-11">

        <a class="btn btn-success" href="{{ route('products.create') }}"> Agregar producto<br></a>

        <a class="btn btn-primary" href="{{ route('home') }}"> Volver<br></a>
        <p><br></p>


        <div class="panel-title">
            <h1>Lista de productos</h1>
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
                        <th>Nombre</th>
                        <th>Precio</th>
                        <th>Acción</th>
                        </thead>
                        <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <td class="table-text"><div>{{ $product->ref }}</div></td>
                                <td class="table-text"><div>{{ $product->name_product }}</div></td>
                                <td class="table-text"><div>{{ $product->price }}</div></td>
                                <td>
                                    <button type="submit" class="btn btn-success" onclick="location.href='products/{{ $product->id_products }}/edit'">
                                        <i class="fa fa-pencil"></i>Editar
                                    </button>

                                    <form action="{{ url('products') }}/{{ $product->id_products }}"  method="POST">
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
