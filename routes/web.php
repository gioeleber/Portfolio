<?php
use App\Controllers\PagesController;
use App\Controllers\LegalController;
use App\Controllers\FileResponse;
// Router

// GET /index
$app->get('/', function ($request, $response, $args) {
    return $this->view->render($response, 'home.twig', [
        'title' => 'Online marketer, front-end e back-end developer'
    ]);
})->setName('home');

// GET /soft-skills
$app->get('/soft-skills', PagesController::class . ':softSkills' )
  ->setName('softSkills');

// GET /skills
$app->get('/skills', PagesController::class . ':skills' )
  ->setName('skills');

// GET /lavori-precedenti
$app->get('/lavori-precedenti', PagesController::class . ':lavoriPrecedenti' )
  ->setName('lavoriPrecedenti');

// GET /istruzione
$app->get('/istruzione', PagesController::class . ':istruzione' )
  ->setName('istruzione');

// GET /portfolio-lavori
$app->get('/portfolio-lavori', PagesController::class . ':portfolioLavori' )
  ->setName('portfolioLavori');

// GET /altri-interessi
$app->get('/altri-interessi', PagesController::class . ':altriInteressi' )
  ->setName('altriInteressi');

// GET /libri
$app->get('/libri', PagesController::class . ':libri' )
  ->setName('libri');

// GET /su-di-me
$app->get('/su-di-me', PagesController::class . ':suDiMe' )
  ->setName('suDiMe');

// GET /curriculum vitae, PDF file
$app->get('/curriculum-vitae',function($request, $response){
  $filePath = __DIR__ . '/..';
  if($_SERVER['SERVER_NAME'] == 'portfolio'){
    $filePath .= '/public/assets/pdf/cv-gioele-bernardi.pdf';
  } else {
    $filePath .= '/assets/pdf/cv-gioele-bernardi.pdf';
  }

  return FileResponse::getResponse($response, $filePath);
})->setName('curriculumVitae');

// Legal //
// GET /cookie-policy
$app->get('/cookie-policy', LegalController::class . ':cookie' )
  ->setName('cookie');

// GET /privacy-policy
$app->get('/privacy-policy', LegalController::class . ':privacy' )
  ->setName('privacy');
