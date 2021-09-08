<?php
	session_start();
	$name= $_SESSION["username"];
	$difficulty= $_GET["difficulty"];
	$limit= $_GET["limit"];
	$type= $_GET["type"];
	$limit = $limit+1;
	include "DBconnection.php";
	$data = array();
	$userQuery = mysqli_query($conn,"select * from users where username='$name'");
	if(mysqli_num_rows($userQuery) == 0){
		$data['msg'] = "Login To Get Questions";
	}else if($difficulty != "easy" && $difficulty != "medium" && $difficulty != "hard"){
		$data['msg'] = "Invalid Difficulty";
	}else if($type != "sy" && $type != "sp"){
		$data['msg'] = "Invalid Operation";
	}else{
		if($type == "sp"){
			$getQuestions = mysqli_query($conn,"select word from spelling where difficulty='$difficulty' ORDER BY rand() limit $limit");
			$count = 0;
			while($question = mysqli_fetch_assoc($getQuestions )){
				$data[$count]['correctAnswer'] = $question['word'];
				$data[$count]['badAndwer1'] = str_shuffle($question['word']);
				$data[$count]['badAndwer2'] = str_shuffle($question['word']);
				$count++;
			}
		}	
		else{
			$getQuestions = mysqli_query($conn,"select word,synonym from synonyms where difficulty='$difficulty' ORDER BY rand() limit $limit");
			$count = 0;
			while($question = mysqli_fetch_assoc($getQuestions )){
				$data[$count]['word'] = $question['word'];
				$data[$count]['correctAnswer'] = $question['synonym'];
				$getRandomWords =  mysqli_query($conn,"select word from spelling ORDER BY rand() limit 2");
				$wcount = 0;
				while($wordq = mysqli_fetch_assoc($getRandomWords)){
					if($wcount == 0){
						$wcount = 1;
						$data[$count]['badAndwer1'] = $wordq['word'];
					}else{
						$data[$count]['badAndwer2'] = $wordq['word'];
					}
				}
				$count++;
			}
		}
	}
	echo json_encode($data);
?>