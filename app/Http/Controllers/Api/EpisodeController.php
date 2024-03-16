<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class EpisodeController extends Controller
{
    public function index(Request $request)
    {
        $query = http_build_query($request->all());
        $response = Http::get('https://rickandmortyapi.com/api/episode?' . $query);

        return $response->json();
    }

    public function show($id)
    {
        $response = Http::get("https://rickandmortyapi.com/api/episode/{$id}");

        return $response->json();
    }
}