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
// this now works!

	$handler = new PDO('mysql:host=localhost; dbname=history', 'root', 'Zebr@696');
	$handler->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	} catch (PDOException $e) {
	echo "Connection failed: ".$e->getMessage();
	exit;
	}
	
$sql = $handler->prepare("SELECT * FROM history_timeline ORDER BY start ASC");
$sql->execute();
while($result = $sql->fetch(PDO::FETCH_ASSOC)){
?>

<table>
<tr>
	<td>

	<?php echo $result['start'];?>
	
	</td>
	$start=$result['start'];
	$end=$result['end'];
	<td>
	<?php echo $start."-- the variable"; ?>
		IF $end=NULL
	</td>
<td><?php echo $result['end'];?></td>
<td><?php echo $result['title']."<br/>";?></td>
</tr>
</table>

<?php } ?>
	

</body>

</html>
