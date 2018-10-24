<?php
// PHPMailer
use App\Controllers\PHPMailerController;

// optional php mailer
// actually, I then used AJAX
$app->post('/send', PHPMailerController::class . ':send' )->setName('mailer.send');
