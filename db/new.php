<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Timeline - Add</title>
<meta name="keywords" content="bill van dyk">

<!-- the following for the benefit of datepicker -->
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>

<script>
	$(function() {
	$(".datepicker").datepicker({dateFormat: "yy-mm-dd"});
  });
</script>

</head>

<body>


<?php

// version 5 -- customize for actual application (movies)
//	$selected=$_POST['category'];
//  Don't forget to use "==" not "=" in while statement below !!! 

//	$selected=$row['category'];
//	Echo "Current selection: ".$selected;
//	Echo "Row: ".$row['category'];
	
	function get_options($selected)
	{
	$tlcat=array( 'Arts'=>'arts', 'Cars'=>'cars', 'Events'=>'events', 'Family'=>'family', 'Friends'=>'friends', 
	'Girls'=>'girls', 'Misc'=>'misc', 'Schats'=>'schats', 'School'=>'school', 'TCC'=>'tcc', 'Travel'=>'travel', 
	'Van Dyks'=>'vandyks', 	'Work'=>'work');
	
	$options='';
	while(list($k,$v)=each($tlcat))
	{
		if($selected==$v)
		{
		$options.='<option value="'.$v.'" selected>'.$k.'</option>';
		}
		else
		{
		$options.='<option value="'.$v.'">'.$k.'</option>';
		}
	}
	return $options;
	}
	
	if(isset($_POST['category']))
		{
		$selected=$_POST['category'];
		echo "This should work:  ".$selected;
		// $selected is the current index for the selected entry: eg. 2 for Canada.
		}
?>



<?php

/* 
 NEW.PHP
 Allows user to create a new entry in the database history_timeline in the history db mysql database
  This actually works, but is incomplete.  Finish it!
 Ceates the new record form
 Since this form is used multiple times in this file, I have made it a function that is easily reusable
*/
 
 function renderForm($start, $title, $image, $link, $notes, $error)
 {
 ?>
 
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
<title>New Record</title>
<link rel="stylesheet" type="text/css" href="../../timeline/css/dev.css">
</head>
<body>

<?php 

// new section to get max recno
include('connect-db.php');

$result = mysql_query("SELECT MAX(recno) FROM history_timeline");
$row = mysql_fetch_row($result);
$newrecno = $row[0]+1;

 // if there are any errors, display them
 if ($error != '')
 {
 echo '<div style="padding:4px; border:1px solid red; color:red;">'.$error.'</div>';
 }
 ?> 
 
 <div class="content">
 
 	<form action="" method="post">
 	<p><strong>ID:</strong><?php echo $newrecno; ?></p>

 	<table>
 	<tr><th>Item</th><th>Content</th></tr>

	<tr><td><strong>Title: *</strong></td><td> <input type="text" name="title" value="<?php echo $title; ?>" />&nbsp; 
		No double quotes in Title - single quotes 'okay'.<br/></td></tr>
		
	<tr><td><strong>Start Date: </strong></td>
	<td><input type="text" name="start" value="<?php echo $start; ?>" class="datepicker"> <br/>
	
	
<!--	<strong>Start: *</strong></td><td> <input type="text" name="start" value="<?php echo $start; ?>" />  -->
	</td></tr>
	
	<tr><td><strong>End Date: </strong></td>
	<td><input type="text" name="end" value="<?php echo $end; ?>" class="datepicker"> <br/>
	</td></tr>
	
<!--	<tr><td><strong>End: *</strong></td><td> <input type="text" name="end" value="<?php echo $end; ?>" /><br/></td></tr> -->
 	<tr><td><strong>Category *</strong></td>
 	
 	<td> 	
 	<?php 		$selected=$category;
	Echo "Current selection: ".$selected;
	?>

 		<select name="category"> 
		<?php echo get_options($selected); ?>
		</select>

	</td>
 	</tr>
	
	<tr><td><strong>Certainty: *</strong></td><td> <input type="text" name="certainty" value="<?php echo $certainty; ?>" /><br/></td></tr>	
	<tr><td><strong>Caption: *</strong></td><td> <input type="text" name="caption" value="<?php echo $caption; ?>" />... 
		of photo.&nbsp; NO strange characters please! No &amp; symbol!<br/></td></tr>
 	<tr><td><strong>Image: *</strong></td><td> <input type="text" name="image" size="60" value="<?php echo $image; ?>" />Single 
		'quotes' in image references acceptable.<br/></td></tr>
 	<tr><td><strong>Link: *</strong></td><td><input type="text" name="link" size="60" value="<?php echo $link; ?>" /><br/></td></tr>
 	<tr><td><strong>Color: *</strong></td><td><input type="text" name="color" value="<?php echo $color; ?>" /><br/></td></tr>
 	<tr><td><strong>Textcolor: *</strong></td><td><input type="text" name="textcolor" value="<?php echo $textcolor; ?>" /><br/></td></tr>
	<tr><td><strong>Icon: *</strong></td><td> <input type="text" name="icon" value="<?php echo $icon; ?>" /><br/></td></tr>
	<tr><td><strong>Classname: *</strong></td><td> <input type="text" name="classname" value="<?php echo $classname; ?>" /><br/></td></tr>
	<tr><td><strong>tags: *</strong></td><td> <input type="text" name="tags" size="60" value="<?php echo $tags; ?>" /><br>
		tags: arts, cars, events, family, friends, girls, locations, misc, objects, 
		schats, school, tcc, vandyks, work</td></tr>
 	<tr><td><strong>Notes: </strong></td><td><textarea name="notes" COLS=60 ROWS=6> <?php echo $notes; ?> </textarea> <br/></td></tr>

	</table>
 	<p>* required - images/filename.jpg </p>
 
	<input type="submit" name="submit" value="Submit">
 	</form> 
 
 </div>
 
 </body>
 </html>
 
 <?php 
 }
 
 // connect to the database
 include('connect-db.php');
 
 // check if the form has been submitted. If it has, start to process the form and save it to the database
 if (isset($_POST['submit']))
 { 
 // get form data, making sure it is valid
 	$title = mysql_real_escape_string(htmlspecialchars($_POST['title']));
 	$start = mysql_real_escape_string(htmlspecialchars($_POST['start']));
 	$end = mysql_real_escape_string(htmlspecialchars($_POST['end']));
 	$category = mysql_real_escape_string(htmlspecialchars($_POST['category']));
 	$certainty = mysql_real_escape_string(htmlspecialchars($_POST['certainty']));
	$caption = mysql_real_escape_string(htmlspecialchars($_POST['caption']));
  	$image = mysql_real_escape_string(htmlspecialchars($_POST['image']));
 	$link = mysql_real_escape_string(htmlspecialchars($_POST['link']));
 	$color = mysql_real_escape_string(htmlspecialchars($_POST['color']));
 	$textcolor = mysql_real_escape_string(htmlspecialchars($_POST['textcolor'])); 	
  	$icon = mysql_real_escape_string(htmlspecialchars($_POST['icon']));
  	$classname = mysql_real_escape_string(htmlspecialchars($_POST['classname']));
  	$tags = mysql_real_escape_string(htmlspecialchars($_POST['tags']));
	$notes = mysql_real_escape_string(htmlspecialchars($_POST['notes']));
	
// but it appears to be correctly adding to the last number ???
// probably the data base itself (mySQL) is configured to auto-increment the field !!

 $eventID=1999;
	
 // check to make sure both fields are entered
 if ($title == '' || $image == '')
 {
 // generate error message
 $error = 'ERROR: Please fill in all required fields!  Title and Image!';
 
 // if either field is blank, display the form again
 renderForm($start, $title, $image, $link, $notes, $error);
 }
 else
 {
 // save the data to the database
 mysql_query("INSERT history_timeline SET eventID='$eventID', 
 	start='$start', 
 	end='$end', 
 	title='$title', 
 	category='$category',
 	certainty='$certainty',
 	caption='$caption',
 	image='$image', 
 	link='$link', 
 	color='$color',
 	textcolor='$textcolor',
 	icon='$icon',
 	classname='$classname',
 	tags='$tags',
 	notes='$notes'")
 or die(mysql_error()); 
 
 // once saved, redirect back to the view page
 header("Location: view.php"); 
 }
 }
 else
 // if the form hasn't been submitted, display the form
 {
 renderForm('','','');
 }
?>