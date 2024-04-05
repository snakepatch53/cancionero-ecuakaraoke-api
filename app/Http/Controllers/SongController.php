<?php

namespace App\Http\Controllers;

use App\Models\Song;
use Illuminate\Http\Request;

class SongController extends Controller
{
    public function index()
    {
        // devolver con paginación
        return response()->json(Song::paginate(20));
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Song $song)
    {
        return response()->json($song);
    }

    public function update(Request $request, Song $song)
    {
        //
    }

    public function destroy(Song $song)
    {
        //
    }

    public function search($search)
    {
        // buscamos por title, artist o gender
        $songs = Song::where('title', 'like', "%$search%")
            ->orWhere('artist', 'like', "%$search%")
            ->orWhere('gender', 'like', "%$search%");
        // devolvemos con paginación
        return response()->json($songs->paginate(20));
    }
}
