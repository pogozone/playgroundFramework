<?php

namespace App\Controllers;

use \App\Controllers\PlantController;

class HomepageController {

    public $app = '';

    public function __construct($app) {
        $this->app = $app;
        $this->list();
    }

    public function list() {
        $controller = new PlantController($this->app);
        return $controller->list();
    }
}
