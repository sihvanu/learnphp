<?php

namespace App\Controllers;

use App\Models\Post;

class PublicController {
    public function index() {

        $result = Post::all();
        dd($result);
        $name = 'Anu';
        view('index', compact('name'));
    }

    public function about() {
        view('about');
    }
}