<?php

namespace App;

interface PotterServiceInterface
{
    public function getCharacters(): Characters;

    public function getCharacterById($characherId): Character;
}
