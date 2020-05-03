<?php

namespace App\Character;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\File;

class PotterService implements PotterServiceInterface{

    private PotterServiceInterface $potterService;

    public function getCharacters(): Characters
    {
        if (File::exists(storage_path('app') . '/characters')) {
            $this->potterService = new FilePotterService();
        }else{
            $this->potterService = App::make(ApiPotterService::class);
        }

        return $this->potterService->getCharacters();
    }

    public function getCharacterById($characterId): Character
    {
        if (File::exists(storage_path('app') . "/character_$characterId")) {
            $this->potterService = new FilePotterService();
        }else{
            $this->potterService = App::make(ApiPotterService::class);
        }

        return $this->potterService->getCharacterById($characterId);
    }
}
