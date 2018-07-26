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
	
	$kount = mysql_query('SELECT COUNT(1) FROM history_timeline');
	$kntrows = mysql_result($kount, 0, 0);	
	$knt=1;
	
//	echo $kntrows.'<br/>';
//	echo $knt.'<br/>';
	
	
	$foo="}";
	$fee="{";
	$fii=",";
	$faa=",";
	$fuu="[";
	$fyy="]";
	$header01="<?xml version=\"1.0\" encoding=\"UTF-8\"?>";
	$header02="\"id\": \"Bill's Timeline\",";
	$header03="\"title\":\"A History of Bill\",";
	$header04="\"focus_date\":\"2000-01-01\",";
	$header05="\"initial_zoom\":\"45\",";
	$header06="\"color\":\"#82530d\",";
	$header07="\"size_importance\":\"true\",";
	$header08="\"events\":";

//	printf ('\n%s\n' 'I want this on a new line!');
//  print the nice header

	printf (htmlentities($fuu)."<br />");
	printf (htmlentities($fee)."<br />");
	
//	printf (htmlentities($header01)."<br />");
	printf (htmlentities($header02)."<br />");
	printf (htmlentities($header03)."<br />");
	printf (htmlentities($header04)."<br />");
	printf (htmlentities($header05)."<br />");
	printf (htmlentities($header06)."<br />");
	printf (htmlentities($header07)."<br />");
	printf (htmlentities($header08)."<br />");
	
	printf (htmlentities($fuu)."<br />");


	
// loop through results of database query, displaying them in the table

	while($row = mysql_fetch_array( $result )) {
		
		// echo out the contents of each row into a table
		
// model:		$Str = str_replace('\'', '', $Str);

		$id=$row['recno'];
		$title=str_replace('\'', '', $row['title']);
		$start=$row['start'];
		$end=$row['end'];
		$description=str_replace('\'', '', $row['notes']);
		
		$lothreshold="1";
		$hithreshold="60";
		$importance="45";
		
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
		printf("\"id\":\"%8s\",<br>", $id);
		printf("\"title\":\"%8s\",<br>", $title);
		printf("\"startdate\":\"%8s\",<br>", $start);
		printf("\"enddate\":\"%8s\",<br>", $end);
		printf("\"description\":\"%8s\",<br>", $notes);
		
		printf("\"low_threshold\":\"%8s\",<br>", $lothreshold);
		printf("\"high_threshold\":\"%8s\",<br>", $hithreshold);
		printf("\"importance\":\"%8s\",<br>", $importance);
		
		printf("\"image\":\"%8s\",<br>", $image);
		printf("\"link\":\"%8s\",<br>", $link);
		printf("\"color\":\"%8s\",<br>", $color);
		printf("\"textcolor\":\"%8s\",<br>", $textcolor);
		printf("\"tapeImage\":\"%8s\",<br>", $tapeImage);
		printf("\"tapeRepeat\":\"%8s\",<br>", $tapeRepeat);
		printf("\"caption\":\"%8s\",<br>", $caption);
		printf("\"icon\":\"%8s\",<br>", $icon);
		printf("\"classname\":\"%8s\"<br>", $classname);
		printf (htmlentities($foo)."<br />");

//close this xml record:		

// here we go:
	
	$knt++;
	If ($knt <=$kntrows) 
		{
		printf (htmlentities($fii)."<br /><br />");
		}

		
	} 

// print closer
		printf (htmlentities($fyy)."<br />");
		printf (htmlentities($foo)."<br />");
		printf (htmlentities($fyy)."<br />");

// close table

?>

</body>
</html>	

