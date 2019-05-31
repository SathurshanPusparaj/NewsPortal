<?php
	
	require_once 'src/my_file_check.php';
	
	$final = check_news();
	
	$row = mysqli_fetch_array($final,MYSQLI_ASSOC);
	
	if($row["path"]!=null){
		echo $row["path"];
	}else{
		echo "by";
	}

?>