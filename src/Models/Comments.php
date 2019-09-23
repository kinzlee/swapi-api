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
        return $comments;
    }

    public function insertComment($comment, $episode_id)
    {
        $query = 'INSERT INTO comments (comment, episode_id, created_at) VALUES (:comment,
        :episode_id, :created_at)';

        $this->db->query($query);
        $this->db->bind(':comment', $comment);
        $this->db->bind(':episode_id', $episode_id);
        $this->db->bind(':created_at', date("Y-m-d H-i-s"));
        $this->db->execute();

        echo 'comment created';

    }
}