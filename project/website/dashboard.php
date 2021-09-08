<?php
	session_start();
	include "DBconnection.php";
	if(!isset($_SESSION["username"])){
		header("Location: ./login.php");
		exit();
	}
	$name= $_SESSION["username"];
	$userQuery = mysqli_query($conn,"select * from users where username='$name'");
	if(mysqli_num_rows($userQuery) == 0){
		header("Location: ../logout.php");
	}else{
		$userData = mysqli_fetch_assoc($userQuery);
		$grade = $userData['grade'];
		$fullname = $userData['fullname'];
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>COAcademy</title>
  <link rel="stylesheet" type="text/css"  href="style.css">

  <link rel="icon" href="images/logo.png" type="image/icon type">
</head>

<body>

  <div id="header">
    <a href="#"><h1>COA Academy</h1></a>
    <div id="nav">
      <ul>
        <li>Welcome <b><?php echo $fullname; ?></b> Grade <?php echo $grade; ?></li>
        <li><a href="./logout.php">Logout</a></li>
    </ul>
    </div>
  </div>
  
	<div class="container">
		<h1 id="courses">Lessons<hr></h1>
	<div id="subject-container">
		<div>
		<h2 style="margin-left: 30px">Mathematics</h2>
			<div class="content" id="math-lesson">
		</div>
		</div>

	<div>
		<h2 style="margin-left: 30px">English</h2>
				<div	class="content" id="eng-lesson">
		</div>
	</div>

	</div>
	</div>


	<div id="specific-lesson" style="display:none; margin-top: 100px;">
		<iframe id="video" style=" display: block; margin: 0 auto; height: 500px; width: 1000px; " width="800" height="500" src="" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

			<div id="description" class="subject-description">
			</div>

		
   </div>


	<div class="container">
		<h1 id="courses">My courses<hr></h1>

<div id="subject-container">
<div>
  <h1>Mathematics</h1>
  <div class="subject">
    <img src="images/maths.png" width="250px" height="250px">
    <div class="content">
      <ul>
        <li id="Addition"><img src="images/add-file-button.png" width="30px"><a href="./exercises.php?grade=<?php echo $grade; ?>&quiz=math&op=Addition" >Addition</a></li>
        <li id="Subtraction"><img src="images/negative-sign.png" width="30px"><a href="./exercises.php?grade=<?php echo $grade; ?>&quiz=math&op=Subtraction">Subtraction</a></li>
        <li id="Multiplication"><img src="images/cancel.png" width="30px"><a href="./exercises.php?grade=<?php echo $grade; ?>&quiz=math&op=Multiplication"> Multiplication</a></li>
        <li id="Division"><img src="images/division.png" width="30px"><a href="./exercises.php?grade=<?php echo $grade; ?>&quiz=math&op=Division"> Division</a></li>
        <li id="Modulo"><img src="images/discount.png" width="30px"><a href="./exercises.php?grade=<?php echo $grade; ?>&quiz=math&op=Modulo"> Modulo</a></li>
      </ul>
    </div>
  </div>
  
</div>

<div>
  <h1>English</h1>
  <div class="subject">
    <img src="images/knowledge.png" width="250px" height="250px">
    <div class="content">
      <ul>
        <li><img src="images/grammar.png" width="50px"> <a href="./exercises_eng.php?grade=<?php echo $grade; ?>&quiz=eng&op=Spelling">Spelling</a></li>
        <li><img src="images/book.png" width="40px"><a href="./exercises_eng.php?grade=<?php echo $grade; ?>&quiz=eng&op=Synonyms">Synonyms</a></li>
        
      </ul>
    </div>
  </div></div>
  
  <br />
  <br />
</div>

<h1 id="courses">My progress<hr></h1>
<div id="progress">
<div>
  <h1>Mathematics</h1>
  <table class="progress">
	<tr>
		<th>Exercise</th>
		<th>Total</th>
		<th>Obtained</th>
		<th>Date Time</th>
	</tr>
	<tr>
		<?php 
			$quizQ = mysqli_query($conn,"select * from results where username='$name' and subject='math' and op='addition' ORDER BY ID DESC LIMIT 1");
			if(mysqli_num_rows($quizQ) == 0){
				echo "<td>Addition</td>";
				echo "<td>-</td>";
				echo "<td>-</td>";
				echo "<td>-</td>";
			}else{
				$quizData = mysqli_fetch_assoc($quizQ);
				echo "<td>Addition</td>";
				echo "<td>" . $quizData['total'] . "</td>";
				echo "<td>" . $quizData['result'] . "</td>";
				echo "<td>" . $quizData['datetime'] . "</td>";
			}
			
		?>
	</tr>
	<tr>
		<?php 
			$quizQ = mysqli_query($conn,"select * from results where username='$name' and subject='math' and op='subtraction' ORDER BY ID DESC LIMIT 1");
			if(mysqli_num_rows($quizQ) == 0){
				echo "<td>Subtraction</td>";
				echo "<td>-</td>";
				echo "<td>-</td>";
				echo "<td>-</td>";
			}else{
				$quizData = mysqli_fetch_assoc($quizQ);
				echo "<td>Subtraction</td>";
				echo "<td>" . $quizData['total'] . "</td>";
				echo "<td>" . $quizData['result'] . "</td>";
				echo "<td>" . $quizData['datetime'] . "</td>";
			}
			
		?>
	</tr>
	<tr>
		<?php 
			$quizQ = mysqli_query($conn,"select * from results where username='$name' and subject='math' and op='multiplication' ORDER BY ID DESC LIMIT 1");
			if(mysqli_num_rows($quizQ) == 0){
				echo "<td>Multiplication</td>";
				echo "<td>-</td>";
				echo "<td>-</td>";
				echo "<td>-</td>";
			}else{
				$quizData = mysqli_fetch_assoc($quizQ);
				echo "<td>Multiplication</td>";
				echo "<td>" . $quizData['total'] . "</td>";
				echo "<td>" . $quizData['result'] . "</td>";
				echo "<td>" . $quizData['datetime'] . "</td>";
			}
			
		?>
	</tr>
	<tr>
		<?php 
			$quizQ = mysqli_query($conn,"select * from results where username='$name' and subject='math' and op='division' ORDER BY ID DESC LIMIT 1");
			if(mysqli_num_rows($quizQ) == 0){
				echo "<td>Division</td>";
				echo "<td>-</td>";
				echo "<td>-</td>";
				echo "<td>-</td>";
			}else{
				$quizData = mysqli_fetch_assoc($quizQ);
				echo "<td>Division</td>";
				echo "<td>" . $quizData['total'] . "</td>";
				echo "<td>" . $quizData['result'] . "</td>";
				echo "<td>" . $quizData['datetime'] . "</td>";
			}
			
		?>
	</tr>
	<tr>
		<?php 
			$quizQ = mysqli_query($conn,"select * from results where username='$name' and subject='math' and op='modulo' ORDER BY ID DESC LIMIT 1");
			if(mysqli_num_rows($quizQ) == 0){
				echo "<td>Modulo</td>";
				echo "<td>-</td>";
				echo "<td>-</td>";
				echo "<td>-</td>";
			}else{
				$quizData = mysqli_fetch_assoc($quizQ);
				echo "<td>Modulo</td>";
				echo "<td>" . $quizData['total'] . "</td>";
				echo "<td>" . $quizData['result'] . "</td>";
				echo "<td>" . $quizData['datetime'] . "</td>";
			}
			
		?>
	</tr>
  </table>
</div>
<div>
  <h1>English</h1>
  <table class="progress">
	<tr>
		<th>Exercise</th>
		<th>Total</th>
		<th>Obtained</th>
		<th>Date Time</th>
	</tr>
	<tr>
		<?php 
			$quizQ = mysqli_query($conn,"select * from results where username='$name' and subject='eng' and op='spelling' ORDER BY ID DESC LIMIT 1");
			if(mysqli_num_rows($quizQ) == 0){
				echo "<td>Spelling</td>";
				echo "<td>-</td>";
				echo "<td>-</td>";
				echo "<td>-</td>";
			}else{
				$quizData = mysqli_fetch_assoc($quizQ);
				echo "<td>Spelling</td>";
				echo "<td>" . $quizData['total'] . "</td>";
				echo "<td>" . $quizData['result'] . "</td>";
				echo "<td>" . $quizData['datetime'] . "</td>";
			}
			
		?>
	</tr>
	<tr>
		<?php 
			$quizQ = mysqli_query($conn,"select * from results where username='$name' and subject='eng' and op='synonyms' ORDER BY ID DESC LIMIT 1");
			if(mysqli_num_rows($quizQ) == 0){
				echo "<td>Synonyms</td>";
				echo "<td>-</td>";
				echo "<td>-</td>";
				echo "<td>-</td>";
			}else{
				$quizData = mysqli_fetch_assoc($quizQ);
				echo "<td>Synonyms</td>";
				echo "<td>" . $quizData['total'] . "</td>";
				echo "<td>" . $quizData['result'] . "</td>";
				echo "<td>" . $quizData['datetime'] . "</td>";
			}
			
		?>
	</tr>
  </table>
  <br /> <br /> <br />
</div>

</div>
	</div>
  <div id="footer">
  <hr style="color:white">
  <p>©2021 COA Academy</p>

   </div>
   
   <script>
  window.onload =function() {
    let PHPgrade = <?php echo($grade) ?>;
    var grade;
    if ( PHPgrade ==1 || PHPgrade ==2) {
      grade = "easy";
    }
    else if (PHPgrade ==3 || PHPgrade ==4 ) {
      grade = "medium";
    }
    else if (  PHPgrade == 5 ) {
      grade = "hard";
    }

    gradeShow(grade);
		LessonsShow(grade);
}


function gradeShow(difficulty){
  add = document.getElementById("Addition");
  sub = document.getElementById("Subtraction");
  mult = document.getElementById("Multiplication");
  div = document.getElementById("Division");
  mod = document.getElementById("Modulo");
  if (difficulty=="easy"){
    add.removeAttribute("id");
    sub.removeAttribute("id");
  }
  if (difficulty=="medium"){
    add.removeAttribute("id");
    sub.removeAttribute("id");
    mult.removeAttribute("id");
    div.removeAttribute("id");
    
  }
  if (difficulty=="hard"){
    add.removeAttribute("id");
    sub.removeAttribute("id");
    mult.removeAttribute("id");
    div.removeAttribute("id");
    mod.removeAttribute("id");
    
    
  }
}

	function LessonsShow(difficulty) {
			var eng = document.getElementById("eng-lesson");
			var math = document.getElementById("math-lesson");

			var add = document.createElement("button");
			add.innerHTML = "Addition";
			add.setAttribute("class", "button");
			add.addEventListener("click", Lesson);

			var sub = document.createElement("button");
			sub.innerHTML = "Subtraction";
			sub.setAttribute("class", "button");
			sub.addEventListener("click", Lesson);
	

			var mult = document.createElement("button");
			mult.innerHTML = "Multiplication";
			mult.setAttribute("class", "button");
			mult.addEventListener("click", Lesson);

			var div = document.createElement("button");
			div.innerHTML  = "Division";
			div.setAttribute("class", "button");
			div.addEventListener("click", Lesson);

			var mod = document.createElement("button");
			mod.innerHTML = "Modulo";
			mod.setAttribute("class", "button");
			mod.addEventListener("click", Lesson);

			var synonyms = document.createElement("button");
			synonyms.innerHTML= "Synonyms";
			synonyms.setAttribute("class", "button");
			synonyms.addEventListener("click", Lesson);

			var spelling = document.createElement("button");
			spelling.innerHTML = "Spelling";
			spelling.setAttribute("class", "button");
			spelling.addEventListener("click", Lesson);


			if (difficulty=="easy"){
					math.appendChild(add);
					math.appendChild(sub);
					eng.appendChild(synonyms);
					eng.appendChild(spelling);
			}
			if (difficulty=="medium"){
				math.appendChild(add);
				math.appendChild(sub);
				math.appendChild(mult);
				math.appendChild(div);
					eng.appendChild(synonyms);
					eng.appendChild(spelling);
				
			}
			if (difficulty=="hard"){
				math.appendChild(add);
					math.appendChild(sub);
					math.appendChild(mult);
					math.appendChild(div);
					math.appendChild(mod);
					eng.appendChild(synonyms);
					eng.appendChild(spelling);
				
				
			}

	}

	function getLesson(subject) {
		var ajax = new XMLHttpRequest();

		ajax.onreadystatechange = function() {
			if (ajax.readyState == 4) {
				if (ajax.status == 200) {
						var response = ajax.responseText;	
							var lesson = JSON.parse(response);
							var biggerContainer= document.getElementById("specific-lesson");
				      var container = document.getElementById("description");
							var video = document.getElementById("video");
							video.src = lesson.url;
							biggerContainer.style.display = 'block';
							container.innerHTML =  "<h1>"+ subject + "</h1>"+ lesson.content;
							
		
				}
				else {
				console.log("error occured");
				}

			} 
			


		}

		
		var URL = "lesson.php?lesson" + "=" + subject;

		ajax.open("get", URL , true);

		ajax.send();


	}

	function Lesson() {
		var LessonName = this.innerHTML;
		getLesson(LessonName);
	
	}


</script>
</body>
</html>