
<?php
// output headers so that the file is downloaded rather than displayed
// NOT DONE YET: not even worked on yet.  but the core functions are here

header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=trytrytry.xml');

// create a file pointer connected to the output stream
$output = fopen('php://output', 'w');

// output the column headings
fputcsv($output, array(
	'RecNo',
	'start',
	'end', 
	'title',
	'description',
	'notes',
	'image',
	'link', 
	'color', 
	'textcolor',
	'tapeImage',
	'tapeRepeat',
	'caption',
	'classname',
	'icon',
	'added',
	'updated'	
		));

// fetch the data
mysql_connect('localhost', 'root', 'Zebr@696');
mysql_select_db('history');
$rows = mysql_query('SELECT 
	recno,
	start,
	end, 
	title,
	description,
	notes,
	image,
	link, 
	color, 
	textcolor,
	tapeImage,
	tapeRepeat,
	caption,
	classname,
	icon,
	added,
	updated
	FROM history_timeline'); 

// $rows = mysql_query('Select title, lname, fname FROM model');
// loop over the rows, outputting them

// the following worked but didn't put all the information in -like fields
while ($row = mysql_fetch_assoc($rows)) fputcsv($output, $row);

// so we attempt
// while ($row = mysql_fetch_assoc($rows)) fputcsv($output, $row);
// or

 $fp1 = fopen( 'trytrytry.xml', 'w' );
	// not needed:   fwrite( $fp1,"RETSKU\tProduct Title\tDetailed Description\tProduct Condition\tSelling Price\tAvailability\tProduct URL\tImage URL\tManufacturer Part Number\tManufacturer Name\tCategorization\tGender\tsize\tColor\n");
  	//	retrieve records from database and write to file
  	
  $result = mysqli_query($con,"SELECT * FROM `history_timeline` ");
  while($row = mysqli_fetch_array($result))
  {
     fwrite($fp1,$row[`start`]."\t"
     ."hellwoh"
     .$row[`end`]."\t"
     .  $row[`title`]."\t"
     .$row[`description`]."\t"
     . $row[`notes`]."\t"
     .$row[`image`]."\t"
     .$row[`link`]."\t"
     . $row[`color`]."\t"
     .$row[`textcolor`]."\t"
     .$row[`tapeImage`]."\t"
     .$row[`tapeRepeat`]."\t"
     .$row[`caption`]."\t"
     .$row[`classname`]."\t"
     .$row[`icon`]."\t"
     .$row[`added`]."\t"
     .$row[`updated`]."\n");
  } 
  fclose( $fp1 );

/*
$query = mysql_query("SELECT * FROM history_timeline");

while ($row = mysql_fetch_assoc($query)) {
	foreach($row as $key => $value) {
	print "$key <br />";
	print "$key = $value <br />";
	}
}
*/

?>

