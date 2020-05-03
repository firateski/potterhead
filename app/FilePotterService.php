<?php

namespace App;

use Illuminate\Support\Facades\File;

class FilePotterService implements PotterServiceInterface
{
    public function getCharacters(): array
    {
        $decodedCharactersFile = unserialize(File::get(storage_path('app') . '/characters'));

        return $decodedCharactersFile;
    }

    public function getCharacterById($characterId): Character
    {
        $decodedCharacterFile = unserialize(File::get(storage_path('app') . "/character_$characterId"));

        return $decodedCharacterFile;
    }
}
