<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Client;

class ClientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Client::all();
        return view ('clients.index', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('clients.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'id_card' => 'required|unique:clients',
            'address' => 'required',
            'email' => 'required',
            'city' => 'required',
            'country' => 'required',
            'number_phone' => 'required|min:10'
        ]);

        $client = new Client();
        $client->first_name = $validate['first_name'];
        $client->last_name = $validate['last_name'];
        $client->id_card = intval($validate['id_card']);
        $client->address = $validate['address'];
        $client->email = $validate['email'];
        $client->city = $validate['city'];
        $client->country = $validate['country'];
        $client->number_phone = intval($validate['number_phone']);
        $client->save();
        return redirect()->route('clients.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //

        $client = Client::findOrFail($id);
        return view('clients.edit', compact('client'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

        $validate = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'id_card' => 'required',
            'address' => 'required',
            'email' => 'required',
            'city' => 'required',
            'country' => 'required',
            'number_phone' => 'required|min:10'
        ]);

        $client = Client::findOrFail($id);
        $client->first_name = $request->first_name;
        $client->last_name = $request->last_name;
        $client->id_card = intval($request->id_card);
        $client->address = $request->address;
        $client->email = $request->email;
        $client->city = $request->city;
        $client->country = $request->country;
        $client->number_phone = intval($request->number_phone);
        $client->save();

        return redirect('clients');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Client::findOrFail($id)->delete();
        return redirect('clients');
    }
}
