<?php

namespace Src\services;

use Src\Repository\MoviesInterface;
use GuzzleHttp\Client;

class MoviesServices implements MoviesInterface
{
    public function getAllMovies()
    {        
        $client = new Client(['verify' => 'C:/usr/local/ssl/cert.pem']);

        $res = $client->request('GET', 'https://swapi.co/api/films');
        return $res->getBody();
    }
}