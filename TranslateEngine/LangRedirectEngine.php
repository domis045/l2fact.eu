<?php 
$url = $_GET['lang'];
$link = $_GET['link'];

if ($url === '')
{
	echo"<META HTTP-EQUIV='refresh' CONTENT='1'>";
	echo"<script language=javascript>window.location = 'http://l2fact.eu/main/index.php'</script>";
	echo $link;
} else if ($link == '1') {
	
	echo"<META HTTP-EQUIV='refresh' CONTENT='1'>";
	echo"<script language=javascript>window.location = 'http://l2fact.eu/main/index.php'</script>";
}
?>