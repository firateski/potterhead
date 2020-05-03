<?php

namespace App\Http\Controllers;

use App\FilePotterService;
use App\Http\Resources\Character;
use App\PotterServiceInterface;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\File;

class CharactersController extends Controller
{
    private PotterServiceInterface $potterService;

    function __construct(PotterServiceInterface $potterService)
    {
        $this->potterService = $potterService;
    }

    function index(): JsonResource
    {
        if (File::exists(storage_path('app') . '/characters')) {
            $this->potterService = new FilePotterService();
        }

        $characters = $this->potterService->getCharacters();

        return Character::collection(iterator_to_array($characters));
    }

    function show($characterId): JsonResource
    {
        if (File::exists(storage_path('app') . "/character_$characterId")) {
            $this->potterService = new FilePotterService();
        }

        $character = $this->potterService->getCharacterById($characterId);

        return new Character($character);
    }
}
