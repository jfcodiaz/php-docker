<?php
include '../app/bootstrap.php';
use  \MongoDB\Driver\Manager as MongoDBManager;

$hello = new App\Hello();

printf('<h1 id="hello-word">%s</h1>', $hello->sayHelloWorld());

$mng = new MongoDB\Driver\Manager("mongodb://root:toor@mongo:27017");

$listdatabases = new MongoDB\Driver\Command(["listDatabases" => 1]);

$res = $mng->executeCommand("admin", $listdatabases);

$databases = current($res->toArray());

foreach ($databases->databases as $el) {

    echo $el->name . "<br>\n";
}

die;
$file = file_get_contents('php-logo.png');

$uid = $uid = md5(uniqid(time()));
$name = 'logo.png';
$imageId = time();

$message = 
"--{$uid} \r\n".
"Content-Type: text/plain; charset=\"iso-8859-1\"\r\n".
"Content-Transfer-Encoding: 7bit\r\n\r\n".
"Hi PHP by email as Text \r\n\r\n" .
"--{$uid} \r\n".
"Content-Type: text/html; charset=\"iso-8859-1\"\r\n".
"Content-Transfer-Encoding: 7bit\r\n\r\n".
"<h1>Hloo</h1> <img src=\"cid:$imageId\" alt=\"image.png\">\r\n".
"\r\n--{$uid}\r\n".
"Content-Type: image/png; name=\"logo.png\"\r\n" .
"Content-Transfer-Encoding: base64\r\n" .
"Content-Disposition: attachment; filename=\"logo.png\"\r\n" .
"X-Attachment-Id: $imageId\r\n".
"Content-ID: <$imageId>\r\n".
"\r\n" . chunk_split(base64_encode($file)) . "\r\n"
;

mail(
    "J Fco Díaz<jfcodiaz@gmail.com>", 
    "Email Subject", 
    $message, 
    "From: Sender\r\n" .
    "Content-Type: multipart/mixed; boundary=\"$uid\"\r\n"
);


phpinfo();
