<?php

use Phalcon\Di\FactoryDefault;
use Phalcon\Mvc\Application;
use Phalcon\Logger\Adapter\File\Multiple as Logger;

error_reporting(E_ALL);
ini_set("display_errors", 1);
date_default_timezone_set('Asia/Ho_Chi_Minh');

define('BASE_PATH', dirname(__DIR__));
define('APP_PATH', BASE_PATH . '/app');
define('DEBUG', true);

try {

    /**
     * The FactoryDefault Dependency Injector automatically registers the services that
     * provide a full stack framework. These default services can be overidden with custom ones.
     */
    $di = new FactoryDefault();

    /**
     * Include general services
     */
    require APP_PATH . '/config/services.php';

    /**
     * Include web environment specific services
     */
    require APP_PATH . '/config/services_web.php';

    /**
     * Get config service for use in inline setup below
     */
    $config = $di->getConfig();

    /**
     * Include Autoloader
     */
    include APP_PATH . '/config/loader.php';

    /**
     * Handle the request
     */
    $application = new Application($di);

    /**
     * Register application modules
     */
    $application->registerModules([
        'frontend' => ['className' => 'Moet\Modules\Frontend\Module'],
    ]);

    /**
     * Include routes
     */
    require APP_PATH . '/config/routes.php';

    echo str_replace(["\n","\r","\t"], '', $application->handle()->getContent());

} catch (\Exception $e) {
    switch (DEBUG) {
        case true:
            echo $e->getMessage() . "<br>";
            echo '<pre>' . $e->getTraceAsString() . '</pre>';
            break;
        default:
            $logger = new Logger(BASE_PATH.'/logs', ['prefix'=>'system_', 'extension'=>'log']);
            $logger->error($e->getMessage()."\n".$e->getTraceAsString()."\n");

            $response = new Phalcon\Http\Response();
            $response->setStatusCode(400, "Bad request");
            $response->setContent("Bad request");
            $response->send();
            break;
    }
}
