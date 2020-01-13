@extends('layouts.app')
@section('content')




    <div class="container">

        <div class="panel-title">
            <div class="text-xl-center">
                <br>
                <h1>Sistema de facturación</h1>
                <p>¡Bienvenido al sistema de facturación! Por favor selecciona una opción para continuar.</p>
            </div>
        </div>

        <br>
        <br>
        <br>
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-8 col-md-6">
                <div class="card o-hidden border-0 shadow my-3 border-left-primary py-2">
                    <div class="card-body p-0">
                        <div class="col">
                            <div class="col-lg">
                                <div class="p-5">
                                    <div class="text-center">
                                        <p class="h3"><i class="far fa-file-alt"></i><br>Productos</p>
                                        <p><br></p>
                                        <a class="btn btn-success" href="{{route('products.create')}}"> Agregar producto
                                            <br></a>
                                        <p><br></p>
                                        <a class="btn btn-dark" href="{{route('products.index')}}"> Administrar existentes </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row">

                <div class="col-lg-4">
                    <div class="card o-hidden border-0 shadow my-3 border-left-primary py-2">
                        <div class="card-body p-0">
                            <div class="col">
                                <div class="col-lg">
                                    <div class="p-5">
                                        <div class="text-center">
                                            <p class="h3"><i class="far fa-file-alt"></i><br>Vendedores</p>

                                            <p><br></p>
                                            <a class="btn btn-success" href="{{ route('companies.create') }}"> Agregar
                                                vendedor <br></a>
                                            <p><br></p>
                                            <a class="btn btn-dark" href="{{ route('companies.index') }}"> Administrar
                                                existentes </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-lg-4">
                    <div class="card o-hidden border-0 shadow my-3 border-left-primary py-2">
                        <div class="card-body p-0">
                            <div class="col">
                                <div class="col-lg">
                                    <div class="p-5">
                                        <div class="text-center">
                                            <p class="h3"><i class="far fa-file-alt"></i><br>Clientes</p>
                                            <p><br></p>
                                            <a class="btn btn-success" href="{{ route('clients.create') }}"> Agregar
                                                cliente</a>
                                            <p><br></p>
                                            <a class="btn btn-dark" href="{{ route('clients.index') }}"> Administrar
                                                existentes </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col col-lg-4">
                    <div class="card o-hidden border-0 shadow my-3 border-left-primary py-2">
                        <div class="card-body p-0">
                            <div class="col">
                                <div class="col-lg">
                                    <div class="p-5">
                                        <div class="text-center">
                                            <p class="h3"><i class="far fa-file-alt"></i><br>Facturas</p>
                                            <p><br></p>
                                            <a class="btn btn-success" href="{{route('invoices.create')}}"> Agregar
                                                factura <br></a>
                                            <p><br></p>
                                            <a class="btn btn-dark"> Administrar existentes </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
        </div>
@endsection
