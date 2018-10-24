<?php
namespace App\Controllers;

class RedirectController extends Controller
{
    public function index($request, $response) {
        return $response->withRedirect($this->c->router->pathFor('path'));
    }
}
