<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta content="text/html; charset=windows-1252" http-equiv="Content-Type" />
<title>Untitled 1</title>
<style type="text/css">
.auto-style1 {
	margin-left: 40px;
}
</style>
</head>

<body>


$sql="UPDATE history_timeline SET 
<p>&nbsp;</p>
<p class="auto-style1">title = '" . $_POST['title'] . "', </p>
<p class="auto-style1">certainty = '" . $_POST['certainty'] . "', 
	  </p>
<p class="auto-style1">start = '" . $_POST['start'] . "', </p>
<p class="auto-style1">category = '" . $_POST['category'] ."', 
	  </p>
<p class="auto-style1">description = '" . $_POST['description'] . "', </p>
<p class="auto-style1">image = '" . $_POST['image'] . "', 
	</p>
<p class="auto-style1">link = '" . $_POST['link'] . "', </p>
<p class="auto-style1">color = '" .$_POST['color'] . "',
	</p>
<p class="auto-style1">icon = '" . $_POST['icon'] . "', </p>
<p class="auto-style1">notes = '" . $_POST['notes'] . "', 
	</p>
<p class="auto-style1">added = '" . $_POST['added'] . "', </p>
<p class="auto-style1">updated = '" . $_POST['updated'] . "'
	</p>
<p class="auto-style1">&nbsp;</p>

</body>

</html>
