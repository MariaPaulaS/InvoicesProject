@extends('layouts.app')

@section('content')


    <div class="col-md-11">



        <a class="btn btn-success" href="{{ route('companies.create') }}"> Agregar vendedor<br></a>


        <a class="btn btn-primary" href="{{ route('home') }}"> Volver<br></a>

        <div class="justify-content-end">
            <form action="{{ route('companies.index') }}" method="GET" class="form-inline justify-content-end">
                <div class="form-group">
                    <div class="input-group mb-2">
                        <div>
                            <select name="type" class="form-control mr-sm-2" id="type">
                                <option disabled selected>Buscar por:</option>
                                <option value="name">Nombre</option>
                                <option value="nit">Nit</option>
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
            <h1>Lista de compañías</h1>
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
                        <th>Nombre o razón social</th>
                        <th>Nit</th>
                        <th>Acción</th>
                        </thead>
                        <tbody>
                        @foreach ($companies as $company)
                            <tr>
                                <td class="table-text"><div>{{ $company->name }}</div></td>
                                <td class="table-text"><div>{{ $company->nit }}</div></td>
                                <td>
                                    <button type="submit" class="btn btn-success" onclick="location.href='companies/{{ $company->id_companies }}/edit'">
                                        <i class="fa fa-pencil"></i> Editar
                                    </button>

                                    <form action="{{ url('companies') }}/{{ $company->id_companies }}"  method="POST">
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
                    {{$companies->render()}}
                </div>
            </div>

    </div>
@endsection
