<?php

namespace App\Models;

use App\DB;

class User extends Model{
    static $table = 'users';
    public $id;
    public $email;
    public $password;
}