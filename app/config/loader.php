<?php

use Phalcon\Loader;

$loader = new Loader();

$loader->registerDirs(
    [
        $config->application->libraryDir.'Excel/'
    ]
);

/**
 * Register Namespaces
 */
$loader->registerNamespaces([
	'Phalcon' 		   => $config->application->libraryDir . 'Phalcon',
	'Moet\Models' => APP_PATH . '/common/models/',
    'Moet\Library'   => $config->application->libraryDir,
    'Moet\Components'   => APP_PATH . '/common/components/',
]);

/**
 * Register module classes
 */
$loader->registerClasses([
    'Moet\Modules\Frontend\Module' => APP_PATH . '/modules/frontend/Module.php',
    'Moet\Modules\Cli\Module'      => APP_PATH . '/modules/cli/Module.php'
]);

$loader->register();
