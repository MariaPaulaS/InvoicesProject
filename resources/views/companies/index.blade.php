@extends('layouts.app1')

@section('content')


    <div class="col-md-11">



        <a class="btn btn-success" href="{{ route('home') }}"> Volver<br></a>
        <p><br></p>


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
                </div>
            </div>

    </div>
@endsection
