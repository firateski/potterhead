<?php

namespace App\Http\Controllers;

use App\PotterService\PotterServiceManager;
use Illuminate\Http\Resources\Json\JsonResource;

use App\Http\Resources\Character;

class CharactersController extends Controller
{
    private PotterServiceManager $potterServiceManager;

    function __construct(PotterServiceManager $potterServiceManager)
    {
        $this->potterServiceManager = $potterServiceManager;
    }

    function index(): JsonResource
    {
        $characters = $this->potterServiceManager->getCharacters();

        return Character::collection(iterator_to_array($characters));
    }

    function show($characterId): JsonResource
    {
        $character = $this->potterServiceManager->getCharacterById($characterId);

        return new Character($character);
    }
}
