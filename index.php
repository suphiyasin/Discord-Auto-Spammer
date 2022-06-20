<?php
include("api.php");
$use = new autodc();
$use->cookie = 'Enter here CloudFlared Discord Cookie';
$use->login("Mail", "Password");

//step 1, get user list
$use->getUsers("https://discord.com/channels/501090983539245061/597175122222252038");



//step 2, send message
/*
$myfile = fopen("userlist.txt", "r") or die("Unable to open file!");
$a = fread($myfile,filesize("userlist.txt"));
$ulist = explode("
", $a);
foreach($ulist as $liste){
	$text = '[username] Hi this is test message';
  //output : Suphi hi this is test message
	$idvename = explode(":", $liste);
			$text = str_replace('[username]', $idvename[1], $text);
//echo $idvename[0].'<br/>';
$cahid = $use->getCahnelID($idvename[0]);
$use->sendMessage($text, $cahid);
}
*/
