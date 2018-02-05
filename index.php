<?php
include_once 'TranslateEngine/TranslateEngine.php'
?>
<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml' xml:lang='lt' lang='lt'>

<head>
<meta charset="UTF-8">
<title> L2Fact - Private Lineage2 server </title>
<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
<meta name='description' content='L2Fact - Interlude server project' />
<meta name='keywords' content='l2, l2j, l2off, lineage, l2fact, falcon, hq, headquarters, interlude, server, top, pk, pvp, karma, online' />
<meta name='author' content='skype:ugnesas' />
<script src='design/js/jquery-1.7.1.min.js'></script>
<script src='design/js/jquery-ui-1.8.17.custom.min.js'></script>
<script src='design/js/default.js' type='text/javascript'></script>
<link href='design/styles/jquery-ui-1.8.17.custom.css' rel='stylesheet' type='text/css' />
<link href='design/styles/default.css' rel='stylesheet' type='text/css' />
<link href='design/styles/radius-fix.css' rel='stylesheet' type='text/css' />
<link href='design/favicon.ico' type='image/x-icon' rel='shortcut icon' />
<link href='TranslateEngine/TranslateEngine.css' rel='stylesheet' type='text/css' />
</head>
<body>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.4";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<?php
/*include_once 'TranslateEngine/LangRedirectEngine.php';
if($setup){
echo "<div class='kalba_tamsinimas'></div><div class='kalba'><div class='kalba_vidurys'><h1>LANGUAGE:</h1><p>".$lang['FLAG'].$lang['FLAG_LT'].$lang['FLAG_BR'].$lang['FLAG_FR'].$lang['FLAG_GR'].$lang['FLAG_LV'].$lang['FLAG_RU'].$lang['FLAG_SP'].$lang['FLAG_TR'].$lang['FLAG_UK'].$lang['FLAG_UKR'].$lang['FLAG2']."</p></div></div>";
}*/
require_once 'TranslateEngine/Setup.php';
?>
<div id='wrapper'>
<div id='header'>
<div id='header_logo'><center><img id='logo' src='images/logo.png'><a href='#'></a></center></div>
</div>

<div id='header_table'>
<div id='ajaxstatus'>
<center> 
<?php
/*Serverio Ip bei Portai*/
$ip = '91.211.244.246';
$login = '2106';
$game= '7777';

/*Stilius*/
function statusOnline($login)
{
if($login == "Login") {
//echo "Login: <font color=\"#84ff00\">Online</font>";
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
<a href='index.php?lang=' style='letter-spacing: 2px;font-weight:bold'>CHANGE LANGUAGE</a>
<?php echo strtoupper($_COOKIE["lang"]); ?>
</p>
</div>
</div>
<div id='clear_header'></div>
<div id='content'>
<div id='leftside'>
<div class='box'>
<div class='title'><?php echo $lang['MENU_STATISTICS'];?></div>
<div id='ajaxsstatistics'>
<div class='tab tabhighlight' id='tabPVP' onClick="toggletab('PVP')"><?php echo $lang['MENU_TOP_10_PVP'];?></div>
<div class='text' id='displayPVP' style='display: block;'>
<?php

$host = ''; //hostas
$user = 'root'; //useris
$pass = ''; //passwordas
$db = ''; //duom. baze
$top = '10'; //top skaicius (kiek nori kad rodytu)

mysql_connect($host, $user, $pass);
mysql_select_db($db);

echo "	
		

	";
$i = 1;
$sql = "SELECT char_name, pvpkills FROM characters ORDER BY pvpkills DESC LIMIT $top";
$query = mysql_query($sql);
while($row = mysql_fetch_array($query))
{
	echo
	"
		<tr>
		<td><span id='lefttop'><b><font color='#007aa2'>".$i++."&nbsp;</font></td><td><b><font color='#007aa2'>".$row['char_name']."</font></td></span><div style='float:right;'><td><b>&nbsp;".$row['pvpkills']."</td></div> <br />
		</tr>
	";
}

echo "
		
	";
?>
</div>
<div class='tab ' id='tabPK' onClick="toggletab('PK')"><?php echo $lang['MENU_TOP_10_PK'];?></div>
<div class='text' id='displayPK' style='display: none;'>
<?php

$host = ''; //hostas
$user = 'root'; //useris
$pass = ''; //passwordas
$db = ''; //duom. baze
$top = '10'; //top skaicius (kiek nori kad rodytu)

mysql_connect($host, $user, $pass);
mysql_select_db($db);

echo "	

	";
$i = 1;
$sql = "SELECT char_name, pkkills FROM characters ORDER BY pkkills DESC LIMIT $top";
$query = mysql_query($sql);
while($row = mysql_fetch_array($query))
{
	echo
	"
		<tr>
		<td><b><font color='#007aa2'>".$i++."&nbsp;</font></td><td><b><font color='#007aa2'>".$row['char_name']."</font></td><div style='float:right;'><td><b>&nbsp;".$row['pkkills']."</td></div><br />
		</tr>
	";
}

echo "

	";
?>
</div>
<div class='tab ' id='tabKARMA' onClick="toggletab('KARMA')"><?php echo $lang['MENU_TOP_10_ONLINE'];?></div>
<div class='text' id='displayKARMA' style='display: none;'>
<?php

$host = ''; //hostas
$user = 'root'; //useris
$pass = ''; //passwordas
$db = ''; //duom. baze
$top = '10'; //top skaicius (kiek nori kad rodytu)

mysql_connect($host, $user, $pass);
mysql_select_db($db);

echo "	

	";
$i = 1;
$sql = "SELECT char_name, onlinetime FROM characters ORDER BY onlinetime DESC LIMIT $top";
$query = mysql_query($sql);
while($row = mysql_fetch_array($query))
{
	echo
	"
		<tr>
		<td><b><font color='#007aa2'>".$i++."&nbsp;</font></td><td><b><font color='#007aa2'>".$row['char_name']."</font></td><div style='float:right;'><td><b>&nbsp;".$row['onlinetime']."</td></div><br />
		</tr>
	";
}

echo "

	";
?>
</div>
</div>
</div>

<div class='textbox'>
<b><font color='#90bdce'>FaceBook</font></b>
<div align='center' style='padding: 15px 5px;'>
<div class='fb-like-box' data-href='' data-width='192' data-show-faces='true' data-stream='false' data-header='false'>
<div class="fb-page" data-href="https://www.facebook.com/pages/L2Fact/871189696263818" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="false" data-show-posts="false"><div class="fb-xfbml-parse-ignore"><blockquote cite="https://www.facebook.com/pages/L2Fact/871189696263818"><a href="https://www.facebook.com/pages/L2Fact/871189696263818">L2Fact</a></blockquote></div></div>
</div>
</div>
</div>
<div class='textbox imgopacity'>
<b><font color='#90bdce'><?php echo $lang['MENU_VOTE'];?></font></b>
<div align='center' style='padding: 15px 5px;'>
<a href="/" title="Lineage 2 Servers" target="_blank"><img src="http://l2deathland.lt/images/vote_top_img/l2topzone.jpg" width="88" height="56" alt="l2topzone.com" border="0"></a>

<br></br>
<a href="/" target="_blank"><img src="http://l2deathland.lt/images/vote_top_img/mmorpg.jpg" border="0" alt="Lineage2 Server"></a>

</div>
</div></div>
<div id='rightsidetop'>
<ul>
<li><a href='/index.php' target='_self'><?php echo $lang['NAV_1'];?></a></li>
<li><a href='/information.php' target='_self'><?php echo $lang['NAV_2'];?></a></li>
<li><a href='/downloads.php' target='_self'><?php echo $lang['NAV_3'];?></a></li>
<li><a href='/contacts.php' target='_self'><?php echo $lang['NAV_4'];?></a></li>
<li><a href='/vote' target='_self'><?php echo $lang['NAV_5'];?></a></li>
<li><a href='/donate' target='_self'><?php echo $lang['NAV_6'];?></a></li>
</ul>
</div>
<div id='rightside'>


<div id='ajaxpage'>
</div>

<!-- NEWS -->
<?php include_once "TranslateEngine/NewsTranslateEngineModule.php" ?>

<!--<div class='news'>-->
<!--<h1> a </h1>-->
<!--<p>a</p>-->
<!--</div>-->


<div id='footer'><span id='copyright'>Lineage 2 Fact Server Project - All rights reserved since 2015</span>
                <span id='design'>Find more at: <a href='http://www.l2fact.eu'><b><font color='#f6ff00'>siner</font></b></a></span></div>
</div>
<script type='text/javascript'>

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-27927131-2']);
  _gaq.push(['_setDomainName', 'l2fact.eu']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
</body>

</html>
