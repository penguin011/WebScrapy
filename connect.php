<?php 

 
$UserAgent = 'Mozilla/4.0 (Compatible; MSIE 8.0; Windows NT 5.2; Trident/6.0)';

$comando  = "curl -s 'https://www.wyylde.com/rest/authenticate?version=4.1.0' -X PUT -H 'Origin: https://www.wyylde.com' -H 'Accept-Encoding: gzip, deflate, br' -H 'Accept-Language: en-us, en;q=1.0,fr-ca, fr;q=0.5,pt-br, pt;q=0.5,es;q=0.5' -H 'User-Agent: ".$UserAgent."' -H 'Content-Type: application/json;charset=UTF-8' -H 'Accept: application/json, text/plain, */*' -H 'Referer: https://www.wyylde.com/'  -H 'Connection: keep-alive' --data-binary '{\"login\":\"".$_POST{'user'}."\",\"password\":\"".$_POST{'pass'}."\",\"useCookie\":0}' --compressed  --insecure";



$sal = shell_exec($comando);

$ret = json_decode( $sal);
    
if( $ret->status == 'success' ){
	/*Connect OK */
	//echo "ok";

	$token = $ret->data->token;

	//$ret->url =  "./main.php",
	//$ret->urtoken = $ret->data->token;

	/* Obtiene las busqueda guardadas del usuario */
   /**********************************************/
	$comando  = "curl 'https://www.wyylde.com/rest/search' -H 'Pragma: no-cache' -H 'Accept-Encoding: gzip, deflate, br' -H 'Accept-Language: es-ES,es;q=0.8,en;q=0.6' -H 'Authorization: Bearer ".$token."' -H 'Accept: application/json, text/plain, */*'  -H 'User-Agent: ".$UserAgent."' -H 'Connection: keep-alive' -H 'If-Modified-Since: Mon, 26 Jul 1997 05:00:00 GMT' -H 'X-version: 1510139124622' -H 'Referer: https://www.wyylde.com/dashboard/wall' --compressed";
	 
	$ret_search = json_decode( shell_exec($comando));
  /**********************************************/

	/* Obtiene las busqueda guardadas del usuario */
   /**********************************************/
	$comando  = "curl 'https://www.wyylde.com/rest/my/contacts?online=0' -H 'Pragma: no-cache' -H 'Accept-Encoding: gzip, deflate, br' -H 'Accept-Language: es-ES,es;q=0.8,en;q=0.6' -H 'Authorization: Bearer ".$token."' -H 'Accept: application/json, text/plain, */*'  -H 'User-Agent: ".$UserAgent."' -H 'Connection: keep-alive' -H 'If-Modified-Since: Mon, 26 Jul 1997 05:00:00 GMT' -H 'X-version: 1510139124622' -H 'Referer: https://www.wyylde.com/dashboard/wall' --compressed";
	 
	$ret_contacts = json_decode( shell_exec($comando));
  /**********************************************/


   header('Content-Type: application/json');
   //echo json_encode($ret);
   echo json_encode(array("status"=> "success", "url"=>"./main.php","token"=>$token,"search"=> $ret_search->data->search, "contacts"=> $ret_contacts->data->users ));
 
		
}
else{
	/*Connect NO OK */
    header('Content-Type: application/json');
    echo json_encode(array("status"=> "failed"  ));

}

 
?>