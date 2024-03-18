<?php

namespace Tests\Unit\Controllers\Api;

use App\Http\Controllers\API\EpisodeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class EpisodeControllerTest extends TestCase
{
    public function testIndexEpisodeShouldReturnError()
    {
        Http::fake([
            'https://rickandmortyapi.com/api/episode*' => Http::response([], 500),
        ]);

        $controller = new EpisodeController();
        $response = $controller->index(new Request());
        $this->assertEquals(['error' => 'Erro ao buscar os episódios. Por favor, tente novamente mais tarde.'], $response->original);
    }

    public function testShowEpisodeShouldReturnError()
    {
        Http::fake([
            'https://rickandmortyapi.com/api/episode/1' => Http::response([], 500),
        ]);

        $controller = new EpisodeController();
        $response = $controller->show(1);
        $this->assertEquals(['error' => 'Erro ao buscar o episódio. Por favor, tente novamente mais tarde.'], $response->original);
    }
}