<?php
$container = $app->getContainer();

// logger container
$container['logger'] = function($c) {
    $logger = new \Monolog\Logger('my_logger');
    $file_handler = new \Monolog\Handler\StreamHandler('../logs/app.log');
    $logger->pushHandler($file_handler);
    return $logger;
};
// $this->logger->addInfo('log');

// db configuration container with PDO
$container['db'] = function ($c) {
    $db = $c['settings']['db'];
    $pdo = new PDO('mysql:host=' . $db['host'] . ';dbname=' . $db['dbname'], $db['user'], $db['pass']);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    return $pdo;
};

// twig view container
$container['view'] = function ($c) {
    if($_SERVER['SERVER_NAME'] == 'portfolio'){
      $vache_dir = false;
    } else {
      $vache_dir = __DIR__ . '/../cache';
    }
    $view = new \Slim\Views\Twig(__DIR__ . '/../views', [
      'cache' => $vache_dir
    ]);

    // Instantiate and add Slim specific extension
    $router = $c->get('router');
    $uri = \Slim\Http\Uri::createFromEnvironment(new \Slim\Http\Environment($_SERVER));
    $view->addExtension(new \Slim\Views\TwigExtension($router, $uri));

    return $view;
};

// error 404 heandler
$container['notFoundHandler'] = function ($c) {
    return new App\Handlers\NotFoundHandler($c['view']);
};
