# Mantenedor - PHP Slim 4 Framework

### Autor: Alejandro Alberto Sánchez Iturriaga
### Copyright 2020
### Slim versión 4.5
### PHP 7.4.6
___
## Si desea crear un proyecto desde cero con la misma estructura, es necesario instalar los siguientes recursos:
- Crear el directorio para el proyecto slim-4.
- Debe tener instalado previamente Git y Composer.
- Abrir la terminal de Git en el directorio creado.
- Instalar los siguientes recursos a través de composer:
	- $ composer require slim/slim:"4.5"
	- $ composer require slim/psr7
	- $ composer require php-di/php-di
	- $ composer require monolog/monolog
- Hacer referencia a las clases personalizadas:
	- Escribir el objeto "autoload" en el archivo composer.json
		- "autoload": {
			  "psr-4": {
			  	  "App\\": "src/"
			  }
		  }
	- Escribir en la terminal de Git:
		- $ composer dump-autoload
___
## Link de recursos
- (http://www.slimframework.com/)  Sitio oficial del framework Slim PHP.
- (https://php-di.org/)  Sitio oficial del contenedor de inyección de dependencia para humanos.
- (https://github.com/luispastendev/Slim4-Skeleton)  Esqueleto para el framework Slim 4.
- (https://github.com/Seldaek/monolog/)  Biblioteca para registrar errores, que cumple con el estándar PSR-3.