<?php
session_start();
header('Cache-control: private'); // IE 6
 
if(isSet($_GET['lang']))
{
$lang = $_GET['lang'];
 
// sukuriame session ir cookie
$_SESSION['lang'] = $lang;
 
setcookie('lang', $lang, time() + (3600 * 24 * 30));
}
else if(isSet($_SESSION['lang']))
{
$lang = $_SESSION['lang'];
}
else if(isSet($_COOKIE['lang']))
{
$lang = $_COOKIE['lang'];
}
else
{
$lang = 'en';
}

if($lang === '')
{
	global $setup;
	$setup = true;
}

switch ($lang) {

  case 'br':
  $lang_file = 'br.php';
  break;

  case 'en':
  $lang_file = 'en.php';
  break;
 
  case 'lt':
  $lang_file = 'lt.php';
  break;
 
  case 'fr':
  $lang_file = 'fr.php';
  break;
 
  case 'gr':
  $lang_file = 'gr.php';
  break; 
 
  case 'lv':
  $lang_file = 'lv.php';
  break;
 
  case 'ru':
  $lang_file = 'ru.php';
  break;
 
  case 'sp':
  $lang_file = 'sp.php';
  break;
 
  case 'tr':
  $lang_file = 'tr.php';
  break;
 
  case 'uk':
  $lang_file = 'uk.php';
  break;
 
  case 'ukr':
  $lang_file = 'ukr.php';
  break;

  default:
  $lang_file = 'en.php';
 
}
 
include_once 'lang/'.$lang_file;
?>
