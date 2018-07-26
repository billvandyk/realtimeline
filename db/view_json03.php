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
	$header09="\"image_lane_height\":120,";
	$header06="\"color\":\"#82530d\",";
	$header07="\"size_importance\":\"true\",";
	$header08="\"events\":";
	
//	$tail01="\"tags\":\"{\"vandyks\",\"tcc\":2,\"family\":2";
//	$tail02="{\"title\":\"vandyks\",\"icon\":\"triangle_orange.png\"},"
	
	$tail01="\"tags\":$fee\"arts\":2,\"cars\":2,\"events\":2,\"family\":2,\"friends\":2,\"girls\":2,\"locations\":2,\"objects\":2,\"other\":2,\"schats\":2,\"school\":2,\"tcc\":2,\"travel\":2,\"vandyks\":2,\"work\":2$foo,";
	$tail02="\"legend\":$fuu";

	$tail03="$fee\"title\":\"arts\",\"icon\":\"music_orange.png\"$foo,";
	$tail04="$fee\"title\":\"cars\",\"icon\":\"circle_black.png\"$foo,";
	$tail05="$fee\"title\":\"events\",\"icon\":\"sym_goldstar.png\"$foo,";
	$tail06="$fee\"title\":\"family\",\"icon\":\"triangle_orange.png\"$foo,";
	$tail07="$fee\"title\":\"friends\",\"icon\":\"circle_green.png\"$foo,";
	$tail08="$fee\"title\":\"girls\",\"icon\":\"triangle_purple.png\"$foo,";
	$tail09="$fee\"title\":\"locations\",\"icon\":\"triangle_yellow.png\"$foo,";
	$tail09b="$fee\"title\":\"objects\",\"icon\":\"flag_blue.png\"$foo,";	
	$tail10="$fee\"title\":\"other\",\"icon\":\"circle_white.png\"$foo,";
	$tail11="$fee\"title\":\"schats\",\"icon\":\"sym_card_spade.png\"$foo,";
	$tail12="$fee\"title\":\"school\",\"icon\":\"circle_blue.png\"$foo,";
	$tail13="$fee\"title\":\"tcc\",\"icon\":\"square_blue.png\"$foo,";	
	$tail14="$fee\"title\":\"travel\",\"icon\":\"sym_location.png\"$foo,";
	$tail15="$fee\"title\":\"vandyks\",\"icon\":\"sym_card_club.png\"$foo,";
	$tail16="$fee\"title\":\"work\",\"icon\":\"triangle_gray.png\"$foo";

	printf (htmlentities($fuu)."<br />");
	printf (htmlentities($fee)."<br />");
	
//	printf (htmlentities($header01)."<br />");
	printf (htmlentities($header02)."<br />");
	printf (htmlentities($header03)."<br />");
	printf (htmlentities($header04)."<br />");
	printf (htmlentities($header05)."<br />");
	printf (htmlentities($header09)."<br />");
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
		$tags=$row['tags'];
		$icon=$row['icon'];				
		$notes=str_replace('\'', '', $row['notes']);	
		$added=$row['added'];
		
// 	update may be a forbidden field name
//	$update=$row['update'];

//		echo "pie ".$row['recno']."\r\n";

//		printf("%s<br>",$fee); // String
		printf (htmlentities($fee)."<br />");
// the %-8s in the next line left-justifies the string; without it the tagging and linking doesn't work on timeglider.		
		printf("\"id\":\"%-8s\",<br>", str_replace(" ","",$id));
		printf("\"title\":\"%8s\",<br>", $title);
		printf("\"startdate\":\"%8s\",<br>", $start);
		printf("\"enddate\":\"%8s\",<br>", $end);
		printf("\"description\":\"%8s\",<br>", htmlentities($notes));
		
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
		printf("\"classname\":\"%8s\",<br>", $classname);
		printf("\"tags\":\"%-8s\"<br>", $tags);		
		printf (htmlentities($foo)."<br />");

//close this xml record:		

// here we go:
	
	$knt++;
	If ($knt <=$kntrows) 
		{
		printf (htmlentities($fii)."<br /><br />");
		}

		
	} 

	printf (htmlentities($fyy));
	printf (htmlentities($fii)."<br>");
	
//  trying it out:

	printf (htmlentities($tail01)."<br />");
	printf (htmlentities($tail02)."<br />");
	printf (htmlentities($tail03)."<br />");
	printf (htmlentities($tail04)."<br />");
	printf (htmlentities($tail05)."<br />");
	printf (htmlentities($tail06)."<br />");
	printf (htmlentities($tail07)."<br />");
	printf (htmlentities($tail08)."<br />");
	printf (htmlentities($tail09)."<br />");
	printf (htmlentities($tail09b)."<br />");
	printf (htmlentities($tail10)."<br />");	
	printf (htmlentities($tail11)."<br />");	
	printf (htmlentities($tail12)."<br />");	
	printf (htmlentities($tail13)."<br />");
	printf (htmlentities($tail14)."<br />");
	printf (htmlentities($tail15)."<br />");
	printf (htmlentities($tail16)."<br />");		

// print closer
		printf (htmlentities($fyy)."<br />");
		printf (htmlentities($foo)."<br />");
		printf (htmlentities($fyy)."<br />");


// close table

?>

</body>
</html>	

