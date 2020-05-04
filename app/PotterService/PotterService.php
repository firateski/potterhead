<?php

namespace App\PotterService;

use App\Character\Character;
use App\Character\Characters;

interface PotterService
{
    public function getCharacters(): Characters;

    public function getCharacterById($characterId): Character;
}
