<?php
namespace App\Events;

class UserEvents
{
    public static function logLogin($user)
    {
        log_message('info', 'Login: ' . $user['email']);
    }
}
