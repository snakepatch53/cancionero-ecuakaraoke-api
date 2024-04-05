<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ComboController extends Controller
{
    public function storeOrder(Request $request)
    {
        $validator = Validator::make($request->all(),  [
            "client.dni" => "required",
            "client.name" => "required",
            "song.id" => "required|exists:songs,id",
        ], [
            "client.dni.required" => "El campo dni es obligatorio",
            "client.name.required" => "El campo name es obligatorio",
            "song.id.required" => "El campo id es obligatorio",
            "song.id.exists" => "La canción no existe"
        ]);
        if ($validator->fails()) {
            return response()->json([
                "success" => false,
                "message" => $validator->errors()->first(),
                "errors" => $validator->errors(),
                "data" => null
            ]);
        }

        // buscamos por dni
        $client = Client::where('dni', $request->client['dni'])->first();

        // Si el cliente no existe lo creamos
        if (!$client) {
            $client = new Client();
            $client->dni = $request->client['dni'];
            $client->name = $request->client['name'];
            $client->save();
        }

        // creamos el pedido
        $order = new Order();
        $order->client_id = $client->id;
        $order->song_id = $request->song['id'];
        $order->save();
        // devolvemos el pedido
        return response()->json([
            "success" => true,
            "message" => "Pedido creado correctamente",
            "errors" => null,
            "data" => $order
        ]);
    }
}
