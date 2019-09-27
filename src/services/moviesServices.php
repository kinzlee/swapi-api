<?php

namespace Src\services;

use Src\Repository\MoviesInterface;
use Src\Models\Comments;
use GuzzleHttp\Client;
use function GuzzleHttp\json_decode;

class MoviesServices implements MoviesInterface
{
    public function getAllMovies()
    {        
        $client = new Client();

        $res = $client->request('GET', 'https://swapi.co/api/films');
        $filterData = $res->getBody();
        $filterData = json_decode($filterData, true);

        
       $filterData = $filterData['results'];
        $filterOutKeys =array('author', 'director', 'producer', 'characters', 'planets', 
        'starships', 'vehicles', 'species', 'created', 'edited', 'url');
        $filterdArr = array_map(function ($f) use ($filterOutKeys) {
            return array_diff_key($f, array_flip($filterOutKeys));
        }, $filterData);
        
       
       usort($filterdArr, function($a, $b){
           if($a['release_date'] > $b['release_date']) {
               return 0;
           }
           return ($a['release_date'] > $b['release_date']) ? -1 : 1;
       }
      );
      $comment = new Comments();
      $data = $comment->getComments();
      $data = array_count_values(array_column($data, 'episode_id'));
      $updatedMovies = array_map(function($element) use ($data) {
          if (array_key_exists($element['episode_id'], $data))
          {
          $element['comment_count'] = $data[$element['episode_id']]; 
          }
          $element['comment_count'] = 0;  
          return $element;       
      }, $filterdArr); 
        return $updatedMovies;
    }
}