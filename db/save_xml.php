<?php
// output headers so that the file is downloaded rather than displayed
// NOT DONE YET: not even worked on yet.  but the core functions are here

header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=testexport.xml');

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
// or else this will not work.  Turns out the above appears to be correct.


$query = mysql_query("SELECT * FROM history_timeline");

while ($row = mysql_fetch_assoc($query)) {
	foreach($row as $key => $value) {
	print "$key <br />";
	print "$key = $value <br />";
	}
}

?>

