<?php

namespace App\Character;

use Illuminate\Support\Facades\File;

class FilePotterService implements PotterServiceInterface
{
    public function getCharacters(): Characters
    {
        $charactersFileContent = File::get(storage_path('app') . '/characters');
        $decodedCharactersFile = unserialize($charactersFileContent);

        return new Characters(...$decodedCharactersFile);
    }

    public function getCharacterById($characterId): Character
    {
        return unserialize(File::get(storage_path('app') . "/character_$characterId"));
    }
}