<?php
/**
 * Created by PhpStorm.
 * User: enco
 * Date: 6.3.16.
 * Time: 23.02
 */

use EnRoute\Router;


require_once dirname(__DIR__)."/vendor/autoload.php";
error_reporting(E_ALL);
ini_set('display_errors', '1');


$router = new Router(); 

//echo $router->slugToCamelCase($router->getCurrentUri());
$router->slugToCamelCase($router->getCurrentUri());
