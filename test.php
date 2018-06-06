<?php
//how to install runkit https://gist.github.com/tortuetorche/6700217
require('vendor/autoload.php');
use Travier\BetterMail\Interfaces\MailgunInterface;

$apiKey = "";
$domain = "";

//init mailgun
$mail = new MailgunInterface($apiKey, $domain);
//set from address
$mail->setFromAddress("test@gmail.com");
//redefine mail() to use Mailgun interface;
$mail->replace();

mail("test@gmail.com", "Testing", "Hello");