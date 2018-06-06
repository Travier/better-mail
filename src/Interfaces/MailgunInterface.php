<?php
namespace Travier\BetterMail\Interfaces;

use Mailgun\Mailgun;
use Travier\BetterMail\Override;


class MailgunInterface {
    private $client;
    private $instance;
    private $domain;
    private $fromAddress;

    function __construct($apiKey, $domain) {
        $this->domain = $domain;
        $this->client = new \Http\Adapter\Guzzle6\Client();
        $this->instance = new \Mailgun\Mailgun($apiKey, $this->client);
    }

    public function setFromAddress($address) {
        $this->fromAddress = $address;
    }

    public function sendMessage($to, $subject, $message, $headers = false)
    {
        $this->instance->sendMessage($this->domain, [
            'from'    => $this->fromAddress,
            'to'      => $to,
            'subject' => $subject,
            'text'    => $message
        ]);
    }

    public function replace() 
    {
        $self = $this;
        Override::func('mail', function($to, $subject, $message, $headers = false) use($self) {
            return $self->sendMessage($to, $subject, $message, $headers);
        });
    }
}
?>