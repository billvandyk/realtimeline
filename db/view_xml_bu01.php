<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
	<title>Create XML File</title>
</head>
<body>

<?php
/* 
	VIEW_XML.PHP
	Displays all data from 'history_timeline' table
	in XML format, as preparation for a file to create an xml version of data base
	
	This appears to generate a relatively valid xml file in the browser.
	But it allows apostrophes, which must be excised.
	Working on that.
*/

	// connect to the database
	include('connect-db.php');

	// get results from database
	$result = mysql_query("SELECT * FROM history_timeline") 
		or die(mysql_error());  
		
	$foo="<data>";
	$fee="<event";
	$fii="</event>";
	$faa=">";
	$fuu="</data>";
	$header01="<?xml version=\"1.0\" encoding=\"UTF-8\"?>";
	$header02="<!-- this is a comment in xml -->";
	$header03="<!-- this is from the database -->";


	printf (htmlentities($header01)."<br />");
	printf (htmlentities($header02)."<br />");
	printf (htmlentities($header03)."<br />");
	printf (htmlentities($foo)."<br />");
	
//	printf ('\n%s\n' 'I want this on a new line!');
	
// loop through results of database query, displaying them in the table

	while($row = mysql_fetch_array( $result )) {
		
		// echo out the contents of each row into a table
		$title=addslashes($row['title']);
		$start=$row['start'];
		$end=$row['end'];
		$description=$row['description'];
		$image=$row['image'];
		$link=$row['link'];
		$color=$row['color'];
		$textcolor=$row['textcolor'];
		$tapeImage=$row['tapeImage'];
		$tapeRepeat=$row['tapeRepeat'];
		$caption=$row['caption'];																		
		$classname=$row['classname'];
		$icon=$row['icon'];				
		$notes=$row['notes'];	
		$added=$row['added'];
		
// 	update may be a forbidden field name
//	$update=$row['update'];

//		echo "pie ".$row['recno']."\r\n";

//		printf("%s<br>",$fee); // String
		printf (htmlentities($fee)."<br />");

		printf("title=\"%8s\"<br>", $title);
		printf("start=\"%8s\"<br>", $start);
		printf("end=\"%8s\"<br>", $end);
		printf("description=\"%8s\"<br>", $description);
		printf("image=\"%8s\"<br>", $image);
		printf("link=\"%8s\"<br>", $link);
		printf("color=\"%8s\"<br>", $color);
		printf("textcolor=\"%8s\"<br>", $textcolor);
		printf("tapeImage=\"%8s\"<br>", $tapeImage);
		printf("tapeRepeat=\"%8s\"<br>", $tapeRepeat);
		printf("caption=\"%8s\"<br>", $caption);
		printf("icon=\"%8s\"<br>", $icon);
		printf("classname=\"%8s\" %8s <br>", $classname, $faa);
		printf("%8s<br>", $notes);
		
//close this xml record:		

		printf (htmlentities($fii)."<br /><br />");
		
	} 

// print closer

		printf (htmlentities($fuu)."<br /><br />");

// close table

?>

</body>
</html>	

