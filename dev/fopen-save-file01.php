<!-- added by me  -->

<?php

$conmysql = mysqli_connect("localhost", "root", "Zebr@696", "history")
IF (!$conmysql) {
	echo "Error: unable to connect.". PHP_EOL;
	echo "Debugging errno: ". mysqli_connect_errno() . PHP_EOL;
	echo "Debugging error: ". mysqli_connect_error() . PHP_EOL;
	exit;
	}
	
echo "Success: a proper connection was established.  ".PHP_EOL;
echo "Host information: " .mysqli_tet_host_info($conmysql) . PHP_EOL;	

?>


<!-- End of added by me  -->

<?php

$pairresult = mysqli_query($conmysql,"SELECT * FROM orders WHERE order_number IN ( SELECT order_number FROM orders GROUP BY order_number HAVING count(ordern_number) > 1 ) ORDER BY order_number");
$data .= "<h4>Customers with Multiple Orders</h4><textarea rows=\"5\" cols=\"90\" readonly>";
while($row = mysqli_fetch_array($pairresult))
  {
  $data .= str_replace("&","\&",$row['shipment_address_name']) . "\n";
  $data .= str_replace("&","\&",$row['shipment_address_street']) . "\n";
  if ( !empty($row['shipment_address_street_2']) ) {
  $data .= str_replace("&","\&",$row['shipment_address_street_2']) . "\n";
  } else {
  }
  $data .= str_replace("&","\&",$row['shipment_address_city']) . "\n";
  $data .= str_replace("&","\&",$row['shipment_address_postal_code']) . "\n";
  if ( !empty($row['customer_phone']) ) {
  $data .= str_replace("&","\&",$row['customer_phone']) . "\n";
  } else {
  }
  $data .= "(" . $row['fulfillment_line_item_id'] . ")\n";
  $data .= "[" . $row['item_name'] . "]\n\n";
  }
$data .= "</textarea><br />";

?>

<!-- second snippet -->

<?php 
$pairresult = mysqli_query($conmysql,"SELECT * FROM orders WHERE order_number IN ( SELECT order_number FROM orders GROUP BY order_number HAVING count(order_number) > 1 ) ORDER BY order_number");
while($row = mysqli_fetch_array($pairresult))
  {
  $multiple = "productmultiple_tracking($filetimestamp).csv";
  $handle = fopen($grouponmultiple, 'a') or die('Cannot open file:  '.$multiple);
  $data = "\"" . $row['fulfillment_line_item_id'] . "\",\"" . $row['fulfillment_line_item_id'] . "\",\"YDL\",\"\"\n";
  fwrite($handle, $data);
  fclose($handle);
    }
  echo "<a href=\"$multiple\">Download Template</a><br />";

  ?>
  
  <!-- 
Replace all echo by $data .= in first sample, so you will have your text in $data variable. After it save $data as in the second example.  From forum.
-->