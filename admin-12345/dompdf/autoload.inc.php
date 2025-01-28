<?php

require_once __DIR__ . '/lib/html5lib/Parser.php';
require_once __DIR__ . '/lib/php-font-lib/src/FontLib/Autoloader.php';
require_once __DIR__ . '/lib/php-svg-lib/src/autoload.php';

/*
 * New PHP 5.3.0 namespaced autoloader
 */
require_once __DIR__ . '/src/Autoloader.php';

Dompdf\Autoloader::register();
