@extends ('layouts.app1')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-offset-3 col-sm-6">

                    <div class="card-body p-0">
                        <div class="col-lg">
                            <div class="p-5">

                                <div class="panel-title">
                                    <h1>Añadir productos a la factura</h1>

                                </div>
                                <div class="col">
                                    <br>
                                    @if($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                </div>
                                <form action="/invoices/{{ $invoice->id_invoices }}/invoice_product" method="POST">
                                    @csrf
                                    <div class="form-group col-4">
                                        <input type="hidden" readonly="readonly" class="form-control hidden" id="id_invoices" name="id_invoices" placeholder="0" value="{{ $invoice->id_invoices }}">
                                    </div>
                                    <div class="form-row">

                                        <div class="form-group col-6">
                                            <label for="quantity">Cantidad: </label>
                                            <input type="number" class="form-control" id="quantity" name="quantity" placeholder="0" value="{{ old('quantity') }}">
                                        </div>
                                        <div class="form-group col-6">
                                            <label for="id_products">Producto: </label>
                                            <select name="id_products" id="id_products" class="form-control @error('product') is-invalid @enderror">
                                                @foreach($products as $product)
                                                    <option value='{{ $product->id_products}}'> {{ $product->ref . ': ' . $product->name_product }} </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <input type="hidden" class="form-control" id="unit_value" name="unit_value" value="0">
                                    <input type="hidden" class="form-control" id="subtotal" name="subtotal" value="{{ $invoice->subtotal }}">
                                    <input type="hidden" class="form-control" id="total" name="total" value="{{ $invoice->total }}">
                                    <input type="hidden" class="form-control" id="iva" name="iva" value="{{ $invoice->iva }}">
                                    <button type="submit" class="btn btn-success"> Guardar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

@endsection
