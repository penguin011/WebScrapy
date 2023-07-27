<!doctype html>
<html lang="en">
 <head>
  <meta charset="UTF-8">
  <meta name="Generator" content="">
  <meta name="Author" content="">
  <meta name="Keywords" content="">
  <meta name="Description" content="">

 <script src="http://code.jquery.com/jquery-1.7.2.min.js"></script>
<script src="https://netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.2.1/css/bootstrap-combined.min.css" />

  <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
  <link rel="stylesheet" href="./my_css.css">
  <title>Welcome back</title>
 </head>
 <body>
  


<div class="container">
 

    <div class="row">
        <div class="col-sm-8 col-sm-offset-2"> 
            <div class="form-login">
            <h4>Welcome back.</h4>
            <input type="text" id="userName" class="form-control input-sm chat-input" placeholder="username" />
            </br>
            <input type="password" id="userPassword" class="form-control input-sm chat-input" placeholder="mot de" />
            </br>
            <div class="wrapper">
            <span class="group-btn">     
                <a href="#" id="target" class="btn btn-primary btn-md">login <i class="fa fa-sign-in"></i></a>
            </span>
            </div>
            </div>
        
<div class="row">
	<div id="error" class="col-sm-8 col-sm-offset-2"> 
	</div>
</div>

        </div>
    </div>
</div>



<script>
$( "#target" ).click(function() {
 
data = { user: $( "#userName" ).val(), pass: $( "#userPassword" ).val() } ;
//data = { user: 'sara.lopez', pass: '12345678'} ;  //Borrar!!!!!

 $.ajax({
  type: "POST",
  url: './connect.php',
  data: data,
  dataType:"json",
  success: function(response)
   {
				console.log("connect:", response);
				//console.log( response['url']);
				
				

				if ( response['status'] == 'success')
				{

				//search = JSON.stringify(response['search']);
				search = response['search'];

  				//console.log('search1>' +  search + '<');

//search= search.replace(/^"/g, "'");
//search= search.replace(/"$/g, "'");


				//search= search.replace(/"/g, "'");


  					//console.log('search2', search );
					//console.log('JSON.stringify', search ) ;
					data = {"token": response['token'], "user": data.user, "datetoken":new Date().getTime() , "contacts":response['contacts'] };
 
				/* Agrupa las consultas */
 				 $.each(response['search'], function( index, value ) {
					  console.log( index + ": " , value );
					  data['search_id_' + index] = value.id;
					  data['search_name_' + index] = value.name;
 				});
  					console.log('----->data',  data );

 
					url_redirect({url: response['url'],
												method: "post",
												headers: {
															        // Make sure to send as JSON
																	'Content-Type': 'application/json;charset=UTF-8',
																	'Accept' : 'application/json, text/plain, */*',
																    },
												//contentType: "application/json",
												data: data,
                 });
				}
				else{
					$('#error').html('Error. Invalid username and password');
				}
 
			 //$.redirect(response.url, {'token': response.token});
			 //$.redirect("./main.php",{ user: "johnDoe", password: "12345"}); 

          },
 
error: function(jqXHR, textStatus, errorThrown) {
			  console.log( 'Could not get posts, server response: ' + textStatus + ': ' + errorThrown );
            
        },
 always: function(response)
         {
				console.log('-------->',jqXHR.error());
		 }
		  
});
 


});


function url_redirect(options){
                 var $form = $("<form />");
                 
                 $form.attr("action",options.url);
                 $form.attr("method",options.method);
                 
                 for (var data in options.data)
                 $form.append('<input type="hidden" name="'+data+'" value="'+options.data[data]+'" />');
                  
                 $("body").append($form);
                 $form.submit();
            }

</script>
 
 
 </body>



</html>
