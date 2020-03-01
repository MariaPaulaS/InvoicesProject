<?php

namespace App\Http\Controllers;

use App\Client;
use App\Company;
use App\Imports\InvoiceImport;
use App\Invoice;
use App\InvoiceProduct;
use App\Product;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class InvoicesController extends Controller
{
    /**
     * Display a listing of the resource.
     * Prueba de repositorio
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $invoices = Invoice::orderBy('id_invoices', 'DESC')->paginate(5);
        return view('invoices.index', compact('invoices'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clients = Client::all();
        $companies = Company::all();
        $states = array("Sin pagar", "Pagado", "Vencido");

        return view('invoices.create', compact('clients', 'companies', 'states'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validate = $request->validate([
            'title' => 'required',
            'ref' => 'required|unique:invoices',
            'id_clients' => 'required',
            'id_companies' => 'required',
            'state' => 'required'
        ]);

        $invoice = new Invoice();
        $invoice->title = $validate['title'];
        $invoice->ref = $validate['ref'];
        $invoice->id_clients = $validate['id_clients'];
        $invoice->id_companies = $validate['id_companies'];
        $invoice->state = $validate['state'];
        $invoice->duedate = date("Y-m-d H:i:s", strtotime($invoice->created_at . "+ 30 days"));
        $invoice->expedition_date = date("Y-m-d H:i:s", strtotime($invoice->created_at . "+ 0 days"));

        if($invoice->state == 'Pagado'){

            $invoice->receipt_date = date("Y-m-d H:i:s", strtotime($invoice->created_at . "+ 0 days"));
        }

        $invoice->save();

        return redirect()->route('invoices.index');
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $invoice = Invoice::findOrFail($id);
        return view('invoices.show', compact('invoice'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $invoice = Invoice::findOrFail($id);
        $clients = Client::all();
        $companies = Company::all();
        $states = array("Sin pagar", "Pagado", "Vencido");
        return view('invoices.edit', compact('invoice', 'clients', 'companies', 'states'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            'title' => 'required',
            'ref' => 'required',
            'id_clients' => 'required',
            'id_companies' => 'required',
            'state' => 'required'
        ]);

        $invoice = Invoice::findOrFail($id);
        $invoice->title = $validate['title'];
        $invoice->ref = $validate['ref'];
        $invoice->id_clients = $validate['id_clients'];
        $invoice->id_companies = $validate['id_companies'];
        $invoice->state = $validate['state'];
        $invoice->duedate = date("Y-m-d H:i:s", strtotime($invoice->created_at . "+ 30 days"));
        $invoice->expedition_date = date("Y-m-d H:i:s", strtotime($invoice->created_at . "+ 0 days"));
        if($invoice->state == 'Pagado'){

            $invoice->receipt_date = date("Y-m-d H:i:s", strtotime($invoice->created_at . "+ 0 days"));
        }
        $invoice->save();

        return redirect('invoices');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $invoice = Invoice::findOrFail($id);
        $invoice->products()->detach();
        $invoice->delete();
        return redirect('invoices');
    }

    public function destroyInvoiceProduct($id){

        $invoice = Invoice::findOrFail($id);
        $invoice->products()->detach();
        $invoice = Invoice::findOrFail($id);
        $clients = Client::all();
        $companies = Company::all();
        $states = array("Sin pagar", "Pagado", "Vencido");
        return view('invoices.edit', compact('invoice', 'clients', 'companies', 'states'));
    }


    public function createInvoiceProduct($id)
    {
        $invoice = Invoice::find($id);
        return view('invoice_product.create', [
            'invoice' => $invoice,
            'products' => Product::all(),
            'clients' => Client::all(),
            'companies' => Company::all()
        ]);
    }
    public function invoiceProductStore(Request $request, $id)
    {
        $invoice = Invoice::find($id);
        $validData = $request->validate([
            'id_products' => 'required',
            'quantity' => 'required',
            'unit_value' => 'required',
            'subtotal' => 'required',
            'total' => 'required',
            'iva' => 'required',
        ]);
        $product = Product::find($validData['id_products']);
        $validData['unit_value'] = $product->price;
        $invoice->products()->attach($validData['id_products'], [
            'quantity' => $validData['quantity'],
            'unit_value' => $validData['unit_value'],
            'total_value' => $validData['quantity'] * $validData['unit_value']
        ]);
        $invoice->subtotal = $validData['subtotal'];
        $invoice->total = $validData['total'];
        $invoice->iva = $validData['iva'];
        $invoice->save();
        return redirect()->route('invoices.edit', $invoice->id_invoices);
    }




    public function importExcel(Request $request){

        $file = $request->file('file');
        Excel::import(new InvoiceImport, $file);

        return back()->with('message', 'Facturas importada con éxito');

    }

    public function importView(){

        return view('invoices.importInvoice');
    }

}
