# BetterMail
Override PHP mail() with a different sending solution

PHP RunKit extention is required
https://gist.github.com/tortuetorche/6700217
#### Why do this?
A fix for legacy PHP codebases that littered mail() throughout the code base. This hack lets you replace the mail() function with a different sending solution rather than refactor the code base. 
#### Simple Example:
```php
use Travier\BetterMail\Override;

mail('test@gmail.com', 'Subject', 'Message')
//results: will attempt to mail using sendmail

Override::func('mail', function($message) {
  echo $message;
});

mail("Hello, World!")
//results: "Hello, World!" to the screen
```

#### Replace mail() with Mailgun interface:
```php
use Travier\BetterMail\Interfaces\MailgunInterface;

$apiKey = "";
$domain = "";

//init mailgun
$mail = new MailgunInterface($apiKey, $domain);
//set from address
$mail->setFromAddress("test@gmail.com");
//override mail() to use Mailgun interface;
$mail->override();

mail("test@gmail.com", "Testing", "Hello");
```
