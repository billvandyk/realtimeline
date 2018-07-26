<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Reference</title>
<meta name="keywords" content="bill van dyk">
<link rel="stylesheet" type="text/css" href="../css/chromehorse.css">
<link rel="stylesheet" type="text/css" href="../css/wide_tables.css">

</head>

<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-24206484-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>


<body>
<div class="content">
<h2>JSON Export from MySQL</h2>
<h1>Not Configured Yet</h1></div>

<div id="navAlpha">
	<a href="http://www.chromehorse.net">
	<img border="0" src="../images/2009/212w/feet.jpg" width="212" height="94"></a><p>
	&nbsp;<p>
	<!--#include virtual="/css/nav/ruby_nav.shtml"-->
	&nbsp;
	</div>
	
<div class="content">
<p>Here we are.</p>

<?php

$sql = "select ...";
$db = new new PDO ( "mysql:$dbname", $user, $password) ;
$stmt = $db->prepare($sql); 
$stmt->execute();
$result = $stmt->fetchAll();

file_put_contents("output.txt", json_encode($result));

?>

</div>

<div class="content"><p align="center">All Contents Copyright 
	© Bill Van Dyk<br>
&nbsp;2017 All Rights Reserved <br>
	<i><font size="1">Font: Verdana</font></i></p></div>


</body>

</html>
