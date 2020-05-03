<?php

namespace App\Http\Controllers;

use Illuminate\Http\Resources\Json\JsonResource;

use App\Character\PotterServiceInterface;
use App\Http\Resources\Character;

class CharactersController extends Controller
{
    private PotterServiceInterface $potterService;

    function __construct(PotterServiceInterface $potterService)
    {
        $this->potterService = $potterService;
    }

    function index(): JsonResource
    {
        $characters = $this->potterService->getCharacters();

        return Character::collection(iterator_to_array($characters));
    }

    function show($characterId): JsonResource
    {
        $character = $this->potterService->getCharacterById($characterId);

        return new Character($character);
    }
}
