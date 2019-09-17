<?php

namespace Src\Models;

use Src\Models\Model;

class Comments extends Model
{
    public function getComments()
    {
        $query = 'SELECT * FROM comments';
        $this->db->query($query);
        $comments = $this->db->result();
        var_dump($comments);
        return $comments;
    }

    public function insertComment($comment, $movie_id)
    {
        $query = 'INSERT INTO comments (comment, movie_id, created_at) VALUES (:comment,
        :movie_id, :created_at)';

        $this->db->query($query);
        $this->db->bind(':comment', $comment);
        $this->db->bind(':movie_id', $movie_id);
        $this->db->bind(':created_at', date("Y-m-d H-i-s"));
        $this->db->execute();
        $result = $this->getComments();

        echo $result;


    }
}