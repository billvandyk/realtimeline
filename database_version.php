<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta content="text/html; charset=windows-1252" http-equiv="Content-Type" />
<title>Untitled 1</title>
</head>

<body>

<pre style="font-family: monospace, &quot;Courier New&quot;; padding: 1em; border: 1px dashed rgb(47, 111, 171); color: rgb(0, 0, 0); background-color: rgb(249, 249, 249); line-height: 1.3em; font-size: 12.8px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: normal; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px;">&lt;?php
header('Content-Type: application/json; charset=utf-8');
/* 
 * @Purpose: This file is about making JSON data
 * @author&nbsp;: goldsky
 * @date  &nbsp;: 20100210
 */
// Database settings (localhost? username? password?)
include_once('dbonfig.inc.php');
$conn = mysql_connect($database_server, $database_user, $database_password);
if (!$conn ) {
   die('Not connected&nbsp;: ' . mysql_error());
}
// select db
$dbconn = mysql_select_db($dbase,$conn);
if (!$dbconn ) {
   die ('Can\'t select db&nbsp;: ' . mysql_error());
}
// generating event attributes inside a function
function eventAtt() {
   $eventQuery=mysql_query('SELECT * FROM tableName')  or die (mysql_error());
   while ($row = mysql_fetch_array($eventQuery)) {
       $date = explode(&quot;-&quot;, $row['date']); // in my case, $date is stored as yyyy-mm-dd in MySQL table.
       $phpmakedate = mktime(0, 0, 0, $date[1], $date[2], $date[0]);
       // ------------ optionally with &quot;end&quot; date ------------
       if ($row['enddate']== NULL || $row['enddate'] == '0000-00-00') {
           $phpenddate = NULL;     // to skip latestStart date
           $durationEvent = FALSE; //JSON
       }
       else {
           $enddate = explode(&quot;-&quot;, $row['enddate']);
           $phpmakeenddate = mktime(0, 0, 0, $enddate[1], $enddate[2], $enddate[0]);
           $phpenddate = date(&quot;r&quot;,$phpmakeenddate);
           $durationEvent = TRUE; //JSON
       }
       // ------------ create the array here ------------
       $eventAtts[] = array (
               'start' =&gt; date(&quot;r&quot;,$phpmakedate),
               'end' =&gt; $phpenddate,
               'durationEvent' =&gt; $durationEvent,
               'description' =&gt; $row['description']
       );
   }
   mysql_free_result($eventQuery);
   return $eventAtts;
}
////////////////////////////////////////////
//                                        //
//          TIMELINE'S JSON DATA          //
//                                        //
////////////////////////////////////////////
//
$json_data = array (
        //Timeline attributes
        'wiki-url'=&gt;'<a class="external free" href="http://simile.mit.edu/shelf'" rel="nofollow" style="text-decoration: none; color: rgb(102, 51, 102); background: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAoAAAAKCAYAAACNMs+9AAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAFZJREFUeF59z4EJADEIQ1F36k7u5E7ZKXeUQPACJ3wK7UNokVxVk9kHnQH7bY9hbDyDhNXgjpRLqFlo4M2GgfyJHhjq8V4agfrgPQX3JtJQGbofmCHgA/nAKks+JAjFAAAAAElFTkSuQmCC&quot;) right center no-repeat; padding-right: 13px;">http://simile.mit.edu/shelf'</a>,
        'wiki-section'=&gt;'Simile Cubism Timeline',
        'dateTimeFormat'=&gt;'Gregorian', //JSON!
        //Event attributes
        'events'=&gt; eventAtt() // &lt;---- here is the event arrays from function above.
);
$json_encoded=json_encode($json_data);
echo $json_encoded;
?&gt;</pre>

</body>

</html>
