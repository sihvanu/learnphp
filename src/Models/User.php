<?php

namespace App\Models;

use App\DB;

class User extends Model
{
    static $table = 'users';
    public $id;
    public $email;
    public $password;

    static function auth()
    {
        if ($_SESSION['userId']) {
            return self::find($_SESSION['userId']);
        }
        return false;
    }
}
