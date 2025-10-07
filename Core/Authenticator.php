<?php

namespace Core;

class Authenticator
{
    private $db;
    private $dbName;
    private $query;

    public function __construct(Database $db, $dbName)
    {
        $this->db = $db;
        $this->dbName = $dbName;
         $this->query = App::resolve(Query::class);
    }

    public static function logout()
    {
        $_SESSION = [];
        session_destroy();
        $params = session_get_cookie_params();
        setcookie('PHPSESSID', '', time() - 3600, $params['path'], $params['domain'], $params['secure'], $params['httponly']);
        setcookie('login', '', time() - 3600, $params['path'], $params['domain'], $params['secure'], $params['httponly']);
        setcookie('password', '', time() - 3600, $params['path'], $params['domain'], $params['secure'], $params['httponly']);
        header('location: /');
        exit();
    }

    public function login($user, $userLog, $password)
    {
        session_regenerate_id(true);
        $_SESSION['user'] = [
            'email' => $user['email']
        ];
        setcookie('login', $userLog, time() + 3600, "/");
        setcookie('password', $password, time() + 3600, "/");
        header('location: /dashboard');
        exit();
    }

    public function getUserDataByEmail($email)
    {
        $sql = $this->query->table('users')->columns(['*'])->where('email = :email')->get();
        $params = ['email' => $email];
        $user = $this->db->query($sql, $params)->fetch();
        return $user;
    }

    public function getCurrentUserId()
    {
        $email = $_COOKIE['login'] ?? NULL;
        if (isset($email)) {
            $sql = $this->query->table('users')->columns(['id'])->where('email = :email')->get();
            $params = ['email' => $email];
            $userIdCheck = $this->db->query($sql, $params)->fetch();
            $userId = Validator::sanitizeValues($userIdCheck);
        }
       return $userId;
    }
}