<?php

require __DIR__ . '/../lib_ext/autoload.php';

use Notification\Email;

$newEmail = new Email(2, "mail.wsmtec.com.br", "jefferson@wsmtec.com.br", "@Mudar010203", "tls", '587',
    "jefferson@wsmtec.com.br", "Jefferson WSMTEC");
$newEmail->sendEmail("Assunto de teste", "<p>Esse é o teste <b>teste</b></p>", "androclesleite@outlook.cm",
    "Jefferson Outlook", "androclesleite@gmail.com", "Jefferson Gmail");

var_dump($newEmail);