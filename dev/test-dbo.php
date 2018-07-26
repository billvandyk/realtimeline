<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta content="text/html; charset=windows-1252" http-equiv="Content-Type" />
<title>Untitled 1</title>
</head>

<body>
<?php 
// just test pdo 

try {
	$db = new PDO('mysql:host=localhost;dbname=history;charset=utf8', 'root','Zebr@696');
	var_dump($db);
	}
	catch(Exception $e) {
		echo $e->getMessage();
		}

?>


<?php

$sql    = "SELECT * FROM history_timeline WHERE caption = :caption";
$stmt   = $this->db->prepare($sql);
$result = $stmt->execute(array(":caption" => $caption));
$user   = $stmt->fetch(PDO::FETCH_ASSOC);
print_r($user);
?>


</body>

</html>
