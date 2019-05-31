<?php
define('SERVER','localhost');
define('USER','root');
define('PASSWORD','');
define('DATABASE','newsportal');

$connection = mysqli_connect(SERVER,USER,PASSWORD,DATABASE);

function getconnection(){
	
	if($GLOBALS['connection']!=null){
		return $GLOBALS['connection'];
	}else{
		$GLOBALS['connection'] = null;
		return $GLOBALS['connection'];
	}
}
	
?>
