
<?php
// this module creates a downloadable file-- it does not write the file to disk.
// output headers so that the file is downloaded rather than displayed
header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=survey.csv');

// create a file pointer connected to the output stream
$output = fopen('php://output', 'w');

// output the column headings
fputcsv($output, array('SRR_ID', 'Date', 'Rep', 'What Issue', 'How Can I Help', 'Aspect', 'Other Issues?', 'Name', 'eMail', 'Phone'));

// fetch the data
mysql_connect('localhost', 'root', 'Zebr@696');
mysql_select_db('history');
$rows = mysql_query('SELECT SRR_ID, eDate, SRR_Rep, What, HowCanIHelp, Aspect, Anything_Else, Name, eMail, Phone FROM srr'); 
// $rows = mysql_query('Select title, lname, fname FROM model');

// loop over the rows, outputting them
while ($row = mysql_fetch_assoc($rows)) fputcsv($output, $row);


?>

