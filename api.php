<?php
class autodc{
	public $cookie;
	public $auth;
	
	public function parsel($url){
		$li = explode("/", $url);
$uid = $li[5];		
	return $uid;
	}
	
	public function login($mail, $pws){
		$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, 'https://discord.com/api/v9/auth/login');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, "{\"login\":\"$mail\",\"password\":\"$pws\",\"undelete\":false,\"captcha_key\":null,\"login_source\":null,\"gift_code_sku_id\":null}");
curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$headers = array();
$headers[] = 'Authority: discord.com';
$headers[] = 'Accept: */*';
$headers[] = 'Accept-Language: tr-TR,tr;q=0.9,en-US;q=0.8,en;q=0.7';
$headers[] = 'Content-Type: application/json';
$headers[] = 'Cookie: __dcfduid=412b5a70eb3f11eca5b82b8480bd3aa1; __sdcfduid=412b5a71eb3f11eca5b82b8480bd3aa18e55e20885a87da8c61926cad73162c26078e2fb8e954f423605595b36333e82; locale=tr';
$headers[] = 'Origin: https://discord.com';
$headers[] = 'Referer: https://discord.com/login';
$headers[] = 'Sec-Ch-Ua: \" Not A;Brand\";v=\"99\", \"Chromium\";v=\"102\", \"Google Chrome\";v=\"102\"';
$headers[] = 'Sec-Ch-Ua-Mobile: ?0';
$headers[] = 'Sec-Ch-Ua-Platform: \"Windows\"';
$headers[] = 'Sec-Fetch-Dest: empty';
$headers[] = 'Sec-Fetch-Mode: cors';
$headers[] = 'Sec-Fetch-Site: same-origin';
$headers[] = 'User-Agent: Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36';
$headers[] = 'X-Debug-Options: bugReporterEnabled';
$headers[] = 'X-Discord-Locale: tr';
$headers[] = 'X-Fingerprint: 988177447587561522.acToO8Rsbu7pgUWZN8ADfkIY6Zg';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$result = curl_exec($ch);
$response = json_decode($result, true);
$token = $response['token'];
$this->auth = $token;
if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
}
curl_close($ch);

		
		
	}
	
	
	public function getCahnelID($id){
$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, 'https://discord.com/api/v9/users/@me/channels');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, "{\"recipients\":[\"$id\"]}");
curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$headers = array();
$headers[] = 'Authority: discord.com';
$headers[] = 'Accept: */*';
$headers[] = 'Accept-Language: tr-TR,tr;q=0.9,en-US;q=0.8,en;q=0.7';
$headers[] = 'Authorization: '.$this->auth.'';
$headers[] = 'Content-Type: application/json';
$headers[] = 'Cookie: '.$this->cookie.'';
$headers[] = 'Origin: https://discord.com';
$headers[] = 'Referer: https://discord.com/channels/501090983539245061/511344843247845377';
$headers[] = 'Sec-Ch-Ua: \" Not A;Brand\";v=\"99\", \"Chromium\";v=\"102\", \"Google Chrome\";v=\"102\"';
$headers[] = 'Sec-Ch-Ua-Mobile: ?0';
$headers[] = 'Sec-Ch-Ua-Platform: \"Windows\"';
$headers[] = 'Sec-Fetch-Dest: empty';
$headers[] = 'Sec-Fetch-Mode: cors';
$headers[] = 'Sec-Fetch-Site: same-origin';
$headers[] = 'User-Agent: Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36';
$headers[] = 'X-Context-Properties: e30=';
$headers[] = 'X-Debug-Options: bugReporterEnabled';
$headers[] = 'X-Discord-Locale: tr';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$result = curl_exec($ch);
$response = json_decode($result, true);
$chId = $response['id'];
return $chId;
if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
}
curl_close($ch);

	}
	
	
	
	public function getUsers($url){
		$id = $this->parsel($url);
		$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, 'https://discord.com/api/v9/channels/'.$id.'/messages?limit=50');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');

$headers = array();
$headers[] = 'Authority: discord.com';
$headers[] = 'Accept: */*';
$headers[] = 'Accept-Language: tr-TR,tr;q=0.9,en-US;q=0.8,en;q=0.7';
$headers[] = 'Authorization: '.$this->auth.'';
$headers[] = 'Cookie: '.$this->cookie.'';
$headers[] = 'Referer: https://discord.com/channels/501090983539245061/511344843247845377';
$headers[] = 'Sec-Ch-Ua: \" Not A;Brand\";v=\"99\", \"Chromium\";v=\"102\", \"Google Chrome\";v=\"102\"';
$headers[] = 'Sec-Ch-Ua-Mobile: ?0';
$headers[] = 'Sec-Ch-Ua-Platform: \"Windows\"';
$headers[] = 'Sec-Fetch-Dest: empty';
$headers[] = 'Sec-Fetch-Mode: cors';
$headers[] = 'Sec-Fetch-Site: same-origin';
$headers[] = 'User-Agent: Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36';
$headers[] = 'X-Debug-Options: bugReporterEnabled';
$headers[] = 'X-Discord-Locale: tr';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$result = curl_exec($ch);
$response = json_decode($result, true);
$i = 0;
$recorded = [];
while($i < 50){
	$uid = $response[$i]['author']['id'];
	$uname = $response[$i]['author']['username'];
	$resp = $uid.':'.$uname;
if(in_array($resp, $recorded)){
	
}else{
	$myfile = fopen("userlist.txt", "a") or die("Dosya Olusturulmadı PHP Surumu ile alakalı olabilir!");
$txt = "$resp\r\n";
fwrite($myfile, $txt);
fclose($myfile);
$recorded[] = $resp;
}
	$i = $i + 1;
}
echo "finished...";
if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
}
curl_close($ch);

		
	}
	public function sendMessage($text, $id){

		$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, 'https://discord.com/api/v9/channels/'.$id.'/messages');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, "{\"content\":\"$text\",\"nonce\":\"\",\"tts\":false}");
curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$headers = array();
$headers[] = 'Authority: discord.com';
$headers[] = 'Accept: */*';
$headers[] = 'Accept-Language: tr-TR,tr;q=0.9,en-US;q=0.8,en;q=0.7';
$headers[] = 'Authorization: '.$this->auth.'';
$headers[] = 'Content-Type: application/json';
$headers[] = 'Cookie: '.$this->cookie.'';
$headers[] = 'Origin: https://discord.com';
$headers[] = 'Referer: https://discord.com/channels/501090983539245061/511344843247845377';
$headers[] = 'Sec-Ch-Ua: \" Not A;Brand\";v=\"99\", \"Chromium\";v=\"102\", \"Google Chrome\";v=\"102\"';
$headers[] = 'Sec-Ch-Ua-Mobile: ?0';
$headers[] = 'Sec-Ch-Ua-Platform: \"Windows\"';
$headers[] = 'Sec-Fetch-Dest: empty';
$headers[] = 'Sec-Fetch-Mode: cors';
$headers[] = 'Sec-Fetch-Site: same-origin';
$headers[] = 'User-Agent: Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36';
$headers[] = 'X-Debug-Options: bugReporterEnabled';
$headers[] = 'X-Discord-Locale: tr';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$result = curl_exec($ch);
print_r($result);
if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
}
curl_close($ch);

	}
	
	
	
}
