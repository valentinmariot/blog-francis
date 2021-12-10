<?php

namespace App\Entity;

class User extends Model
{
    /**
     * @return array
     */
    public function findAllUsers() : array
    {
        $resultats = $this->pdo->query("SELECT * FROM `users` ORDER BY `id` DESC");
        return $resultats->fetchAll();
    }

    /**
     * @param int $id
     */
    public function findUser(int $id)
    {
        $query = $this->pdo->prepare("SELECT * FROM `users` WHERE id = :user_id");
        $query->execute(['user_id' => $id]);
        return $query->fetch();
    }

    /**
     * @param int $id
     */
    public function deleteUser(int $id) : void
    {
        $query = $this->pdo->prepare("DELETE FROM `users` WHERE id = :user_id");
        $query->execute(['user_id' => $id]);
    }

    /**
     * @param int $id
     * @param bool $isAdmin
     */
    public function updateUser(int $id, bool $isAdmin)
    {
        $query = $this->pdo->prepare("UPDATE `users` SET `is_admin` = :isAdmin WHERE `id` = :user_id");
        $query->execute(['user_id' => $id, 'isAdmin' => $isAdmin]);
    }

    /**
     * @param string $firstname
     * @param string $lastname
     * @param string $mail
     * @param string $pwd
     */
    public function insertUser(string $firstname, string $lastname, string $mail, string $pwd)
    {
        $is_admin = 0;
        $query = $this->pdo->prepare('INSERT INTO `users` SET `firstname` = :firstname, `lastname` = :lastname, `mail` = :mail, `is_admin` = :is_admin, `password` = :pwd');
        $query->execute(compact('firstname', 'lastname', 'mail', 'is_admin', 'pwd'));
    }
}