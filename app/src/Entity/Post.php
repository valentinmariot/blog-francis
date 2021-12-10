<?php

namespace App\Entity;


class Post extends Model
{

    /**
     * @return array
     */
    public function findAllPosts() : array
    {
        $resultats = $this->pdo->query("SELECT * FROM `posts` ORDER BY `date` DESC");
        return $resultats->fetchAll();
    }

    /**
     * @param int $id
     */
    public function findPost(int $id)
    {
        $query = $this->pdo->prepare("SELECT * FROM `posts` WHERE id = :post_id");
        $query->execute(['post_id' => $id]);
        return $query->fetch();
    }

    /**
     * @param int $id
     */
    public function deletePost(int $id) : void
    {
        $query = $this->pdo->prepare("DELETE FROM `posts` WHERE id = :id");
        $query->execute(['id' => $id]);
    }

    /**
     * @param string $title
     * @param string $content
     * @param int $id_user
     */
    public function insertPost(string $title, string $content, int $id_user) : void
    {    
        $query = $this->pdo->prepare('INSERT INTO `posts` SET `title` = :title, `content` = :content, `id_user` = :id_user, `date` = NOW()');
        $query->execute(compact('title', 'content', 'id_user'));
    }

}