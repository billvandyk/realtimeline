<?php

//  version 5 -- customize for actual application (movies)
//	$selected=$_POST['category'];
//  Don't forget to use "==" not "=" in while statement below !!! 

//	$selected=$row['category'];
//	Echo "Current selection: ".$selected;
//	Echo "Row: ".$row['category'];

// in the following function the first reference is the displayed reference: 'Family'=>'Fam',
?>

<!-- the following for the benefit of datepicker -->
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
	
	<script>
	$(function() {
	$(".datepicker").datepicker({dateFormat: "yy-mm-dd"});
	  });
	</script>

<?php	
	function get_options($selected)
	{
	$tlcat=array( 'Arts'=>'Arts', 'Cars'=>'Cars', 'Events'=>'Events', 'Family'=>'Family', 'Friends'=>'Friends', 
	'Girls'=>'Girls',  'Locations'=>'Locations', 'Objects'=>'Objects', 'Other'=>'Other', 'Schats'=>'Schats', 
	'School'=>'School', 'TCC'=>'TCC', 'Travel'=>'Travel', 'Van Dyks'=>'Vandyks', 'Work'=>'work');
	
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
		echo "This should work - selected:  ".$selected;
		// $selected is the current index for the selected entry: eg. 2 for Canada.
		}
?>


<?php

/* 
 EDIT.PHP
 Allows user to edit specific entry in database
 Developers prefer POST method to GET !!!
 
 See the php_preselection.... file in this folder for a possible
 solution to the preselected option problem.
*/

 // creates the edit record form
 // since this form is used multiple times in this file, I have made it a function that is easily reusable
 
 function renderForm($recno, $start, $end, $category, $title, $caption, $certainty, $image, $link, $color, $textcolor, $icon, $classname, $tags, $notes, $error)
 {
 ?>

<!DOCTYPE HTML>
 <html>
 <head>
 <title>Edit Timeline Database Record</title>
 <link href="../css/database.css" rel="stylesheet" type="text/css">
 <link rel="stylesheet" type="text/css" href="../css/dev.css">

 </head>
 <body>

 <?php 
 // if there are any errors, display them
 if ($error != '')
 {
 echo '<div style="padding:4px; border:1px solid red; color:red;">'.$error.'</div>';
 }
 ?> 
 
 <div class="content">
 
 <form action="" method="post">
 <input type="hidden" name="recno" value="<?php echo $recno; ?>"/>
  
<?php
$selected=$category;
?>

 	<p><strong>ID:</strong> <?php echo $recno; ?></p>
 	
 	<table>
	
 <!-- this is correct: <tr><th>  (not <th><tr>) !  -->

 	<tr><th>Item</th><th>Content</th></tr>

<!-- 	<tr><td><strong>start: *</strong></td><td> <input type="text" name="start" value="<?php echo $start; ?>"/><br/></td></tr>
-->	
 	
	<tr><td><strong>Start Date: </strong></td><td><input type="text" name="start" value="<?php echo $start; ?>" class="datepicker"> <br/></td></tr>
<br/>


 	
<!-- 	
 	<tr><td><strong>end: </strong></td> <td><input type="text" name="end" value="<?php echo $end; ?>"/><br/></td></tr>
 	-->
 	
<tr><td><strong>end: </strong></td> <td><input type="text" name="end" value="<?php echo $end; ?>" class="datepicker"><br/></td></tr>

 	
 	<tr>
 	<td><strong>Category *</strong>
 	</td>
 	<td> 	
 	
<?php 		$selected=$category;
	Echo "Current selection: ".$selected;
	?>

 		<select name="category"> 
		<?php echo get_options($selected); ?>
		</select>

	</td>
 	</tr>
 	
 	<?php
 		switch ($category) {
		case "Arts":
 			echo "music_orange.png";
 			$icon="music_orange.png";
 			break;
 		case "Cars":
			echo "circle_black.png";
 			$icon="circle_black.png";
 			break;
 		case "Events":
 			echo "sym_goldstar.png";
 			$icon="sym_goldstar.png";
 			break;
 		case "Family":
			echo "sym_goldstar.png";
 			$icon="triangle_orange.png";
 			break;
 		case "Friends":
 			echo "circle_green.png";
 			$icon="circle_green.png";
 			break;
 		case "Girls":
 			echo "triangle_purple.png";
 			$icon="triangle_purple.png";
 			break;
		case "Locations":
 			echo "triangle_yellow.png";
 			$icon="triangle_yellow.png";
 			break;
 		case "Objects":
 			echo "flag_blue.png";
 			$icon="flag_blue.png";
		case "Other":
 			echo "circle_white.png";
 			$icon="circle_white.png";
 			break;
 		case "Schats":
 			echo "sym_card_spade.png";
 			$icon="sym_card_spade.png";
 			break;
		case "School":
 			echo "circle_blue.png";
 			$icon="circle_blue.png";
 			break;
		case "TCC":
 			echo "square_blue.png";
 			$icon="square_blue.png";
 			break;
		case "Travel":
 			echo "sym_location.png";
 			$icon="sym_location.png";
 			break;
 		case "Vandyks":
 			echo "sym_card_club.png";
 			$icon="sym_card_club.png";
		case "Work":
 			echo "triangle_gray.png";
 			$icon="triangle_gray.png";
 			break;
		default:
			echo "circle_white.png";
			$icon="circle_white.png";
			}
			?>
 		
<!--  		'Family'=>'Family', 'Cars'=>'Cars', 'Girls'=>'Girls', 'School'=>'School', 'TCC'=>'TCC',
	'Friends'=>'Friends', 'Travel'=>'Travel', 'Arts'=>'Arts', 'Jobs'=>'Jobs', 'Misc'=>'Misc'); -->

 		
 	
	<tr><td><strong>title: *</strong></td> <td><input type="text" name="title" size="60" value="<?php echo $title; ?>"/>No 
		double quotes in Title - single quotes 'okay'.<br/></td></tr>
	<tr><td><strong>caption: </strong></td> <td><input type="text" name="caption" size="60" value="<?php echo $caption; ?>"/> <br/></td></tr>
	<tr><td><strong>certainty: *</strong></td> <td><input type="text" name="certainty" size="5" value="<?php echo $certainty; ?>"/><br/></td></tr>	
	<tr><td><strong>image: </strong></td><td><input type="text" name="image" size="60" value="<?php echo $image; ?>"/>&nbsp; 
		Always /<br/> </td></tr>
	<tr><td><strong>link: </strong></td> <td><input type="text" name="link" size="60" value="<?php echo $link; ?>"/><br/></td></tr>
	<tr><td><strong>color: </strong></td> <td><input type="text" name="color" size="20" value="<?php echo $color; ?>"/><br/></td></tr>
	<tr><td><strong>textcolor: </strong></td> <td><input type="text" name="textcolor" size="20" value="<?php echo $textcolor; ?>"/><br/></td></tr>
 	<tr><td><strong>icon: </strong></td> <td><input type="text" name="icon" size="40" value="<?php echo $icon; ?>"/><br/></td></tr> 
	<tr><td><strong>classname: </strong></td> <td><input type="text" name="classname" size="20" value="<?php echo $classname; ?>"/><br/></td></tr>
	<tr><td><strong>tags: </strong></td> <td><input type="text" name="tags" size="60" value="<?php echo $tags; ?>"/><br>
		tags: family, friends, girls, locations, objects, other, schats, school, tcc, vandyks, work<br/></td></tr>
  	<tr><td><strong>notes: </strong></td> <td><textarea name="notes" COLS=60 ROWS=6><?php echo $notes;?></textarea></td></tr>
	</table> 
	
 <p>* Required</p>
 
 <input type="submit" name="submit" value="Submit">
 </form> 
 
 </div>
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
 if (is_numeric($_POST['recno']))
 {
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
 $color = mysql_real_escape_string(htmlspecialchars($_POST['color'])); 
 $textcolor = mysql_real_escape_string(htmlspecialchars($_POST['textcolor']));  
 $icon = mysql_real_escape_string(htmlspecialchars($_POST['icon']));
 $classname = mysql_real_escape_string(htmlspecialchars($_POST['classname']));
 $tags = mysql_real_escape_string(htmlspecialchars($_POST['tags']));
 $notes = mysql_real_escape_string(htmlspecialchars($_POST['notes']));
 
 // check that firstname/lastname fields are both filled in
 if ($title == '' || $notes == '')
 {
 // generate error message
 $error = 'ERROR: Please fill in all required fields!';
 
 //error, display form
 renderForm($recno, $start, $end, $category, $title, $caption, $image, $link, $color, $textcolor, $icon,  $classname, $tags, $notes, $error);
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
 	color='$color',
 	textcolor='$textcolor',
 	icon='$icon',
 	classname='$classname',
 	tags='$tags',
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
 	color='$color',
 	textcolor='$textcolor',
 	icon='$icon',
  	classname='$classname',
	tags='$tags',
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
//  $selected = $row['category'];
 // why was this $category = $row['$category']; ??
 $title = $row['title'];
 $caption = $row['caption'];
 $certainty = $row['certainty'];
 $image = $row['image'];
 $link = $row['link'];
 $color = $row['color'];
 $textcolor = $row['textcolor'];
 $icon = $row['icon'];
 $classname = $row['classname'];
 $tags = $row['tags'];
 $notes = $row['notes'];
 
 // show form
 renderForm($recno, $start, $end, $category, $title, $caption, $certainty, $image, $link, $color, $textcolor, $icon, $classname, $tags, $notes, '');
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