<?php
	session_start();
	$name= $_SESSION["username"];
	include "DBconnection.php";

	$userQuery = mysqli_query($conn,"select * from users where username='$name'");
	if(mysqli_num_rows($userQuery) == 0){
		echo "Login To Save Results";
	}else{
		$result = $_POST['result'];
		$op = $_POST['op'];
		$questions = $_POST['questions'];
		$quiz = $_POST['quiz'];
		$addRes = mysqli_query($conn,"INSERT INTO results(username,result,total,op,subject)VALUES('$name','$result','$questions','$op','$quiz')");
		if($addRes)
			echo "Result Saved Successfully";
		else
			echo "cannot save result";
	}
?>