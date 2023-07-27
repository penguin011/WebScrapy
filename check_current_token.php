<?php 

 
$DIR = '/var/www/JEAN_F_T/';

//$comando  = 'perl ' . $DIR . 'wyylde_bot.pl '.  $_POST['token'].  ' >> /var/www/JEAN_F_T/tmp/$(date +"\%Y-\%m-\%d")_log_wyylde.txt 2>&1';
$comando  = 'perl ' . $DIR . 'wyylde_bot.pl '.  $_POST['token'] ;

$comando = "curl 'https://www.wyylde.com/rest/search' -H 'Pragma: no-cache' -H 'Accept-Encoding: gzip, deflate, br' -H 'Accept-Language: es-ES,es;q=0.8,en;q=0.6' -H 'Authorization: Bearer ".$_POST['token']."' -H 'Accept: application/json, text/plain, */*' -H 'Cache-Control: no-cache' -H 'X-device: desktop' -H 'User-Agent: Mozilla/4.0 (Compatible; MSIE 8.0; Windows NT 5.2; Trident/6.0)'  -H 'Connection: keep-alive' -H 'If-Modified-Since: Mon, 26 Jul 1997 05:00:00 GMT' -H 'X-version: 1509029558733' -H 'Referer: https://www.wyylde.com/dashboard/wall' --compressed";

$sal = `$comando`;

echo $sal;

//var_dump(json_decode($sal));

 

 
 

 
?>