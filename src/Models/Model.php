<?php

namespace Src\Models;

abstract class Model
{
    protected $db;
    public function __construct()
    {
        $this->db = new Database();
    }
}