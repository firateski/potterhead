<?php

namespace App\Character;

interface PotterServiceInterface
{
    public function getCharacters(): Characters;

    public function getCharacterById($characterId): Character;
}
