<?php
/* 
 edit_record.PHP
 Allows user to edit specific entry in database.
 Can be called from view.php
*/

 // creates the edit record form
 // since this form is used multiple times in this file, I have made it a function that is easily reusable
 function renderForm($recno, $start, $end, $title, $description, $image, $link, $caption, $notes, $updated, $error)
 {
 ?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
 <html>
 <head>
 <title>Edit Record</title>
 </head>
 <body>

 <?php 
 // if there are any errors, display them
 if ($error != '')
 {
 echo '<div style="padding:4px; border:1px solid red; color:red;">'.$error.'</div>';
 }
 ?> 
 
 <form action="" method="post">
 <input type="hidden" name="recno" value="<?php echo $recno; ?>"/>
 <div>
 <p><strong>ID:</strong> <?php echo $recno; ?></p>
 <strong>title: *</strong> <input type="text" name="title" value="<?php echo $title; ?>"/><br/>
 <strong>notes: *</strong> <input type="text" name="notes" value="<?php echo $notes; ?>"/><br/>
 $recno, $start, $end, $title, $description, $image, $link, $caption, $notes, $updated, $error
 
 <p>* Required</p>
 <input type="submit" name="submit" value="Submit">
 </div>
 </form> 
 </body>
 </html>
 
 <?php
 }

 // connect to the database
 include('connect-db.php');
 
 // check if the form has been submitted. If it has, process the form and save it to the database
 if (isset($_POST['submit']))
 { 
 // confirm that the 'id' value is a valid integer before getting the form data
 if (is_numeric($_POST['id']))
 {
 // get form data, making sure it is valid
 $recno = $_POST['id'];
 $title = mysql_real_escape_string(htmlspecialchars($_POST['title']));
 $notes = mysql_real_escape_string(htmlspecialchars($_POST['notes']));
 
 // check that firstname/lastname fields are both filled in
 if ($title == '' || $notes == '')
 {
 // generate error message
 $error = 'ERROR: Please fill in all required fields!';
 
 //error, display form
 renderForm($recno, $title, $notes, $error);
 }
 else
 {
 // save the data to the database
 mysql_query("UPDATE history_timeline SET title='$title', notes='$notes' WHERE recno='$recno'")
 or die(mysql_error()); 
 
 // once saved, redirect back to the view page
 header("Location: view.php"); 
 }
 }
 else
 {
 // if the 'id' isn't valid, display an error
 echo 'Error!';
 }
 }
 else
 // if the form hasn't been submitted, get the data from the db and display the form
 
 {
  // get the 'id' value from the URL (if it exists), making sure that it is valid (checing that it is numeric/larger than 0)
 if (isset($_GET['recno']) && is_numeric($_GET['recno']) && $_GET['recno'] > 0)
 {
 
 // query db
 $recno = $_GET['recno'];
 $result = mysql_query("SELECT * FROM history_timeline WHERE recno=$recno")
 or die(mysql_error()); 
 $row = mysql_fetch_array($result);
 
 // check that the 'id' matches up with a row in the databse
 if($row)
 
 {
  // get data from db
 $title = $row['title'];
 $notes = $row['notes'];
 
 // show form
 renderForm($recno, $title, $notes, '');
 }
 else
 // if no match, display result
 {
 echo "No results!";
 }
 }
 else
 // if the 'id' in the URL isn't valid, or if there is no 'id' value, display an error
 {
 echo 'Error!';
 }
 }
?>