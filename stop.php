<?php 

 
$DIR = '/var/www/JEAN_F_T/';

$USER = $_POST['user'];

#Para el proceso
$comando  = 'pkill -f "wyylde_bot.pl '.$USER.'" ';
`$comando`;

  $comando  = 'pkill -f "wyylde_bot_v2.pl '.$USER.'" ';
`$comando`;

 

 
?> 