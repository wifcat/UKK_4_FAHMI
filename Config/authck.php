<?php

namespace App\Authck;

class Auth
{
    public static $adminSession = 'role';

    private static function sesStart()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }

    public static function isLogin(): bool
    {
        self::sesStart();
        return isset($_SESSION['login']) && $_SESSION['login'] === true;
    }

    public static function guard()
    {
        if (!self::isLogin()) {
            header("Location: V_Login.php");
            exit;
        }
    }

    public static function isSigned()
    {
        if (self::isLogin()) {
            header("Location: profile.php");
            exit;
        }
    }

    public static function adminOnly()
    {
        self::guard();

        if($_SESSION[self::$adminSession] != 'admin'){
            die("<h1>Akses ditolak!</h1><p>Oops! sepertinya Anda tidak memiliki akses ke halaman ini.</p>");
        }
    }
}