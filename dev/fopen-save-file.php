<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta content="text/html; charset=windows-1252" http-equiv="Content-Type" />
<title>Save XML Output to File - Tests</title>
</head>

<body>


<?php 

// include "connect-db-pdo.php";
// the script here is NOT PDO!  So use outdated connection...
include connect-db.php;

// the next line works in other php script
// 	$result = mysql_query("SELECT * FROM history_timeline WHERE category='van dyks'") or die(mysql_error());  

?>

<table>
<tr>
<td><?php echo $result['start'];?></td>
<td><?php echo $result['end'];?></td>
<td><?php echo $result['title'];?></td>
</tr>
</table>

<?php
/*
$fh = fopen('blahata.txt', 'w');
$result = mysql_query("SELECT * FROM history_timeline WHERE category='van dyks'");
while ($row = mysql_fetch_array($result)) {
    $last = end($row);
    foreach ($row as $item) {
        fwrite($fh, $item);
        if ($item != $last)
            fwrite($fh, "\t");
    }
    fwrite($fh, "\n");
}
fclose($fh);
        mysql_close($sqlconn);
        
        */
?>
              

</body>

</html>
