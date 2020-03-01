@extends('layouts.app')

@section('content')
<div class="container">
<div class="row justify-content-center">
    <div class="col-xl-10 col-lg-12 col-md-9">
        <div class="card o-hidden border-0 shadow my-3 border-left-primary py-2">
            <div class="card-body p-0">
                <div class="col">
                    <div class="col-lg">
                        <div class="p-5">
                            <div class="text-center">
                                <p class="h3"><i class="far fa-file-alt"></i><br>IMPORTAR UNA FACTURA EXCEL</p>
                                <p><br></p>
                                 <h5>Por favor seleccione un excel de su ordenador</h5>

                            <div class="col text-center my-5">
                                <form action="{{ route('invoices.import') }}" method="post" enctype="multipart/form-data">
                                    @csrf

                                    @if(Session::has('message'))
                                        <p>{{ Session::get('message') }}</p>
                                    @endif

                                    <input type="file" name="file" id="file">

                                    <br/> <br/>
                                    <button type="submit" class="btn btn-success">Importar Facturas</button>
                                    <a class="btn btn-primary" href="{{ route('invoices.index') }}"> Volver<br></a>
                                </form>
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
