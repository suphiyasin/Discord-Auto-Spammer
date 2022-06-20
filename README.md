[![Hits](https://hits.seeyoufarm.com/api/count/incr/badge.svg?url=https://github.com/suphiyasin/Discord-Auto-Spammer&count_bg=%23C83D3D&title_bg=%23057386&icon=&icon_color=%23BA0808&title=View&edge_flat=false)](https://github.com/suphiyasin/instagram-advanced-user-finder)


# Discord-Auto-Spammer
You can collect the users who write in the message section of the server you want and send them a direct message.

# Usage
First Take CloudFlared Cookie from discord.com<br/>
<a href="https://t.me/otoaraclar/78"> EXAMPLE COOKIE TAKING VIDEO</a><br/>

### Step 1 Get User List
```
<?php
include("sis.php");
$use = new autodc();

//get user list from cahnnel link
$use->getUsers("https://discord.com/channels/501090983539245061/597175122222252038");
//auto saved in userlist.txt

```

### Step 2 Send Message 

If you write [username] in the message to be sent, the username of the person you sent will be included.

```
<?php
include("sis.php");
$use = new autodc();
$myfile = fopen("userlist.txt", "r") or die("Unable to open file!");
$a = fread($myfile,filesize("userlist.txt"));
$ulist = explode("
", $a);
foreach($ulist as $liste){
	$text = '[username] Hi this is test message';
  //output : Suphi hi this is test message
	$idvename = explode(":", $liste);
			$text = str_replace('[username]', $idvename[1], $text);
$cahid = $use->getCahnelID($idvename[0]);
$use->sendMessage($text, $cahid);
}
```
