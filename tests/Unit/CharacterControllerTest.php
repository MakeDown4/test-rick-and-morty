<?php

namespace Tests\Unit\Controllers\Api;

use App\Http\Controllers\Api\CharacterController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class CharacterControllerTest extends TestCase
{
    public function testIndexCharacterShouldReturnError()
    {
        Http::fake([
            'https://rickandmortyapi.com/api/character*' => Http::response([], 500),
        ]);

        $controller = new CharacterController();
        $response = $controller->index(new Request());
        $this->assertEquals(['error' => 'Erro ao buscar os personagens. Por favor, tente novamente mais tarde.'], $response->original);
    }

    public function testShowCharacterShouldReturnError()
    {
        Http::fake([
            'https://rickandmortyapi.com/api/character/1' => Http::response([], 500),
        ]);

        $controller = new CharacterController();
        $response = $controller->show(1);
        $this->assertEquals(['error' => 'Erro ao buscar o personagem. Por favor, tente novamente mais tarde.'], $response->original);
    }
}