<!DOCTYPE HTML>
 <html>
 <head>
 <title>Edit Timeline Database Record</title>
 <link href="../../css/database.css" rel="stylesheet" type="text/css">
 <link rel="stylesheet" type="text/css" href="../../css/dev.css">

 </head>
 <body>

  <?php
  // connect to the database
 include('connect-db.php');
 
 // get form data, making sure it is valid
 $recno = $_POST['recno'];
 $start = $_POST['start'];
 $end = $_POST['end'];
 $category = $_POST['category'];
 
 
 
 
// does this work from down here?
 $selected=$_POST['category'];

 $title = mysql_real_escape_string(htmlspecialchars($_POST['title']));
 $caption = mysql_real_escape_string(htmlspecialchars($_POST['caption']));
 $certainty = mysql_real_escape_string(htmlspecialchars($_POST['certainty']));
 $image = mysql_real_escape_string(htmlspecialchars($_POST['image']));
 $link = mysql_real_escape_string(htmlspecialchars($_POST['link'])); 
 $icon = mysql_real_escape_string(htmlspecialchars($_POST['icon']));
 $classname = mysql_real_escape_string(htmlspecialchars($_POST['classname']));
 $cat01 = mysql_real_escape_string(htmlspecialchars($_POST['cat01']));
 $notes = mysql_real_escape_string(htmlspecialchars($_POST['notes']));
 
 // check that firstname/lastname fields are both filled in
 if ($title == '' || $notes == '')
 {
 // generate error message
 $error = 'ERROR: Please fill in all required fields!';
 
 //error, display form
 renderForm($recno, $start, $end, $category, $title, $caption, $image, $link, $icon,  $classname, $cat01, $notes, $error);
 }
 else
 {
 // save the data to the database
 
 // to avoid bizarre "1969-12-31" error, do NOT insert end date if it is blank

if ($end !=''){ 
 mysql_query("UPDATE history_timeline 
 	SET start='$start', 
 	end='$end',
 	category='$category',
 	title='$title', 
  	caption='$caption',
  	certainty='$certainty',
	image='$image', 
 	link='$link',
 	icon='$icon',
 	classname='$classname',
 	cat01='$cat01',
 	notes='$notes'
 	WHERE recno='$recno'")
 or die(mysql_error()); 
	}else{ 
 mysql_query("UPDATE history_timeline 
 	SET start='$start', 
 	end='$end',
 	category='$category',
 	title='$title', 
  	caption='$caption',
  	certainty='$certainty',
	image='$image', 
 	link='$link',
 	icon='$icon',
  	classname='$classname',
	cat01='$cat01',
 	notes='$notes'
 	WHERE recno='$recno'")
 or die(mysql_error()); 
 }
	
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
 
 // get the 'id' value from the URL (if it exists), making sure that it is valid (checkng that it is numeric/larger than 0)
 if (isset($_GET['recno']) && is_numeric($_GET['recno']) && $_GET['recno'] > 0)
 {
 // query db
 $recno = $_GET['recno'];
 $result = mysql_query("SELECT * FROM history_timeline WHERE recno=$recno")
 or die(mysql_error()); 
 $row = mysql_fetch_array($result);
 
 // check that the 'id' matches up with a row in the database
 if($row)
 {
 
 // get data from db
 $start = $row['start'];
 $end = $row['end'];
 $category = $row['category'];
 $selected = $row['category'];
 // why was this $category = $row['$category']; ??
 $title = $row['title'];
 $caption = $row['caption'];
 $certainty = $row['certainty'];
 $image = $row['image'];
 $link = $row['link'];
 $icon = $row['icon'];
 $classname = $row['classname'];
 $cat01 = $row['cat01'];
 $notes = $row['notes'];
 
 // show form
 renderForm($recno, $start, $end, $category, $title, $caption, $certainty, $image, $link, $icon, $classname, $cat01, $notes, '');
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