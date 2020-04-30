<?php

namespace App;

interface IPotterService
{
    public function getCharacters(): array;

    public function getCharacterById($characherId): Character;
}