<?php

if(isset($_POST["lgbtn"])){
	
	if(isset($_POST["email"])&isset($_POST["password"])){
		require_once 'src/my_file_check.php';
		
		 $resvalue = verifylogin($_POST["email"],$_POST["password"]);
		
		 if($resvalue!=null){
			 session_start();
			 if($resvalue[1]==1){
				 $_SESSION["id"]=$resvalue[0];
				 //$_SESSION["user"]="power";
				 $_SESSION["logid"]=insertworkerlog($resvalue[0]);
				header("location:src/admindashboard.php");
				mysqli_close($GLOBALS['dbconnect']);
				}else{
				 $_SESSION["id"]=$resvalue[0];
				 $_SESSION["logid"]=insertworkerlog($resvalue[0]);
				 header("location:src/userdashboard.php");
				 mysqli_close($GLOBALS['dbconnect']);
		}
		 }else{
			 
			 header("location:form-login.php?status=404");
		 }
		
	}
}

?>