<?php

namespace Core;

class Authenticator
{
    public function attempt($email, $password)
    {
        $db = App::resolve(Database::class);

        $query = 'SELECT * FROM users WHERE email = :email';

        $user = $db->query($query, [':email' => $email])->get();

        if ($user) {
            if (password_verify($password, $user['password'])) {
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
        $_SESSION = [];
        session_destroy();

        $params = session_get_cookie_params();
        setcookie('PHPSESSID', '', time() - 3600, $params['path'], $params['domain'], $params['secure'], $params['httponly']);
    }
}