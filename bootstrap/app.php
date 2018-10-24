<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use App\Middleware\RedirectIfNotHttps;

require __DIR__ . '/../vendor/autoload.php';

/* Import configuration file:
 * slim settings
 * db config
*/
require __DIR__ . '/config.php';

$app = new \Slim\App(['settings' => $config]);

// adds RedirectIfNotHttps Middleware to the hole application if not in local
if($_SERVER['SERVER_NAME'] !== 'portfolio'){
  $app->add(new RedirectIfNotHttps);
}

/* Import container:
 * logger container
 * PDO db configuration container
 * twig view container
 * error 404 heandler
*/
require __DIR__ . "/container.php";

// import routes
require __DIR__ . '/../routes/web.php';
