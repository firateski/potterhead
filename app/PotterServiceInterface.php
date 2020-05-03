<?php

namespace App;

interface PotterServiceInterface
{
    public function getCharacters(): array;

    public function getCharacterById($characherId): Character;
}
