<?php

namespace App\Route;

use App\Controllers\ProfileController;

$app->group('/profile/', function () {

    $this->get('facebook/{id:[0-9]+}', ProfileController::class . ':facebook');

});
