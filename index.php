<?php

require __DIR__ . '/lib_ext/autoload.php';

use Notification\Email;

$newEmail = new Email;
$newEmail->sendEmail("Assunto de teste", "<p>Esse é o teste <b>teste</b></p>", "androclesleite@outlook.cm",
    "Jefferson Outlook", "androclesleite@gmail.com", "Jefferson Gmail");

var_dump($newEmail);