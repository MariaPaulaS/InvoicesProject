<?php

namespace App\Http\Controllers;

use App\Client;
use App\Company;
use App\Invoice;
use Illuminate\Http\Request;

class InvoicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $invoices = Invoice::all();
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
        $invoice->save();

        return redirect()->route('home');
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
        //
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
        //
    }
}
