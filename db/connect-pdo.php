<html>
<head>
<title>PDO Model - Add</title>
<meta name="keywords" content="PDO demonstration">
<meta name="category" content="model">
<link rel="stylesheet" type="text/css" href="css/main.css">
</head>

<body>


<?php
// Right now this fails.

$servername="localhost";
$username = "root";
$password = "Zebr@696";
$dbname = "phpmodel";

try {
$dbc = new PDO("mysql:host=localhost; history", $username, $password);
} catch (PDOException $e) {
	echo "Error: " . $e->getMessage();
}


$sql = "SELECT * FROM history_timeline WHERE end = NULL;
foreach ($database->query($sql) as $results
{echo $results["end"];
}

?>

</body>
<?php } ?>
</html>