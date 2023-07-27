<table id="table_users" class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>User ID</th>
                                            <th>Delete</th>

                                        </tr>
                                    </thead>
                                    <tbody>


<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

 

 
//echo "Hola " . $user;
 
echo '<div id="del_all_users"  ><a href="#" ><i  class="delete glyphicon glyphicon-trash  "></i>&nbsp;&nbsp;Delete All</a></div>';


$UNIQUE_FILE = "./users/" . $user ."/UNIQUE_wyylde.txt" ;

if ( !file_exists($UNIQUE_FILE)) {
	fopen($UNIQUE_FILE, "w");
}

$handle = fopen($UNIQUE_FILE, "r");
if ($handle) {
    while (($line = fgets($handle)) !== false) {
		$line = chop($line );
		$line = preg_replace("/[\r\n]/", "", $line);


		if ($line <> ""){
			echo '<tr class="userrow" id="' . $line . '"><td>' . $line . '</td><td><i user="' . $line . '" class="delete glyphicon glyphicon-remove-sign  "></i></td></tr>';
		}
	}

    fclose($handle);
 } 


?>
<script>

$( document ).ready(function() {
 
 /* Para borrar todos un  usuario */
$( "i.delete" ).click(function() {
	
			console.log();
			
 
 
	
			if (confirm('Are you sure to delete the '+$(this).attr('user')+'user?')) {
				borrar_usuario($(this).attr('user'));
			} else {
				// Do nothing!
			}
});


/* Para borrar todos los usuarios */
$( "#del_all_users a" ).click(function() {
	
			console.log('Entra en del_all_users' );
			
 			if (confirm('Are you sure to delete ALL users?')) {
				del_all_users($(this).attr('user'));
			} else {
				// Do nothing!
			}
});


});

function del_all_users(user){

var lista = $('tr.userrow:visible').toArray().map(a => a.id);

$.each(lista, function( index, value ) {
  
  console.log('Borrando ' + value);
  
  borrar_usuario(value);


});


}
 


function borrar_usuario(user){

 
	
		
		$('tr').parent().find('[id="'+user+'"]').hide( 1500, function() {
					 console.log( "Animation complete." );
					var lista = $('tr.userrow:visible').toArray().map(a => a.id);


					console.log(lista);

					$.ajax({
						type: "POST",
						url: "actualizar_users.php",
						data:  {data: lista, user: $('#user').attr('data')},
						//contentType: "application/json; charset=utf-8",
						dataType: "html",
						success: function (data1) {
							console.log('todo ok');
						},
						error: function (request, status, errorThrown) {
							console.log(request, status, errorThrown);
						}
					});



		 }); //$('tr#'+user).hide( 1500, function() {

}
</script>