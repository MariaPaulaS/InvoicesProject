<?php

namespace App\Http\Controllers;

use App\Company;
use App\Client;
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
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $companies = Company::all();
        $clients = Client::all();
        return view('invoices.create', compact('companies', 'clients'));
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
            'id_companies' => 'required',
            'id_clients' => 'required'
        ]);

        $invoice = new Invoice();
        $invoice->title = $validate['title'];
        $invoice->ref = $validate['ref'];
        $invoice->id_clients = $validate['id_clients'];
        $invoice->id_companies = $validate['id_companies'];
        $invoice->duedate = date("Y-m-d H:i:s", strtotime($invoice->created_at . "+ 30 days"));
        $invoice->expedition_date = date("Y-m-d H:i:s", strtotime($invoice->created_at . "+ 0 days"));
        $invoice->save();

      //  return redirect()->route('invoices.edit', $invoice->id_invoices);
          return redirect('home');

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
        //
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
        //
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
