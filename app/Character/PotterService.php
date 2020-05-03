<?php

namespace App\Character;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class PotterService implements PotterServiceInterface{

    private PotterServiceInterface $potterService;

    public function __construct()
    {
        $this->potterService = App::make(ApiPotterService::class);
    }

    public function getCharacters(): Characters
    {
        if ($this->isFileCached(storage_path('app') . '/characters')) {
            $this->potterService = new FilePotterService();
        }

        return $this->potterService->getCharacters();
    }

    public function getCharacterById($characterId): Character
    {
        if ($this->isFileCached(storage_path('app') . "/character_$characterId")) {
            $this->potterService = new FilePotterService();
        }

        return $this->potterService->getCharacterById($characterId);
    }

    private function isFileCached(string $filename){
        $isFileExists = File::exists($filename);

        if(!$isFileExists) return false;

        $lastModifiedTime = File::lastModified($filename);

        // If it wasn't updated in last 24 hours
        if($lastModifiedTime < time() - 60 * 60 * 24){
            return false;
        }

        return true;
    }
}
