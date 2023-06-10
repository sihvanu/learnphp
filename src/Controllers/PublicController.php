<?php

namespace App\Controllers;

class PublicController {
    public function index() {
        $name = 'Anu';
        view('index', compact('name'));
    }

    public function about() {
        view('about');
    }
}