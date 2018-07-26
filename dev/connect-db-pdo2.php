<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>PDO Connection Test</title>
</head>

<body>

<?php

try {
//	$handler = new PDO('mysql:host=localhost; dbname=wrongname', 'root', 'Zebr@696');

// why does this fail?  It is exactly like the demonstrated model !!!
// This now works!! 2017-11-14 !
// now it doesn't 2018-01-02 !

	$handler = new PDO('mysql:host=localhost; dbname=history', 'root', 'Zebr@696');
	$handler->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	} catch (PDOException $e) {
	echo "Connection failed: ".$e->getMessage();
	exit;
	}
	
$sql = $handler->prepare("SELECT * FROM history_timeline INTO OUTFILE 'dateExport.txt' 
	FIELDS ENCLOSED BY '\"' TERMINATED BY ';' ESCAPED BY '\"' LINES TERMINATED BY '\\r\\n'");
$sql->execute();
while($result = $sql->fetch(PDO::FETCH_ASSOC)){
?>

<!-- optional test section
-->


<?php } ?>
	

</body>

</html>
