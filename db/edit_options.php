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
 function renderForm($recno, $start, $end, $category, $title, $caption, $certainty, $image, $link, $icon, $classname, $cat01, $notes, $error)
 {
 ?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
 <html>
 <head>
 <title>Edit Record</title>
 <link rel="stylesheet" type="text/css" href="../../timeline/css/dev.css">
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
 
 
 <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">   
    <select name="category">
        <?php
            if (isset($_POST['category'])) {
                if($_POST["category"] == "January"){
                    echo '<option value="January" selected="selected">January</option><option value="February">February</option>';
                }
                elseif($_POST["category"] == "February"){
                    echo '<option value="January">January</option><option value="February" selected="selected">February</option>';
                }
            }
            else{
                echo '<option value="January">January</option><option value="February">February</option>';
            }
        ?>
    </select>
    <input name="submit_button" type="submit" value="Search Month">
</form>
 
 
 <!-- everything after this is old... 
 
 <form action="" method="post">
 <input type="hidden" name="recno" value="<?php echo $recno; ?>"/>
  
 	<p><strong>ID:</strong> <?php echo $recno; ?></p>
 	<table>
 	<tr><th>Item</th><th>Content</th></tr>
	<tr><td><strong>start: *</strong></td><td> <input type="text" name="start" value="<?php echo $start; ?>"/><br/></td></tr>
 	<tr><td><strong>end: </strong></td> <td><input type="text" name="end" value="<?php echo $end; ?>"/><br/></td></tr>
 	
 	<tr><td><strong>category *</strong>
 	</td>
 	
 	

 	<td>
 	<!-- 
 	<p>Category:&nbsp; 
 		<select size="20" name="category" value="<?php echo $category; ?>" /><br/>
		<option selected value="BVD-Family">Family</option>
		<option value="BVD-Cars">Cars</option>
		<option value="BVD-Girls">Girls</option>
		<option value="BVD-School">School</option>
		<option value="BVD-TCC">TCC</option>
		<option value="BVD-Friends">Friends</option>
		<option value="BVD-Travel">Travel</option>
		<option value="BVD-Arts">Arts - Plays - Music</option>
		<option value="BVD-Work">Jobs - Employment</option>
		<option value="BVD-MISC">Miscellaneous</option>
		</select>
	<br/>
	-->

<!-- 	<option value="<?php echo $category; ?>" <?php if ($category== $  

<select name="category">
<option value="">------------------------------</option>
<?php 
foreach($cat as $key =>value):
echo '<option value="'.$key.'">'.$value.'</option>';  // close your tags!
endforeach;
?>
</select>
<?php
$options='';
foreach($cat as $code=">$name){
$options .='<option value=\"$code\">$name</option>\n";
}
$select = "<select name=\"category\">\n$options\n</select>";
?>

<?php
 	$cat=array(
 	"BVD-Cars" = > 'Cars',
 	"BVD-Girls" = > 'Girls',
 	"BVD-School" = > 'School',
 	"BVD-TCC" = > 'TCC',
 	"BVD-Friends" = > 'Friends',
 	"BVD-Travel" = > 'Travel',
 	"BVD-Arts" = > 'Arts',
 	"BVD-Music" = > 'Music',
 	"BVD-Work" = > 'Work',
 	"BVD-Misc" = > 'Misc'
 	);

foreach($cat as $short_code => $description) {
?>

<option size="20" name="category" value="<?php echo $short_code; ?>"><?php echo $description; ?>
	</option>
	<?php
	}
	?>
	
	</td>
 	</tr>
 	
	<tr><td><strong>title: *</strong></td> <td><input type="text" name="title" size="60" value="<?php echo $title; ?>"/><br/></td></tr>
	<tr><td><strong>caption: *</strong></td> <td><input type="text" name="caption" size="60" value="<?php echo $caption; ?>"/><br/></td></tr>
	<tr><td><strong>certainty: *</strong></td> <td><input type="text" name="certainty" size="60" value="<?php echo $certainty; ?>"/><br/></td></tr>	
	<tr><td><strong>image: </strong></td><td><input type="text" name="image" size="60" value="<?php echo $image; ?>"/><br/> </td></tr>
	<tr><td><strong>link: </strong></td> <td><input type="text" name="link" size="60" value="<?php echo $link; ?>"/><br/></td></tr>
	<tr><td><strong>icon: </strong></td> <td><input type="text" name="icon" size="40" value="<?php echo $icon; ?>"/><br/></td></tr>
	<tr><td><strong>classname: </strong></td> <td><input type="text" name="classname" size="20" value="<?php echo $classname; ?>"/><br/></td></tr>
	<tr><td><strong>cat01: </strong></td> <td><input type="text" name="cat01" size="20" value="<?php echo $cat01; ?>"/><br/></td></tr>
  	<tr><td><strong>notes: </strong></td> <td><textarea name="notes" COLS=60 ROWS=6><?php echo $notes;?></textarea></td></tr>
	</table> 
	
 <p>* Required</p>
 
 <input type="submit" name="submit" value="Submit">
 </form> 
 
 -->

 
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
 $start = $row['start'];
 $end = $row['end'];
 $category = $row['$category'];
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