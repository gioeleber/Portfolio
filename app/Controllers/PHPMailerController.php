<?php
namespace App\Controllers;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Option php Mailer Controller
// Actually, I then used AJAX to submit the contact form

class PHPMailerController extends Controller
{
  public function send($request, $response, $args) {
    // Variables
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $message = filter_var($_POST['message'], FILTER_SANITIZE_STRING);

    // Honeypot
    if ( !empty($_POST['phone']) ) {
      header("Location: /");
      exit();

    } else {
      // Error checking
      $errors = [];
      if (empty($email)) {
        $errors['email_empty'] = "Il campo email è obbligatorio";
      }
      if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email_invalid'] = "L'email inserita non è valida";
      }
      if (empty($message)) {
        $errors['message_empty'] = "Il campo messaggio è obbligatorio";
      }
      if (strlen($message) < 12) {
        $errors['message_lenght_min'] = "Il messaggio è troppo breve, deve essere almeno 12 caratteri";
      }
      if (strlen($message) > 1000) {
        $errors['message_lenght_max'] = "Il messaggio è troppo lungo";
      }
      // loop the error array
      if (!count($errors) == 0) {
        echo "<ul class='message--error'>";
        foreach ($errors as $error) {
          echo "<li>$error</li>";
        }
        echo "</ul>";
      } else {
        // PHPMailer
        $mail = new PHPMailer(true);
        try {
          //Recipients
          $mail->setFrom($email, 'Site user');
          $mail->addAddress('gioele.bernardi5@gmail.com');

          $body= "Hai un nuovo messsaggio da parte di $email, il contenuto è: <br> $message";
          //Content
          $mail->isHTML(true);
          $mail->Subject = "Nuovo messaggio da parte di $email";
          $mail->Body    = $body;
          $mail->AltBody = strip_tags($body);
          $mail->send();
          echo "<span class='message--success'>Il tuo messaggio è stato inviato con successo, riceverai al più presto una risposta</span>";
        } catch (Exception $e) {
            echo "<span class='message--error'>Il messaggio non è stato inviato. Errore del servizio di posta: $mail->ErrorInfo Riprova</span>";
        }
      }
    }
  }
}
