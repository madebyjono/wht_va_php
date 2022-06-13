<?php

require 'vendor/autoload.php';

use greeny\MailLibrary\Drivers\ImapDriver;
use greeny\MailLibrary\Connection;
use greeny\MailLibrary\Mail;


$driver = new ImapDriver(
	'madebyjono.llp', 'ticxceqxecrwjvhk',
	'imap.gmail.com',
	'993',
	TRUE
);

$connection = new Connection($driver);

$mailboxes = $connection->getMailboxes('INBOX');
$mailbox = $mailboxes[0];

$selection = $mailbox->getMails();

$selection->where(Mail::FROM, '	no-reply@hasil.gov.my')
	  ->where(Mail::SUBJECT,'MyTax (VA) - OTP Code')
 	->limit(1);

foreach($selection as $mail) {
	$body = $mail->getBody();
	preg_match('/\d\d\d\d\d\d/', $body, $matches);

	ray($matches);

}
