<?php

$router->define([
    'movies' => 'MoviesController@index',
    'comments' => 'CommentsController@store'
]);