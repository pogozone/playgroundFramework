<?php

namespace App\Controllers;

class PlantController
{

    public $app = '';

    public function __construct($app) {
        $this->app = $app;
        $this->defaultAction();
    }

    public function defaultAction() {
        $this->list();
    }

    public function list() {
        $con = new MongodbController($this->app);
        $plants = $con->findAll();
        require_once APP_ROOT . '/public/list.php';
    }
}