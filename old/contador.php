<?php
// Connects to your Database 
mysql_connect("localhost", "28066", "qwerup0897") or die(mysql_error()); 
mysql_select_db("28066") or die(mysql_error());
//Adds one to the counter
mysql_query("UPDATE counter SET counter = counter + 1");
//Retrieves the current count
$count = mysql_fetch_row(mysql_query("SELECT counter FROM counter"));
//Displays the count on your site
print "$count[0]"; 
?>