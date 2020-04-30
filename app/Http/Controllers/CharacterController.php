<?php

namespace App\Http\Controllers;

use App\FilePotterService;
use App\IPotterService;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\File;

class CharacterController extends Controller
{
    function index()
    {
        $potterService = null;

        if (File::exists(storage_path('app') . '/characters')) {
            $potterService = new FilePotterService();
        } else {
            $potterService = App::make('ApiPotterService');
        }

        $characters = $potterService->getCharacters();

        $jsonResponse = array();
        foreach ($characters as $character) {
            $jsonResponse[] = $character->toArray();
        }

        return response()->json($jsonResponse);
    }

    function show($characterId)
    {
        $potterService = null;

        if (File::exists(storage_path('app') . "/character_$characterId")) {
            $potterService = new FilePotterService();
        } else {
            $potterService = App::make('ApiPotterService');
        }

        $character = $potterService->getCharacterById($characterId);

        return response()->json($character->toArray());
    }
}