 

<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);

 
 
$DIR = "/var/www/JEAN_F_T/users/" . $_POST['user'];

/*Chequea que existe carpeta para este usuario y en caso negativo la crea */
if (!file_exists($DIR)) {
    mkdir(  $DIR, 0777);
	//echo "The directory $DIR was successfully created.";
    mkdir(  $DIR . "/log/", 0777);
    mkdir(  $DIR . "/data/", 0777);
    mkdir(  $DIR . "/tmp/", 0777);
} else {
    //echo "The directory ".$_POST['user']." exists.";
}
 
sleep(1);


//Detecta que no está el proceso corriendo

//echo '<pre>';
$comando = 'ps -ef |grep "perl [^ ]*wyylde_bot.pl '.$_POST['user'].'" |grep -v grep';
//echo $comando ."\n";
$sal = shell_exec($comando);
 

if ($sal){
	//echo "proceso en curso";
	$fin = "NO";
}
else {
		//echo "no hay proceso en curso";
		$fin = "YES";
}
//echo '</pre>';

 


$FILE = $DIR . '/log/' . 'last_log.txt';

 //$sal = file_get_contents($FILE, true);

 //echo $sal;
 
echo '  <table class="table">';
echo '      <thead>';
echo'         <tr>';

if (file_exists($FILE)) {
		$handle = fopen($FILE, "r") or die("Unable to open $FILE ");;

		if ($handle) {

			//Cabecera
			$line = fgets($handle);
			$cols = preg_split("/;/", $line);
			$i=1;

			echo '<th class="col_' . $i. '">#</th>';
			foreach ($cols as &$valor) {
				echo '<th class="col_' . $i. '">'.$valor.'</th>';
				$i++;

			}
			echo '      </tr>
			</thead>';

			$row  =1;
			while (($line = fgets($handle)) !== false) {
				// process the line read.
				echo '<tr>';
				$cols = preg_split("/;/", $line);
				$i=1;
			    echo '<td class="col_' . $i. '">'.$row.'</th>';

				foreach ($cols as &$valor) {
					echo '<td class="col_' . $i. '">'.$valor.'</td>';
					$i++;
				}

				echo '</tr>';
				$row++;
			}
			echo '    </tbody>
		  </table>';

			echo "\n";
			echo '<div style="display:none;" id="fin">'.$fin.'</div>';
			//echo '<div id="fin">NO</div>';

			fclose($handle);
		} else {


			// error opening the file.
		}
}
 
 

?>

 
 