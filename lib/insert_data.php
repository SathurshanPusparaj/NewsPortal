<?php
	
	function insert_data($connection,$tname,$column,$values){
		$sql = "insert into ".$tname."(";
		
		for($i=0;$i<sizeof($column)-1;$i++){
			$sql = $sql.$column[$i].",";
		}
		$sql = $sql.$column[sizeof($values)-1].") values (";
		
		for($i=0;$i<sizeof($values)-1;$i++){
			$sql = $sql."'".$values[$i]."',";
		}
		$sql = $sql."'".$values[sizeof($values)-1]."')";
		
		$result = mysqli_query($connection,$sql);
		
		if(!$result){
			echo mysqli_error($connection);
		}else{
			echo '<script type="text/javascript"> alert("registered sucessfully") </script>';
		}
	}
	
?>