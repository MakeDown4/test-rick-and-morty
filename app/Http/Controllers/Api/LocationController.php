<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class LocationController extends Controller
{
    public function index(Request $request)
    {
        try {
            $query = http_build_query($request->all());

            $response = Http::get('https://rickandmortyapi.com/api/location?' . $query);
            $response->throw();

            return $response->json();
        } catch (\Exception $e) {
            return response()->json(['error' => 'Erro ao buscar as localizações. Por favor, tente novamente mais tarde.'], 500);
        }
    }

    public function show($id)
    {
        try {
            $response = Http::get("https://rickandmortyapi.com/api/location/{$id}");
            $response->throw();

            return $response->json();
        } catch (\Exception $e) {
            return response()->json(['error' => 'Erro ao buscar a localização. Por favor, tente novamente mais tarde.'], 500);
        }
    }
}