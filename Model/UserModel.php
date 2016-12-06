<?php

namespace Model;

class UserModel extends BaseModel
{
    protected $table = 'users';

    public function userSettings($login)
    {
        $user = $this->db->query('SELECT * FROM `' . $this->table . '` WHERE `login` = ' . "'$login'");
        return $user[0];
    }
}