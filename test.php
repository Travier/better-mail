<?php
//how to install runkit https://gist.github.com/tortuetorche/6700217
require('vendor/autoload.php');
require('src/bettermail.php');

$apiKey = "";
$mailgun = createMailgunInstance();
overrideMail(function($to, $subject, $message) use($mailgun) {
    $mailgun->sendMessage('domain', [
        'from'    => 'from',
        'to'      => 'to',
        'subject' => $subject,
        'text'    => $message
      ]);
});

mail("from" , "Hello, World!", "Whats gucci?");
?>