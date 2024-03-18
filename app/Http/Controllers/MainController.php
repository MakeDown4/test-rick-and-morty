<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class MainController extends Controller
{
    public function index()
    {
        try {
            return Inertia::render('Main');
        } catch (\Exception $e) {
            return response()->json(['error' => 'Erro ao carregar a página. Por favor, tente novamente mais tarde.'], 500);
        }
    }
}