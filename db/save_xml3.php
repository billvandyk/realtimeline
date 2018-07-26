<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>Process Form</title>
<link href="../../timeline_dev/admin_simple/css/styles01.css" rel="stylesheet" type="text/css" />
</head>

<body>

<div id="container">

<div class="content">

<h3>Here are the results from the form.</h3>

<?php

$userName=$_GET['name'];
$userPassword=$_GET['password'];
$history=$_GET['history'];
$hobbies=$_GET['hobbies'];
$music=$_GET['music'];
$user = $_SERVER['AUTH_USER'];

echo 'NB! User:'.$user.' <br>';
echo 'Hello '. $userName . '<br>';
echo 'That is a great password: '. $userPassword.'<br>';
echo 'History: '.$history.' <br>';
echo 'Hobbies: '.$hobbies. '<br>'; 
echo 'Music: '.$music. '<br>';

?>

</div>



<div id="footer">
<h4>This is the form receiving repository.</h4>
</div>

</div>

</body>

</html>
