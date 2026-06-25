<?php

namespace Core;

class Authenticator
{
    public function attempt($attributes)
    {
        $db = App::resolve(Database::class);

        $query = 'SELECT * FROM users WHERE email = :email';

        $user = $db->query($query, [':email' => $attributes['email']])->get();

        if ($user) {
            if (password_verify($attributes['password'], $user['password'])) {
                $this->login($user);
                return true;
            };
        }

        return false;
    }

    public function login($user)
    {
        $_SESSION['user'] = [
            'name' => $user['name'],
        ];

        session_regenerate_id(true);
    }

    public function logout()
    {
        Session::destroy();
    }
}