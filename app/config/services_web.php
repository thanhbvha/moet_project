<?php

use Moet\Components\UserActivityLogComponent;
use Moet\Components\UsersLogEvent;
use Phalcon\Crypt;
use Phalcon\Flash\Direct as Flash;
use Phalcon\Flash\Session as FlashSession;
use Phalcon\Logger\Adapter\File\Multiple as MultipleLogger;
use Phalcon\Mvc\Dispatcher;
use Phalcon\Mvc\Router;
use Phalcon\Mvc\Url as UrlResolver;
use Phalcon\Mvc\View;
use Phalcon\Mvc\View\Engine\Volt as VoltEngine;
use Phalcon\Security;
use Phalcon\Session\Adapter\Files as SessionAdapter;
use Phalcon\Events\Manager as EventsManager;

/**
 * Registering a router
 */
$di->setShared('router', function () {
    $router = new Router();

    $router->setDefaultModule('frontend');

    return $router;
});

/**
 * The URL component is used to generate all kinds of URLs in the application
 */
$di->setShared('url', function () {
    $config = $this->getConfig();

    $url = new UrlResolver();
    $url->setBaseUri($config->application->baseUri);

    return $url;
});

/**
 * Logger config
 */
$di->setShared('logger',function () {
    $config = $this->getConfig();
    $logger = new MultipleLogger($config->application->logsDir, ['prefix'=>'moet_', 'extension'=>'log']);
    return $logger;
});

/**
 * Crypt config
 */
$di->set('crypt',function () {
        $crypt = new Crypt();
        $crypt->setKey(
            '$2y$12$VzYrWGkwYUJlRnBNRGFhaucvWXQHrDEsSS9EmtqLctkxDVxMd0csq'
        );
        return $crypt;
    }, true
);

/**
 * Security config
 */
$di->set('security',function () {
        $security = new Security();
        $security->setWorkFactor(12);
        return $security;
    }, true
);

/**
 * Starts the session the first time some component requests the session service
 */
$di->setShared('session', function () {
    $session = new SessionAdapter();
    $session->start();

    return $session;
});

/**
 * Register the session flash service with the Twitter Bootstrap classes
 */
$di->set('flash', function () {
    return new FlashSession([
        'error'   => 'alert alert-danger',
        'success' => 'alert alert-success',
        'notice'  => 'alert alert-info',
        'warning' => 'alert alert-warning'
    ]);
});

/**
* Set event user log
*/
$di->setShared('userlog', function() {
    $eventsManager = new EventsManager();
    $userActivityLogComponent = new UserActivityLogComponent();
    $userActivityLogComponent->setEventsManager($eventsManager);
    $eventsManager->attach("userlog", new UsersLogEvent());
    return $userActivityLogComponent;
});

/**
* Set the default namespace for dispatcher
*/
$di->setShared('dispatcher', function() {
    $dispatcher = new Dispatcher();
    $dispatcher->setDefaultNamespace('Moet\Modules\Frontend\Controllers');
    return $dispatcher;
});
