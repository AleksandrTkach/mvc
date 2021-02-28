<?php

namespace App\models;

use App\core\Model;

class Account extends Model
{
    /**
     * @param $params
     * @return bool
     */
    public function userStore($params): bool
    {
        $user = $this->db->first('SELECT login FROM users WHERE login=:login', ['login' => $params['login']]);

        if (count($user))
            return false;
        else {
            $this->db->query('INSERT INTO users (login, password) VALUES (:login, :password)', $params);
            return true;
        }
    }

    /**
     * @param $params
     * @return array
     */
    public function userAuth($params): array
    {
        return $this->db->first('SELECT * FROM users WHERE login=:login AND password=:password', $params);
    }
}