<?php
namespace App\Controllers;

use PDO;
use App\Models\Items;

/// Routes to the legal Pages

class LegalController extends Controller
{
  // GET /cookie-policy
  public function cookie($request, $response, $args)
  {
    // Render cookie-policy
    return $this->c->view->render($response, 'legal/cookie.twig', [
        'title' => 'Cookie Policy'
    ]);
  }

  // GET /privacy-policy
  public function privacy($request, $response, $args)
  {
    // Render privacy-policy
    return $this->c->view->render($response, 'legal/privacy.twig', [
        'title' => 'Privacy Policy'
    ]);
  }
}
