<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Timeline Event DB Search</title>
<meta name="keywords" content="bill van dyk">
<link rel="stylesheet" type="text/css" href="../../timeline/css/dev.css">

</head>

<body>

<?php error_reporting (E_ALL ^ E_NOTICE);  ?>

<div class="content">
<h2>Reference</h2>
<h1>Edit</h1>
</div>

<?php include('connect-db.php');?>

<div id="navAlpha">
	<a href="http://www.chromehorse.net">
	<img border="0" src="../../images/2009/212w/feet.jpg" width="212" height="94"></a>
	<?php include("menu.php"); ?>
	<br>
	</div>
	
<div class="content">
	<br>
	<br>
	<form name="form" action="search.php" method="get">
	<input type="text" size="60 "name="q" />
	<input type="submit" name="Submit" value="Search" />
	</form>
	
<?php

  // Get the search variable from URL

  $var = @$_GET['q'] ;
  $trimmed = trim($var); //trim whitespace from the stored variable

// rows to return
$limit=10; 

// check for an empty string and display a message.
if ($trimmed == "")
  {
  echo "<p>Please enter a search...</p>";
  exit;
  }

// check for a search parameter
if (!isset($var))
  {
  echo "<p>We dont seem to have a search parameter!</p>";
  exit;
  }

//connect to your database ** EDIT REQUIRED HERE **
// mysql_connect("localhost","root","Zebr@696"); //(host, username, password)

//specify database ** EDIT REQUIRED HERE **
// mysql_select_db("history") or die("Unable to select database"); //select which database we're using

// Build SQL Query  
$query = "select * from history_timeline where title like \"%$trimmed%\" 
	OR notes like \"%$trimmed%\"
	 order by title"; 

	$numresults=mysql_query($query);
 	$numrows=mysql_num_rows($numresults);

// If we have no results, offer a google search as an alternative

if ($numrows == 0)
  {
  echo "<h4>Results: </h4>";
  echo "<p>Sorry, your search: &quot;" . $trimmed . "&quot; returned zero results.</p>";
  }

// next determine if s has been passed to script, if not use 0

// var_dump($_GET['s']);
$s = intval($_GET['s']);

// var_dump($s);
  if (empty($s)) {
  $s=0;
  }
// var_dump($s);

// get results
  $query .= " limit $s,$limit";
  
  $result = mysql_query($query) or die("Couldn't execute query");

// display what the person searched for
echo "<p>You searched for: &quot;" . $var . "&quot;</p>";

// begin to show results set
echo "<h4>Results: </h4>";
$count = 1 + $s ;

// now you can display the results returned
  while ($row= mysql_fetch_array($result)) {
	$title = $row["title"];
// add recno to this $title
	$recno = $row["recno"];

// we want something like <a href="edit_record.php?recno=$recno">$title </a>
// note the function: edit.php, that accepts the data and processes !  

echo "$count.)<a href=edit.php?recno=$recno>$title.<br></a>";
$count++;
  	}

$currPage = (($s/$limit) + 1);

$currPage =($currPage+20);
// print “queryis”;
// print $query;
?>

<?php

//break before paging

  echo "<br />";

  	// next we need to do the links to other results
  	// this is bypassed if ...
  	
  	if ($s>=1) {  // bypass PREV link if s is 0
  	$prevs=($s-$limit);
  
	print "&nbsp;<a href=\"".$_SERVER['PHP_SELF']."?s=$prevs&q=".$var."\">Prev 10</a>";

  }


// calculate number of pages needing links
  $pages=intval($numrows/$limit);

// $pages now contains int of pages needed unless there is a remainder from division

  if ($numrows%$limit) {
  // has remainder so add one page
  $pages++;
  }

// check to see if last page
  if (!((($s+$limit)/$limit)==$pages) && $pages!=1) {

  // not last page so give NEXT link
  $news=$s+$limit;
  
  // Here's the money shot: a link to the record

print "&nbsp;<a href=\"".$_SERVER['PHP_SELF']."?s=".($news)."&q=".$var."\">Next 10 &gt;&gt;</a>";
  }

$a = $s + ($limit) ;
  if ($a > $numrows) { $a = $numrows ; }
  $b = $s + 1 ;
  echo "<p>Showing results $b to $a of $numrows</p>";
  
?>
	
</div>

<div class="content">
<p align="center">All Contents Copyright © Bill Van Dyk 2012 All Rights Reserved <br></p>
</div>

</body>

</html>

