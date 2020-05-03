<?php

namespace App\Http\Controllers;

use App\FilePotterService;
use App\PotterServiceInterface;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\File;

class CharactersController extends Controller
{
    private PotterServiceInterface $potterService;

    function __construct(PotterServiceInterface $potterService)
    {
        $this->potterService = $potterService;
    }

    function index()
    {
        if (File::exists(storage_path('app') . '/characters')) {
            $this->potterService = new FilePotterService();
        }

        $characters = $this->potterService->getCharacters();

        $jsonResponse = array();
        foreach ($characters as $character) {
            $jsonResponse[] = $character->toArray();
        }

        return response()->json($jsonResponse);
    }

    function show($characterId)
    {
        if (File::exists(storage_path('app') . "/character_$characterId")) {
            $this->potterService = new FilePotterService();
        }

        $character = $this->potterService->getCharacterById($characterId);

        return response()->json($character->toArray());
    }
}
