<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
<title>View/Edit Records</title>
<link href="../css/database.css" rel="stylesheet" type="text/css">
<link href="../css/database.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="../css/dev.css">

</head>
<body>

<?php

/* 
	VIEW.PHP
	Displays all data from 'players' table
*/

	// connect to the database
	include('connect-db.php');

	// get results from database
	$result = mysql_query("SELECT * FROM history_timeline ORDER BY start") 
		or die(mysql_error());  
		
	// display data in table
	echo "<p><b>View All</b> | <a href='view-paginated.php?page=1'>View Paginated</a> | <a href='default.php'>Main Menu</a></p>";
		
	echo "<p>The database is \"history\".  The table is \"history_timeline\". </p>";
	
// next 10 lines should be deleted once the issue is mastered 
	echo "<table border='1' cellpadding='10'>";
	
	echo "<tr>";
	echo "<th>".Recno."</th>";
	echo "<th>".Start."</th>";
	echo "<th>".Tags."</th>";
	echo "<th>".Title."</th>"; 
	echo "<th>".Image."</th>";
	echo "<th>".Notes."</th>";
	echo "<th></th>";
	echo "<th></th>";
	echo "</tr>";

	// loop through results of database query, displaying them in the table
	while($row = mysql_fetch_array( $result )) {
		
		// echo out the contents of each row into a table
		echo "<tr>";
		echo '<td>' . $row['recno'] . '</td>';
		echo '<td>' . $row['start'] . '</td>';
		echo '<td>' . $row['tags'] . '</td>';
		echo '<td>' . $row['title'] . '</td>';
		echo '<td>' . $row['image'] . '</td>';
		echo '<td>' . $row['notes'] . '</td>';
		echo '<td><a href="edit.php?recno=' . $row['recno'] . '">Edit</a></td>';
		echo '<td><a href="delete.php?recno=' . $row['recno'] . '">Delete</a></td>';
		echo "</tr>"; 
	} 

	// close table>
	echo "</table>";
?>
<p><a href="../../timeline/db/new.php">Add a new record</a></p>

</body>
</html>	

