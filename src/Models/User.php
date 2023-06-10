<?php

namespace App\Models;

use App\DB;

class User extends Model {
    static $table = 'posts';
    public $id;
    public $email;
    public $password;

    static function all() {
        $db = new DB();
        return $db->all(self::$table, self::class);
    }
}