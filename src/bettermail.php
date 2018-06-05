<?php
use Mailgun\Mailgun;
use Guzzle\Guzzle;

ini_set("runkit.internal_override", 1);
error_reporting(E_ERROR | E_PARSE);

function createMailgunInstance($apiKey) {
    $client = new \Http\Adapter\Guzzle6\Client();
    return new \Mailgun\Mailgun($apiKey, $client);
}

function overrideMail($closure)
{
    return runkit_function_redefine('mail', $closure);
}

?>