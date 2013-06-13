<?
$dbhost = 'localhost';
$dbuser = 'jeffreyzan_hanze';
$dbpass = 'google';

$conn = mysql_connect($dbhost, $dbuser, $dbpass) or die                      ('Error connecting to mysql');

$dbname = 'jeffreyzan_ict-beheer';
mysql_select_db($dbname);
?>