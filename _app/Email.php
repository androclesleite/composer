<?php

namespace Notification;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Email
{

    private $mail = \stdClass::class;

    public function __construct($smtpDebug, $host, $user, $pass, $smtpSecure, $port, $setFromEmail, $setFromName)
    {


        $this->mail = new PHPMailer(true);
        $this->mail->SMTPDebug = $smtpDebug;                        // Enable verbose debug output
        $this->mail->isSMTP();                                      // Set mailer to use SMTP
        $this->mail->Host = $host;                                  // Specify main and backup SMTP servers
        $this->mail->SMTPAuth = true;                               // Enable SMTP authentication
        $this->mail->Username = $user;                              // SMTP username
        $this->mail->Password = $pass;                              // SMTP password
        $this->mail->SMTPSecure = $smtpSecure;                      // Enable TLS encryption, `ssl` also accepted
        $this->mail->Port = $port;

        $this->mail->CharSet = 'UTF-8';
        $this->mail->setLanguage('br');
        $this->mail->isHTML(true);

        $this->mail->setFrom($setFromEmail, $setFromName);

    }

    public function sendEmail($subject, $body, $replyEmail, $replyName, $addressEmail, $adrressName)
    {
        $this->mail->Subject = (string)$subject;
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
