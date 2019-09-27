<?php
namespace Src\services;

use GuzzleHttp\Client;
use function GuzzleHttp\json_decode;
use Src\Repository\CharactersInterface;

class CharactersServices implements CharactersInterface
{
    public function getAllCharacters()
    {        
        $client = new Client();

        $res = $client->request('GET', 'https://swapi.co/api/people');
        $filterData = $res->getBody();
        $filterData = json_decode($filterData, true);

        $filterData = $filterData['results'];
        $filterOutKeys =array('mass', 'hair_color', 'skin_color', 'homeworld', 'films', 
        'starships', 'vehicles', 'species', 'created', 'edited', 'url');
        $filterdArr = array_map(function ($f) use ($filterOutKeys) {
            return array_diff_key($f, array_flip($filterOutKeys));
        }, $filterData);

        usort($filterdArr, function($a, $b){
            if($a['height'] > $b['height']) {
                return 0;
            }
            return ($a['height'] > $b['height']) ? -1 : 1;
        }
       );
        return $filterdArr;
    }
}