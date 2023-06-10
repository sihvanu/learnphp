<?php

use App\Controllers\PublicController;
use App\Router;

Router::addRoute('/', [PublicController::class, 'index']); // App\Controllers\PublicController
Router::addRoute('/about', [PublicController::class, 'about']);