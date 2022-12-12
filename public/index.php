<?php

require_once '../config/config.php';

$app['mongodb'] = yaml_parse_file('../config/mongodb.yml');

const INCLUDES = [
    '../app/Controllers/HomepageController.php',
    '../app/Controllers/PlantController.php',
    '../app/Controllers/MongodbController.php',
    '../app/Controllers/EditController.php',
    '../app/Models/Plant.php',
];
foreach (INCLUDES as $include) {
    require_once($include);
}

use \App\Controllers\HomepageController;
use \App\Controllers\PlantController;
use \App\Controllers\EditController;

function router($app)
{

    $url = filter_var($_GET['route'], FILTER_SANITIZE_URL);
    $method = $_SERVER['REQUEST_METHOD'];

    $routes = yaml_parse_file('../config/routes.yml');
    $params = [];

    $parts = explode('/', $url);
    $url = $parts[0] ? array_shift($parts) : 'homepage';
    $match_values = $parts;

    foreach ($routes as $route) {
        $options = [];
        $parts = explode('/', $route['path']);
        $path = $parts[0] ? array_shift($parts) : '';
        $match_keys = $parts;
        if ($path == $url) {
            if (count($match_keys) == count($match_values))
                $params = array_combine($match_keys, $match_values);

            $options = [
                'params' => $params,
                'method' => $method
            ];

            switch ($path) {
                case 'index':
                case 'homepage':
                    $controller = new HomepageController($app, $options);
                    break;
                case 'plant':
                    $controller = new PlantController($app, $options);
                    break;
                case 'edit':
                    $controller = new EditController($app, $options);
                    break;
                default:
                    break;
            }
        }
    }

}
router($app);