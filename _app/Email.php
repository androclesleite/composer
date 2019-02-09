<?php

namespace Notification;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Email {

    private $mail = \stdClass::class;

    public function __construct() {


        $this->mail = new PHPMailer(true);
        $this->mail->SMTPDebug = 2;                                 // Enable verbose debug output
        $this->mail->isSMTP();                                      // Set mailer to use SMTP
        $this->mail->Host = 'mail.wsmtec.com.br';  // Specify main and backup SMTP servers
        $this->mail->SMTPAuth = true;                               // Enable SMTP authentication
        $this->mail->Username = 'jefferson@wsmtec.com.br';                 // SMTP username
        $this->mail->Password = '@Mudar010203';                           // SMTP password
        $this->mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
        $this->mail->Port = 587;

        $this->mail->CharSet = 'UTF-8';
        $this->mail->setLanguage('br');
        $this->mail->isHTML(true);

        $this->mail->setFrom('androclesleite@gmail.com', 'Jefferson & CIA');

//        $this->mail->addAddress('joe@example.net', 'Joe User');     
//        $this->mail->addAddress('ellen@example.com');             
//        $this->mail->addReplyTo('info@example.com', 'Information');
//        $this->mail->addCC('cc@example.com');
//        $this->mail->addBCC('bcc@example.com');
    }

    public function sendEmail($subject, $body, $replyEmail, $replyName, $addressEmail, $adrressName) {
        $this->mail->Subject = (string) $subject;
        $this->mail->Body = $body;

        $this->mail->addReplyTo($replyEmail, $replyName);
        $this->mail->addAddress($addressEmail, $adrressName);

        try {
            $this->mail->send();
        } catch (Exception $ex) {
            echo "Erro ao enviar o email: {$this->mail->ErrorInfo} {$ex->getMessage()}";
        }
    }

}
