<?php

use \DI\Container;
use Slim\Factory\AppFactory;


require __DIR__ . '/../../vendor/autoload.php';


// Instantiate app.
$container = new Container();
AppFactory::setContainer($container);
$app = AppFactory::create();
$app->setBasePath('/crud-slim4');  //Ruta base. (Se agrega solo si no tiene un VirtualHost creado).
$container = $app->getContainer();


// Add Routing Middleware.
$app->addRoutingMiddleware();


date_default_timezone_set('America/Santiago');  //Se define la zona horaria para obtener la fecha y hora correcta. 


require __DIR__ . "/Configs.php";
require __DIR__ . "/Dependencies.php";
require __DIR__ . "/Loggers.php";
require __DIR__ . "/Routes.php";
require __DIR__ . "/Services.php";
require __DIR__ . "/Models.php";


// Add Error Middleware with Logger.
$logger = $container->get('logger_files');
$errorMiddleware = $app->addErrorMiddleware(true, true, true, $logger);


$app->run();