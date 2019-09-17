<?php

namespace Src\Controller;

use Src\Models\Comments;

class Controller
{
    public function __construct()
    {
        $this->comments = new Comments();
    }
}