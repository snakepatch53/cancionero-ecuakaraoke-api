<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{

    public function index()
    {
        $clients = Client::paginate(20);
        return response()->json($clients);
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Client $client)
    {
        //
    }

    public function showByDni(Request $request)
    {
        // recibimos por post el campo dni
        $dni = $request->dni;
        // buscamos por dni
        $client = Client::where('dni', $dni)->first();
        // devolvemos el cliente
        return response()->json($client);
    }

    public function update(Request $request, Client $client)
    {
        //
    }

    public function destroy(Client $client)
    {
        //
    }
}
