<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
	<title>Create JSON File</title>
</head>
<body>

<?php

	// connect to the database
	include('connect-db.php');

	// get results from database
	$result = mysql_query("SELECT * FROM history_timeline") 
		or die(mysql_error());  
		
	$foo="}";
	$fee="{";
	$fii=",";
	$faa=",";
	$fuu="[";
	$fyy="]";
	$header01="<?xml version=\"1.0\" encoding=\"UTF-8\"?>";
	$header02="<!-- this is a comment in xml -->";
	$header03="<!-- this is from the database -->";


	printf (htmlentities($header01)."<br />");
	printf (htmlentities($header02)."<br />");
	printf (htmlentities($header03)."<br />");
	
//	printf ('\n%s\n' 'I want this on a new line!');
	
// loop through results of database query, displaying them in the table


	while($row = mysql_fetch_array( $result )) {
		
		// echo out the contents of each row into a table
		
// model:		$Str = str_replace('\'', '', $Str);
		
		$title=str_replace('\'', '', $row['title']);
		$start=$row['start'];
		$end=$row['end'];
		$description=str_replace('\'', '', $row['notes']);
		$image=$row['image'];
		$link=$row['link'];
		$color=$row['color'];
		$textcolor=$row['textcolor'];
		$tapeImage=$row['tapeImage'];
		$tapeRepeat=$row['tapeRepeat'];
		$caption=str_replace('\'', '', $row['caption']);																		
		$classname=$row['classname'];
		$icon=$row['icon'];				
		$notes=str_replace('\'', '', $row['notes']);	
		$added=$row['added'];
		
// 	update may be a forbidden field name
//	$update=$row['update'];

//		echo "pie ".$row['recno']."\r\n";

//		printf("%s<br>",$fee); // String
		printf (htmlentities($fee)."<br />");
		printf("\"title\":\"%8s\",<br>", $title);
		printf("start=\"%8s\",<br>", $start);
		printf("end=\"%8s\",<br>", $end);
		printf("description=\"%8s\",<br>", $notes);
		printf("image=\"%8s\",<br>", $image);
		printf("link=\"%8s\",<br>", $link);
		printf("color=\"%8s\",<br>", $color);
		printf("textcolor=\"%8s\",<br>", $textcolor);
		printf("tapeImage=\"%8s\",<br>", $tapeImage);
		printf("tapeRepeat=\"%8s\",<br>", $tapeRepeat);
		printf("caption=\"%8s\",<br>", $caption);
		printf("icon=\"%8s\",<br>", $icon);
		printf("classname=\"%8s\" %8s <br>", $classname, $foo);
		
//close this xml record:		

		printf (htmlentities($fii)."<br /><br />");
		
	} 

// print closer
		printf (htmlentities($fyy)."<br /><br />");
		printf (htmlentities($foo)."<br /><br />");
		printf (htmlentities($fyy)."<br /><br />");

// close table

?>

</body>
</html>	

