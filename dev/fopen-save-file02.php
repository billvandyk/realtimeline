<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta content="text/html; charset=windows-1252" http-equiv="Content-Type" />
<title>Untitled 1</title>
</head>

<body>

<?php

$conmysql = mysqli_connect("localhost", "root", "Zebr@696", "history");

IF (!$conmysql) {
	echo "Error: unable to connect.". PHP_EOL;
	echo "Debugging errno: ". mysqli_connect_errno() . PHP_EOL;
	echo "Debugging error: ". mysqli_connect_error() . PHP_EOL;
	exit;
	}
	
echo "Success: a proper connection was established.  ".PHP_EOL;
echo "Host information: " .mysqli_get_host_info($conmysql) . PHP_EOL;	

?>



<table>
<tr>
<td><?php echo $result['start'];?></td>
<td><?php echo $result['end'];?></td>
<td><?php echo $result['title'];?></td>
</tr>
</table>


<?php } ?>


</body>

</html>
