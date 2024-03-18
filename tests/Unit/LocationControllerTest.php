<?php

namespace Tests\Unit\Controllers\Api;

use App\Http\Controllers\Api\LocationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class LocationControllerTest extends TestCase
{
    public function testIndexLocationShouldReturnError()
    {
        Http::fake([
            'https://rickandmortyapi.com/api/location*' => Http::response([], 500),
        ]);

        $controller = new LocationController();
        $response = $controller->index(new Request());
        $this->assertEquals(['error' => 'Erro ao buscar as localizações. Por favor, tente novamente mais tarde.'], $response->original);
    }

    public function testShowLocationShoudReturnError()
    {
        Http::fake([
            'https://rickandmortyapi.com/api/location/1' => Http::response([], 500),
        ]);

        $controller = new LocationController();
        $response = $controller->show(1);
        $this->assertEquals(['error' => 'Erro ao buscar a localização. Por favor, tente novamente mais tarde.'], $response->original);
    }
}