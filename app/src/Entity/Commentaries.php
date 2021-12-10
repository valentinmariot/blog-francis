<?php

namespace App\Entity;


class Commentaries extends Model
{

    /**
     * @param int $post_id
     * @return array
     */
    public function findAllCommentsByPost(int $post_id) : array
    {
        
        $query = $this->pdo->prepare("SELECT * FROM `commentaries` WHERE post_id = :post_id");
        $query->execute(['post_id' => $post_id]);
        return $query->fetchAll();
    }

    /**
     * @param int $id
     */
    public function findComment(int $id)
    {
        $query = $this->pdo->prepare('SELECT * FROM `commentaries` WHERE id = :id');
        $query->execute(['id' => $id]);
        return $query->fetch();
    }

    /**
     * @param int $id
     */
    public function deleteComment(int $id) : void
    {
        $query = $this->pdo->prepare('DELETE FROM `commentaries` WHERE id = :id');
        $query->execute(['id' => $id]);
    }

    /**
     * @param string $content
     * @param int $post_id
     */
    public function insertComment(string $content, int $post_id ) : void
    {    
        $query = $this->pdo->prepare('INSERT INTO `commentaries` SET content = :content, post_id = :post_id, `date` = NOW()');
        $query->execute(compact('content', 'post_id'));
    }

}