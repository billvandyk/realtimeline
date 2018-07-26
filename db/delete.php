<?php
/* 
 DELETE.PHP
 Deletes a specific entry from the 'timeline_history' table
*/

 // connect to the database
 include('connect-db.php');
 
 // check if the 'recno' variable is set in URL, and check that it is valid
 if (isset($_GET['recno']) && is_numeric($_GET['recno']))
 {
 // get recno value
 $recno = $_GET['recno'];
 
 // delete the entry
 $result = mysql_query("DELETE FROM history_timeline WHERE recno=$recno")
 or die(mysql_error()); 
 
 // redirect back to the view page
 header("Location: view.php");
 }
 else
 // if recno isn't set, or isn't valid, redirect back to view page
 {
 header("Location: view.php");
 }
 
?>