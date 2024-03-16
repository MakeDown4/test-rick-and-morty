<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class LocationController extends Controller
{
    public function index(Request $request)
    {
        $query = http_build_query($request->all());
        $response = Http::get('https://rickandmortyapi.com/api/location?' . $query);

        return $response->json();
    }

    public function show($id)
    {
        $response = Http::get("https://rickandmortyapi.com/api/location/{$id}");

        return $response->json();
    }
}