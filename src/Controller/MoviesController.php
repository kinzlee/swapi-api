<?php

namespace Src\Controller;

use Src\Repository\MoviesInterface;

class MoviesController
{
    public $swapiApi;

    public function __construct(MoviesInterface $swapiApi)
    {
        $this->swapiApi = $swapiApi;
    }
    // SELECT COUNT(*) as count FROM 'swapi'.'comments':
    public function index()
    {
        $data = $this->swapiApi->getAllMovies();
        $someArray = json_decode($data, true);
        echo json_encode($someArray);
    }
}