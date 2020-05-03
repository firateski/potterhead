<?php

namespace App;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\File;

class ApiPotterService implements PotterServiceInterface
{
    private Client $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function getCharacters(): array
    {
        $request = $this->client->request('GET', 'characters');

        $decodedResponse = json_decode($request->getBody()->getContents());

        $characters = array();
        foreach ($decodedResponse as $data) {
            $character = new Character();
            $character->setId($data->_id);
            $character->setName($data->name);

            $characters[] = $character;
        }

        File::put(storage_path('app') . '/characters', serialize($characters));

        return $characters;
    }

    public function getCharacterById($characterId): Character
    {
        $request = $this->client->request('GET', "characters/$characterId");

        $decodedResponse = json_decode($request->getBody()->getContents());

        $character = new Character();
        $character->setId($decodedResponse->_id);
        $character->setName($decodedResponse->name);

        File::put(storage_path('app') . "/character_$characterId", serialize($character));

        return $character;
    }
}
