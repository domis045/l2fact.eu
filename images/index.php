<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml' xml:lang='lt' lang='lt'>

<head>
<title> LA2PORTAL - Private Lineage2 server </title>
<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
<meta name='description' content='LA2PORTAL - Interlude server project' />
<meta name='keywords' content='l2, l2j, l2off, lineage, la2portal, falcon, hq, headquarters, interlude, server, top, pk, pvp, karma, online' />
<meta name='author' content='skype:theikid123' />
<script src='design/js/jquery-1.7.1.min.js'></script>
<script src='design/js/jquery-ui-1.8.17.custom.min.js'></script>
<script src='design/js/default.js' type='text/javascript'></script>
<link href='design/styles/jquery-ui-1.8.17.custom.css' rel='stylesheet' type='text/css' />
<link href='design/styles/default.css' rel='stylesheet' type='text/css' />
<link href='design/styles/radius-fix.css' rel='stylesheet' type='text/css' />
<link href='design/favicon.ico' type='image/x-icon' rel='shortcut icon' />
</head>
<body>
<div id='fb-root'></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'http://connect.facebook.net/lt_LT/all.js#xfbml=1&appId=145368455542049';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<div id='wrapper'>
<div id='header'>
<div id='header_logo'><center><img id='logo' src='images/logo.png'><a href='#'></a></center></div>

<div id='header_button'>
<a href='/index.html' data-href='#servmid'><img src='images/server_mid.png' alt='Mid server' title='MID SERVER' class='selected'></a>
<a href='/index.html' data-href='#servpvp'><img src='images/server_pvp.png' alt='PvP Server' title='PVP SERVER' class='margin '></a>
<a href='/index.html' data-href='#servavd'><img src='images/server_avd.png' alt='Faction Server' title='FACTION SERVER' class=''></a>
</center>

</div>

<div id='header_table'>
<div id='ajaxstatus'>
<center> 
<?php
/*Serverio Ip bei Portai*/
$ip = '77.221.74.184';
$login = '2106';
$game= '7777';

/*Stilius*/
function statusOnline($login)
{
if($login == "Login") {
echo "Login: <font color=\"#84ff00\">Online</font>";
}else{
echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Game: <font color=\"#84ff00\">Online</font>";
}
}

function statusOffline($login)
{
if($login == "Login") {
echo "Login: <font color=\"#FF0000\">Offline</font>";
}else{
echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Game: <font color=\"#FF0000\">Offline</font>";
}
}

/*Cia nelysk*/
$timeout = "0.3";
if ($ip and $login and $timeout) {
$login = @fsockopen("$ip", $login, $errno, $errstr, $timeout);
$game = @fsockopen("$ip", $game, $errno, $errstr, $timeout);
}
if($login) { statusOnline("Login");  }
else { statusOffline("Login");  }
if($game) { statusOnline("Game");  }
else { StatusOffline("Game"); }
?>
<p align='center'>
<a href='game.html' style='letter-spacing: 2px;font-weight:bold'>INVITATION FRIENDS</a> 
</p>
</div>
</div>
<div id='clear_header'></div>
<div id='content'>
<div id='leftside'>
<div class='box'>
<div class='title'>PLAYER STATISTICS</div>
<div id='ajaxsstatistics'>
<div class='tab tabhighlight' id='tabPVP' onClick="toggletab('PVP')"> TOP <font color='#f6ff00'>10</font> PVP</div>
<div class='text' id='displayPVP' style='display: block;'>
<center style='padding: 5px;'>
<?php

$host = '77.221.74.184'; //hostas
$user = 'root'; //useris
$pass = 'www.la2portal.lt-benderis-anonymous-falcon'; //passwordas
$db = 'la2portal.lt'; //duom. baze
$top = '10'; //top skaicius (kiek nori kad rodytu)

mysql_connect($host, $user, $pass);
mysql_select_db($db);

echo "	
		<table align='center'>

	";
$i = 1;
$sql = "SELECT char_name, pvpkills FROM characters ORDER BY pvpkills DESC LIMIT $top";
$query = mysql_query($sql);
while($row = mysql_fetch_array($query))
{
	echo
	"
		<tr>
		<td><b><font color='#007aa2'>".$i++."&nbsp;</font></td><td><b><font color='#007aa2'>".$row['char_name']."</font></td><td><b><font color='#f6ff00'>&nbsp;".$row['pvpkills']."</font></td>
		</tr>
	";
}

echo "
		</table>
	";
?>
</center></div>
<div class='tab ' id='tabPK' onClick="toggletab('PK')"> TOP <font color='#f6ff00'>10</font> PK</div>
<div class='text' id='displayPK' style='display: none;'>
<center style='padding: 5px;'>
<?php

$host = '77.221.74.184'; //hostas
$user = 'root'; //useris
$pass = 'www.la2portal.lt-benderis-anonymous-falcon'; //passwordas
$db = 'la2portal.lt'; //duom. baze
$top = '10'; //top skaicius (kiek nori kad rodytu)

mysql_connect($host, $user, $pass);
mysql_select_db($db);

echo "	
		<table align='center'>

	";
$i = 1;
$sql = "SELECT char_name, pkkills FROM characters ORDER BY pkkills DESC LIMIT $top";
$query = mysql_query($sql);
while($row = mysql_fetch_array($query))
{
	echo
	"
		<tr>
		<td><b><font color='#007aa2'>".$i++."&nbsp;</font></td><td><b><font color='#007aa2'>".$row['char_name']."</font></td><td><b><font color='#f6ff00'>&nbsp;".$row['pkkills']."</font></td>
		</tr>
	";
}

echo "
		</table>
	";
?>
</center></div>
<div class='tab ' id='tabKARMA' onClick="toggletab('KARMA')"> TOP <font color='#f6ff00'>10</font> ONLINE</div>
<div class='text' id='displayKARMA' style='display: none;'>
<center style='padding: 5px;'>
<?php

$host = '77.221.74.184'; //hostas
$user = 'root'; //useris
$pass = 'www.la2portal.lt-benderis-anonymous-falcon'; //passwordas
$db = 'la2portal.lt'; //duom. baze
$top = '10'; //top skaicius (kiek nori kad rodytu)

mysql_connect($host, $user, $pass);
mysql_select_db($db);

echo "	
		<table align='center'>

	";
$i = 1;
$sql = "SELECT char_name, onlinetime FROM characters ORDER BY onlinetime DESC LIMIT $top";
$query = mysql_query($sql);
while($row = mysql_fetch_array($query))
{
	echo
	"
		<tr>
		<td><b><font color='#007aa2'>".$i++."&nbsp;</font></td><td><b><font color='#007aa2'>".$row['char_name']."</font></td><td><b><font color='#f6ff00'>&nbsp;".$row['onlinetime']."</font></td>
		</tr>
	";
}

echo "
		</table>
	";
?>
</center></div>
</div>
</div>
<div class='textbox imgopacity'>
<b><font color='#90bdce'>Poll</font></b>
<div style='padding: 15px 5px;'>
<div style='text-align:center'>There are no polls defined.</div>
</div>
</div>
<div class='textbox'>
<b><font color='#90bdce'>Lineage 2</font> <font color='#ffe464'>video</font></b><br><br><a href='#' target='_blank'>
<center><img width='203px' name='video' src='http://img.youtube.com/vi/qDeMdjTmKck/3.jpg'></center></a>
</div>
<div class='textbox'>
<b><font color='#90bdce'>FaceBook</font></b>
<div align='center' style='padding: 15px 5px;'>
<div class='fb-like-box' data-href='' data-width='192' data-show-faces='true' data-stream='false' data-header='false'>
SOON</div>
</div>
</div>
<div class='textbox imgopacity'>
<b><font color='#90bdce'>Vote</font></b>
<div align='center' style='padding: 15px 5px;'>
<a href="/" title="Lineage 2 Servers" target="_blank"><img src="http://l2deathland.lt/images/vote_top_img/l2topzone.jpg" width="88" height="56" alt="l2topzone.com" border="0"></a>
<a href="/" target="_blank"><img src="http://www.l2j.lt/topai/b-14486.png" alt="L2 Top - Balsavimas" border="0" width="88" height="56" border="0"></a>
<br></br>
<a href="/" target="_blank"><img src="http://l2deathland.lt/images/vote_top_img/mmorpg.jpg" border="0" alt="Lineage2 Server"></a>
<a href="/" target="_blank"><img border="0" src="http://l2deathland.lt/images/vote_top_img/topofgame.gif" width="88" height="54" alt="topofgames.com" /></a>
</div>
</div></div>
<div id='rightsidetop'>
<ul>
<li><a href='/index.php' target='_self'>Home</a></li>
<li><a href='/' target='_self'>Information</a></li>
<li><a href='/statistics.html' target='_self'>Statistics</a></li>
<li><a href='/' target='_self'>Registration</a></li>
<li><a href='/' target='_self'>Contacts</a></li>
<li><a href='/' target='_self'>Donations</a></li>
<li><a href='/' target='_blank'>Forum</a></li>
</ul>
</div>
<div id='rightside'>
<div id='dlbox'>
<a target='_blank' href='#'><img src='images/dl_client.png'></a>
<a target='_blank' href='#'><img src='images/dl_system.png'></a>
<a target='_blank' href='#'><img src='images/dl_donate.png'></a>
</div>
<div id='ajaxpage'><div class='news'>
<h1>LOREM IPSUM</h1>
<p>
Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p></div></div></div></div>
<div style='clear:both;'></div>
<div id='footer'><span id='copyright'>Lineage 2 FalconHQ Server Project - All rights reserved since 2012</span>
                <span id='design'>Find more at: <a href='http://www.falconhq.eu'><b><font color='#f6ff00'>FalconHQ</font></b></a></span></div>
</div>
<script type='text/javascript'>

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-27927131-2']);
  _gaq.push(['_setDomainName', 'falconhq.eu']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
</body>

</html>
