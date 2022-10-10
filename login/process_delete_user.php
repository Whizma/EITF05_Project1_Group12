<?php
// Tanken är att ta bort användare sessionbaserat
session_start();
include 'db_connection.php';
$conn = openCon("login");
if (empty($_SESSION['token'])) {
    $_SESSION['token'] = bin2hex(random_bytes(32));
}
$token = $_SESSION['token'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (hash_equals($_POST["token"], $token)) {
        $_SESSION['response'] = http_response_code(200);
        $_SESSION['header'] = header($_SERVER["SERVER_PROTOCOL"] . " 200 Account deletion succesful!", true, 200);
        $title = "200 Succesful deletion!";
        $description = "200 Account deletion succesful!";
    } else {
        // döda skiten
        $_SESSION['response'] = http_response_code(405);
        $_SESSION['header'] = header($_SERVER["SERVER_PROTOCOL"] . " 405 Method Not Allowed", true, 405);
        $title = "405 Method Not Allowed";
        $description = "The method specified in the Request-Line is not allowed for the resource identified by the Request-URI. The response MUST include an Allow header containing a list of valid methods for the requested resource. ";

    }
} 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>
<title> <?php echo $title?> </title>
<link rev="made" href="mailto:is3006ma-s@student.lu.se" />
<style type="text/css"><!--/*--><![CDATA[/*><!--*/ 
    body { color: #000000; background-color: #FFFFFF; }
    a:link { color: #0000CC; }
    p, address {margin-left: 3em;}
    span {font-size: smaller;}
/*]]>*/--></style>
</head>

<body>
<h1><?php echo $title?> </h1>
<p>


<?php echo $description ?>

  

</p>
<p>
If you think this is a server error, please contact
the <a href="mailto:is3006ma-s@student.lu.se">webmaster</a>.

</p>

<h2> <?php echo $_SESSION["response"] ?> </h2>
<address>
  <a href="/">localhost</a><br />
  <span>Apache/2.4.53 (Unix) OpenSSL/1.1.1o PHP/8.1.6 mod_perl/2.0.12 Perl/v5.34.1</span>
</address>
</body>
</html>

