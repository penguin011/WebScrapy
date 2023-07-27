<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

/* Detecta que ha pasado mas de media hora (1837925) y se desconecta */
if (     (time()."000") - ($_POST['datetoken']) >1837925    )
{
 	header('Location: ./index.php');
}


header('Content-Type:text/html; charset=UTF-8');
echo '<?xml version="1.0" encoding="iso-8859-1"?>'

 

 


?>
<!doctype html>
<html lang="en">
 <head>
  <meta charset="UTF-8">
  <meta name="Generator" content="">
  <meta name="Author" content="">
  <meta name="Keywords" content="">
  <meta name="Description" content="">

 <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<meta charset="UTF-8">
 
 <script src="http://code.jquery.com/jquery-1.7.2.min.js"></script>
<script src="https://netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
 


<link rel="stylesheet" href="https://blackrockdigital.github.io/startbootstrap-sb-admin-2/vendor/bootstrap/css/bootstrap.min.css" />
<link rel="stylesheet" href="https://blackrockdigital.github.io/startbootstrap-logo-nav/css/logo-nav.css" />

<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.2.1/css/bootstrap-combined.min.css" />


  <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
  <link rel="stylesheet" href="./my_css.css">
  <title>Bot</title>

<script>

  
jQuery(document).ready(function() {
  
  check_current_token(  $('#token').val()  );
 check_current_execute(1);
  
});
 
</script>




 </head>
 <body lang="fr">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top"><?php echo '<b><span id="saludo">Bonjour <span id="user" data="' .   $_POST['user'] .  '">' .   $_POST['user'] . '</span>  !</span></b>'; ?>
 </nav>	

<div class="panel-body-msg">
                            <div style="display:none;" class="alert alert-success alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fa fa-times" aria-hidden="true"></i>&nbsp;</button>
                                <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. </span>
                            </div>
                            <div style="display:none;" class="alert alert-info alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fa fa-times" aria-hidden="true"></i>&nbsp;</button>
                                 <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</span> 
                            </div>
                            <div style="display:none;" class="alert alert-warning alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fa fa-times" aria-hidden="true"></i>&nbsp;</button>
                                 <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. </span>
                            </div>
                            <div style="display:none;" class="alert alert-danger alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fa fa-times" aria-hidden="true"></i>&nbsp;</button>
                                 <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. </span>
                            </div>
 </div>

 <div class="container">


<?php 

//		https://blackrockdigital.github.io/startbootstrap-logo-nav/#



 

//echo "<pre>";
 //print_r ($_POST);
 //echo "</pre>";

 



echo '<input  style="display:none;" id="token" name=token" value="'.$_POST['token'].'">';
  
 if (isset($_POST['datetoken'])){
 			echo '<input  style="display:none;" id="datetoken" name="datetoken" value="'.$_POST['datetoken'].'">';

 }
else{
		echo '<input  style="display:none;" id="datetoken" name="datetoken" value="">';

}
 
	
 




?>
 


<div class="row show-grid">
                                <div class="col-xs-12 col-md-4">
										<div class="panel panel-default">
																<div class="panel-heading">                           Recherches sauvegard&eacute;es                        </div>
																<!-- /.panel-heading -->
																<div class="panel-body">
																									<div style="    text-align: left;"><?php $i=0;while( isset($_POST['search_id_'.$i]) ) {	echo '<div class="radio">  <label><input data="'.$_POST['search_id_'.$i].'" type="radio" name="optradio">'.$_POST['search_name_'.$i].'</label></div>';	$i++;} ?></div>
																</div>
										</div>
								</div>

                                <div class="col-xs-12 col-md-6">
														<div class="panel panel-default">
																<div class="panel-heading">                           Message Text                        </div>
																<!-- /.panel-heading -->
																<div class="panel-body">
																									<div style="text-align: center;"><textarea value id="message" rows="10" cols="100" placeholder="Votre message &agrave; destination de ..."></textarea></div>
																									<!--  âàäçéèêëîïôùûüœñ/?&"'%$ -->
														</div>
															
										</div>

								</div>


								 <div class="col-xs-12 col-md-2"></div>
</div>



<br>
<br>
<br>



<div class="row">
	<div id="datail" class="col-sm-8 col-sm-offset-2"> 
	
	<button id="ExecuteBot" type="button" class="btn btn-primary">Execute Bot</button>
	<button id="Stop" type="button" class="btn btn-warning" disabled>Stop</button>
	<button id="Logout" type="button" class="btn btn-danger">Logout</button> 
	  
</div>
</div>

<br>



 


<div class="panel panel-default">
                        <div class="panel-heading">
                            
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#log" data-toggle="tab">LOG</a>
                                </li>
                                <li><a href="#users" data-toggle="tab">USERS</a>
                                </li>
                            </ul>

                            <!-- Tab panes --> 
                            <div class="tab-content">
                                <div class="tab-pane fade in active DivWithScroll" id="log">
                                    <h4>LOG</h4>
										<div id="results">
											<div class="row pre-scrollable">
													
													<div id="log"	>	</div>
											</div>
										</div>
                                </div>
                                <div class="tab-pane fade DivWithScroll" id="users">
                                    <h4></h4>
											<?php $user=$_POST['user'];  include './users.php' ?>

											 


                                </div>
                            </div>
                        </div>
                        <!-- /.panel-body -->
                    </div>


<script>

$( "#ExecuteBot" ).click(function() {
	ExecuteBot($('#token').val());
});

$( "#Logout" ).click(function() {
	Logout( );
});

$( "#Stop" ).click(function() {
	Stop( );
});

function Logout(token){
	$('#token').val("");
	window.location.replace("./index.php");
}

function ExecuteBot(token){

		console.log('Entra en ExecuteBot');

		
		/*Valida que se ha escrito un mensaje */
		if	(	jQuery('#message').val() == "" )
		{
				Message("Vous n'avez écrit aucun message Il n'est pas possible d'envoyer le message." );
				console.log('Mensaje vacio');
				return;
		}

		var busqueda = jQuery("input:radio[name ='optradio']:checked").attr('data');
		/*Valida que se ha seleccionado una búsqueda*/
		if	(	 busqueda === undefined )
		{
				Message("Vous n'avez sélectionné aucune recherche. Il est nécessaire d'envoyer des messages sélectionnez une recherche." );
				console.log('búsqueda vacia');
				return;
		}

 		$('#spinner').show();
 		$('#fin').html('NO');

		$('#Stop').prop('disabled', false);
		 
		 $('#last').html("");
		 $('.table').remove();

 	 	 user = $('#user').attr('data');


 
		message = format_msg($('#message').val());

		data = {token: token , user: user, search: busqueda, message: message  } ;


		console.log('data', data);

 		  
		  $.ajax({
		  url: "./execute.php",
          type: "POST",
		   dataType:"json",
		  data: data,	
		  }).always(function(res) {
 				 console.log('Resultado de ExecuteBot' , res);
				 //location.reload();
		});
 
		 check_current_execute();


}

function format_msg(msg ){


		//msg = msg.replace(/([^a-zA-Z0-9])/g,  " [$&]" );

		//msg = msg.replace(/([^a-zA-Z0-9])/g, function() {  return  "*"+arguments[1]+"*";  });
		//msg = msg.replace(/(.)/g, function() {  c=arguments[1];  return   c.charCodeAt  });

		//msg = msg.replace(/([^a-zA-Z0-9\.,\-\n\r ])/g, function(m) {    return (m === '"' || m === '\\') ? " " : "\\\\x" + m.charCodeAt(0).toString(16);});
		
		
		
		//msg = msg.replace(/([^a-zA-Z0-9\.,\-\n\r<>&%\$\/\?¿ ])/g, function(m) {    return (m === '"' || m === '\\') ? " " : "\\x" + m.charCodeAt(0).toString(16);});


		//$msg =~ s/%(..)/"\\x".lc($1)/ge;

		msg = msg.replace(/ /g,"+");
		msg = msg.replace(/"/g,'\\"');
		
		//No se puede enviar una comilla. 
		msg = msg.replace(/'/g,"");

		msg = msg.replace(/\r\n|\r|\n/g,'\n');


 

		return  JSON.stringify(msg) ;

}


function Stop(){
		 user = $('#user').attr('data');

 		  $.ajax({
		  url: "./stop.php",
		  type: "POST",
		  data: {user: user}
		  }).always(function(res) {
 				 console.log('Stop' );

		});
 
}

function check_current_token(token){
		  $.ajax({
		  url: "./check_current_token.php",
          type: "POST",
		   dataType:"json",
		  data: {token, token},	
		  }).done(function(res) {
 					console.log('check_current_token', res);
					if (res['status'] != 'success')
					{
						window.location.replace("./index.php");
					}
		});
}

function check_current_execute(first){
	console.log('Entra en check_current_execute' );
	
	user = $('#user').attr('data');


	console.log(  'fin:' + $('#fin').text() );

if ($('#fin').text() == 'NO' || first    ) {
		 $.ajax({
		  url: "./read_last_log.php",
	      type: "POST",
		  data: {"user": user}
		  }).done(function(data) {
			//console.log('HTML',data);
			$('#log').html('<br><br><br><div id="spinner"  style="width: 100%;" > <i class="fa fa-refresh fa-spin" style="font-size:24px"></i>	</div><h2>Log</h2>'+data);
			$('.col_9').hide(); //Oculta la foto 
			//$('.col_10').hide(); //Oculta la url


			if ($('#fin').text() == 'NO')
			{
				console.log('Debe seguir preguntando por el log');
				$('#spinner').width( $('.table').width());
				$('#ExecuteBot').prop( "disabled", true );
				$('#Stop').prop( "disabled", false );
				setTimeout(check_current_execute, 5000);
 			}
			else{
				console.log('Fin=YES');
				$('#spinner').hide();
				$('#Stop').prop( "disabled", true );
				console.log($('.table tr:last').find('td.col_1:last').text()  );
				$('h2').append(' : <span id="last">' + $('.table tr:last').find('td.col_1:last').text() + '</span>');
				$('#ExecuteBot').prop( "disabled", false );
				return 1; 
			}
		}) ;
 

} //while ($('#fin').text() == 'NO' ) {

}


function sleepFor( sleepDuration ){
    var now = new Date().getTime();
    while(new Date().getTime() < now + sleepDuration){ /* do nothing */ } 
}


function Message( text,  type="alert-danger" ){
	/* type = 
		alert-success		-	green
		alert-info				-	blue
		alert-warning		-	yellow
		alert-danger		-	red
	*/

	if (type== 'undefined')
	{
		type = 'alert-success';
	}
	
	console.log(type, text);
	clone = jQuery('div.' + type).clone();
	jQuery(clone).find('span').text(text);
	jQuery(clone).show();

 
	jQuery(clone).appendTo('.panel-body-msg').hide().show('slow');
	

}

</script>



 </div>
</body>
</html>


