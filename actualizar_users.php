 <?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

//print_r($_POST['data']);
date_default_timezone_set('Europe/Paris');
$hoy =  date("Ymd_His");

$user = $_POST['user'];

/*copia el fichero antes de modificarlo */
shell_exec("cp ./users/" . $user ."/UNIQUE_wyylde.txt " .  " ./users/" . $user ."/tmp/UNIQUE_wyylde_".$hoy.".txt ");

/* Crea el nuevo fichero con los usuarios que permanecen */
 $handle = fopen("./users/" . $user ."/UNIQUE_wyylde.txt", "w");
if ($handle) {
 
	foreach($_POST['data'] as $item)
	{
		if ($item <> ""){
		  fwrite($handle, $item."\n");
		  echo $item."\n";
		}
	}


    fclose($handle);
 } 




 
 


 ?>
