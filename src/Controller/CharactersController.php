<?php
namespace Src\Controller;

use Src\Repository\CharactersInterface;

class CharactersController
{
    public $swapiApi;

    public function __construct(CharactersInterface $swapiApi)
    {
        $this->swapiApi = $swapiApi;
    }
    // SELECT COUNT(*) as count FROM 'swapi'.'comments':
    public function start()
    {
        $data = $this->swapiApi->getAllCharacters();
        $someArray = json_decode($data, true);
        echo json_encode($someArray);
    }
}