<?php
namespace Src\Controller;
use Src\Controller\Controller;

class CommentsController extends Controller
{
    public function store()
    {
        $comment = file_get_contents('php://input');
        $comment = json_decode($comment, true);
        $comment = array_map('trim', $comment);
        $comment = array_map('htmlspecialchars', $comment);

        $this->comments->insertComment($comment['comment'], $comment['movie_id']);
    }
}