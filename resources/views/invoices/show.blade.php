@extends('layouts.app1')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-16">
                <h2 class="page-header">
                    Factura de venta # {{ str_pad ($invoice->id_invoices, 4, '0', STR_PAD_LEFT) }}
                    - {{$invoice->title}}
                </h2>


                <div class="well well-sm">
                    <div class="row align-content-center">

                        <div class="col-3">
                            <div class="col-xs-4">
                                <label for="customer name" >Cliente:</label>
                                <input class="form-control typeahead" type="text" readonly

                                       value="{{ $invoice->clients->first_name." ".$invoice->clients->last_name}}"/>
                            </div>

                            <div class="col-xs-4">
                                <label for="customer name" >Identificacion:</label>
                                <input class="form-control typeahead" type="text" readonly

                                       value="{{ $invoice->clients->id_card}}"/>
                            </div>

                            <div class="col-xs-4">
                                <label for="customer name" >Estado: </label>
                                <input class="form-control typeahead" type="text" readonly

                                       value="{{ $invoice->state}}"/>
                            </div>

                        </div>

                    </div>

                </div>


                <div class="well well-sm">
                    <div class="row align-content-center">

                        <div class="col-3">
                            <div class="col-xs-3">
                                <label for="customer name" >Vendedor:</label>
                                <input class="form-control typeahead" type="text" readonly

                                       value="{{ $invoice->companies->name}}"/>
                            </div>

                            <div class="col-xs-2">
                                <label for="customer name" >Nit:</label>
                                <input class="form-control typeahead" type="text" readonly

                                       value="{{ $invoice->companies->nit}}"/>
                            </div>

                            <div class="col-xs-2">
                                <label for="customer name" >Expedida: </label>
                                <input class="form-control typeahead" type="text" readonly

                                       value="{{ $invoice->expedition_date}}"/>
                            </div>


                            <div class="col-xs-2">
                                <label for="customer name" >Recibida: </label>
                                <input class="form-control typeahead" type="text" readonly

                                       value="{{ $invoice->receipt_date}}"/>
                            </div>


                            <div class="col-xs-2">
                                <label for="customer name" >Vencimiento: </label>
                                <input class="form-control typeahead" type="text" readonly

                                       value="{{ $invoice->duedate}}"/>
                            </div>

                        </div>

                    </div>

                </div>


                <hr/>

                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">Código</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Cantidad</th>
                        <th scope="col">Precio Unitario</th>
                        <th scope="col">Total</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($invoice->products as $product)
                        <tr>
                            <td>{{ $product->ref }}</td>
                            <td>{{ $product->name_product }}</td>
                            <td>{{ $product->pivot->quantity }}</td>
                            <td>{{ '$'.$product->pivot->unit_value }}</td>
                            <td>{{ '$'.$product->pivot->total_value }}</td>
                        </tr>
                    @endforeach


                    </tbody>
                    <tfoot>

                    <tr>
                        <td colspan="4" class="text-right"><b>IVA</b></td>
                        <td class="text-right">$ {{'$'.$invoice->iva}}</td>
                    </tr>
                    <tr>
                        <td colspan="4" class="text-right"><b>SubTotal</b></td>
                        <td class="text-right">$ {{ '$'.$invoice->subtotal }}</td>
                    </tr>
                    <tr>
                        <td colspan="4" class="text-right"><b>Total</b></td>
                        <td class="text-right">$ {{ '$'.$invoice->total, 2}}</td>
                    </tr>
                    </tfoot>
                </table>

            </div>
        </div>
    </div>
@endsection
