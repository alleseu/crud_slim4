<?php 

use App\Services\ProductoService;
use App\Services\CategoriaService;
use Psr\Container\ContainerInterface;


$container->set('servicio_producto', function(ContainerInterface $container) {
	return new ProductoService($container->get('modelo_producto'));
});

$container->set('servicio_categoria', function(ContainerInterface $container) {
	return new CategoriaService($container->get('modelo_categoria'));
});