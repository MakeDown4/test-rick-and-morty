<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class EpisodeController extends Controller
{
    public function index(Request $request)
    {
        try {
            $query = http_build_query($request->all());

            $response = Http::get('https://rickandmortyapi.com/api/episode?' . $query);
            $response->throw();

            return $response->json();
        } catch (\Exception $e) {
            return response()->json(['error' => 'Erro ao buscar os episódios. Por favor, tente novamente mais tarde.'], 500);
        }
    }

    public function show($id)
    {
        try {
            $response = Http::get("https://rickandmortyapi.com/api/episode/{$id}");
            $response->throw();

            return $response->json();
        } catch (\Exception $e) {
            return response()->json(['error' => 'Erro ao buscar o episódio. Por favor, tente novamente mais tarde.'], 500);
        }
    }
}