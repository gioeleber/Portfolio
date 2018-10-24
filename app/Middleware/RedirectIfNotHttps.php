<?php
namespace App\Middleware;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class RedirectIfNotHttps
{
  public function __invoke(Request $request,  Response $response, $next) {
    if ( $request->getUri()->getScheme() !== 'https' ) {
        $uri = $request->getUri()->withScheme("https")->withPort(null);
        return $response->withRedirect( (string)$uri );
    } else {
        return $next($request, $response);
    }
  }
}
