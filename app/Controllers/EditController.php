<?php

namespace App\Controllers;

use \App\Models\Plant;

class EditController
{

    public $app = '';
    public $options = '';
    public $connection = '';

    public function __construct($app, $options) {
        $this->app = $app;
        $this->options = $options;
        $this->connection = new MongodbController($this->app);
        $this->defaultAction();
    }

    public function defaultAction() {
        $plant = $this->findByID($this->options['params']['id']);
        switch ($this->options['method']) {
            case 'POST':
                $this->update();
                break;
            default:
                break;
        }
        require_once APP_ROOT . '/public/edit.php';
    }

    public function findByID($id) {
        return $this->connection->findByID($id);
    }

    public function update() {

        $date = new \DateTime();
        $year = isset($_POST['year']) ? $_POST['year'] : $date->format('o');
        $date = new \DateTime();
        $month = isset($_POST['month']) ? $_POST['month'] : $date->format('F');

        $plant = new Plant();
        $plant->setName($_POST['name']);
        $plant->setDescription($_POST['description']);
        $plant->setType($_POST['type']);
        $plant->setYear($year);
        $plant->setMonth($month);
        $plant->setSlug($this->slugify($_POST['name']));

        $plant = $this->connection->update($_POST['id'], $plant);

    }

    public function slugify($string) {
        $slug = strip_tags($string);
        $slug = iconv('utf-8', 'us-ascii//TRANSLIT', $slug);
        $slug = preg_replace('~[^-\w]+~', '', $slug);
        $slug = strtolower($slug);
        return $slug;
    }

}