<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta content="text/html; charset=windows-1252" http-equiv="Content-Type" />
<title>Update Fields PDO - History Timeline</title>
</head>

<body>


<?php

// $attrs is optional, this demonstrates using persistent connections,
// the equivalent of mysql_pconnect
$attrs = array(PDO::ATTR_PERSISTENT => true);

// connect to PD// $attrs is optional, this demonstrates using persistent connections,
// the equivalent of mysql_pconnect
$attrs = array(PDO::ATTR_PERSISTENT => true);

// connect to PDO
$pdo = new PDO("mysql:host=localhost;dbname=history", "root", "Zebr@696", $attrs);

// the following tells PDO we want it to throw Exceptions for every error.
// this is far more useful than the default mode of throwing php errors
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// prepare the statement. the place holders allow PDO to handle substituting
// the values, which also prevents SQL injection
$stmt = $pdo->prepare("SELECT * FROM history_timeline WHERE end=:null");

// bind the parameters
// $stmt->bindValue(":start", 6);
// $stmt->bindValue(":brand", "Slurm");

// $NewEndDate=

// initialise an array for the results 
$history = array();
if ($stmt->execute()) {
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $history[] = $row;
    }
}

// set PDO to null in order to close the connection
$pdo = null;O
$pdo = new PDO("mysql:host=localhost;dbname=history", "root", "Zebr@696", $attrs);

// the following tells PDO we want it to throw Exceptions for every error.
// this is far more useful than the default mode of throwing php errors
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// prepare the statement. the place holders allow PDO to handle substituting
// the values, which also prevents SQL injection
$stmt = $pdo->prepare("SELECT * FROM history_timeline WHERE end=:null");

// bind the parameters
// $stmt->bindValue(":productTypeId", 6);
// $stmt->bindValue(":brand", "Slurm");

// initialise an array for the results 
$history = array();
if ($stmt->execute()) {
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $history[] = $row;
    }
}

// set PDO to null in order to close the connection
$pdo = null;

?>

</body>

</html>
