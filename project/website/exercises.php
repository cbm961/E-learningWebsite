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
	
	$quiz = $_GET['quiz'];
	$grade = $_GET['grade'];
	$op = strtolower($_GET['op']);
	$difficulty = "easy";
	$invalid = false;
	if($grade == "1" || $grade == "2"){
		$difficulty = "easy";
	}
	else if($grade == "3" || $grade == "4"){
		$difficulty = "medium";
	}
	else if($grade == "5"){
		$difficulty = "hard";
	}else{
		$invalid = true;
	}
	$operation = "+";
	if($op == "addition")
		$operation = "+";
	else if($op == "subtraction")
		$operation = "-";
	else if($op == "multiplication")
		$operation = "*";
	else if($op == "division")
		$operation = "/";
	else if($op == "modulo")
		$operation = "%";
	else
		$invalid = true;
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
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
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
		<center>
			<h2>Exercise : <?php echo $quiz; ?> Type : <?php echo $op; ?> Difficulty : <?php echo $difficulty; ?></h2>
			<p class="test-specs">Time:
			<span id="hours"></span><span id="mins"></span><span id="secs"></span> </p>
			<p class="test-specs">no. questions: <span id="no-questions" class="emphasize"></span> </p>
			<h1 id="total"></h1> 
			<div id="test">
				
			</div>
		</center>
	</div>
  <div id="footer">
  <hr style="color:white">
  <p>©2021 COA Academy</p>

   </div>
   
<script>
	<?php if($invalid){ ?>
		alert("Invalid Exercise")
	<?php }else{ ?>
		correctAnswers = [];
		Total = 0;
		QuestionCount = 1;
		totalQuestions = 10
		window.onload = function() {
			generateTest(totalQuestions, "<?php echo $difficulty; ?>", "<?php echo $operation; ?>");
		};
		function quizOver(questionNumber) {
			
			var request = $.ajax({
			  url: "result.php",
			  type: "POST",
			  data: {questions:questionNumber,result : Total,op:"<?php echo $op; ?>",quiz:"<?php echo $quiz; ?>"},
			  dataType: "html"
			});
			request.done(function(msg) {
				document.getElementById("total").innerHTML = "Grade " + Total + "/" + questionNumber+ "<br /> " + msg;
				window.open('./dashboard.php','_self')
			});

			request.fail(function(jqXHR, textStatus) {
				document.getElementById("total").innerHTML = "Grade " + Total + "/" + questionNumber + "<br /> Result Not Saved";
				window.open('./dashboard.php','_self')
			});
			
		}
		function generateTest(questionNumber, difficulty, type) {
			var noQuestions_display = document.getElementById("no-questions");
			noQuestions_display.appendChild(document.createTextNode(questionNumber));
			//quizType(type);
			quizTime(questionNumber);
			generateQuestion(difficulty, type)
		}
		function generateQuestion(difficulty, type){
			if(type == "+") {
				var dragOrInput = getRandomArbitrary(0, 2);
				generateProblem(difficulty, "+", QuestionCount, dragOrInput);
			} else if(type == "-") {
				var dragOrInput = getRandomArbitrary(0, 2);
				generateProblem(difficulty, "-", QuestionCount, dragOrInput);
			} else if(type == "*") {
				var dragOrInput = getRandomArbitrary(0, 2);
				generateProblem(difficulty, "*", QuestionCount, dragOrInput);
			} else if(type == "/") {
				var dragOrInput = getRandomArbitrary(0, 2);
				generateProblem(difficulty, "/", QuestionCount, dragOrInput);
			} else if(type == "%") {
				var dragOrInput = getRandomArbitrary(0, 2);
				generateProblem(difficulty, "%", QuestionCount, dragOrInput);
			}
		}
		function quizTime(questionNumber) {
			var countDownDate = new Date().getTime() + 0.5 * 60 * 1000 * questionNumber //questionNumber*3*60*1000; 
			var myfunc = setInterval(function() {
				var now = new Date().getTime();
				var timeleft = countDownDate - now;
				var hours = Math.floor((timeleft % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
				var minutes = Math.floor((timeleft % (1000 * 60 * 60)) / (1000 * 60));
				var seconds = Math.floor((timeleft % (1000 * 60)) / 1000);
				if(hours < 10) document.getElementById("hours").innerHTML = "0" + hours + ":"
				else document.getElementById("hours").innerHTML = hours + ":"
				if(minutes < 10) document.getElementById("mins").innerHTML = "0" + minutes + ":"
				else document.getElementById("mins").innerHTML = minutes + ":"
				if(seconds < 10) document.getElementById("secs").innerHTML = "0" + seconds + "s"
				else document.getElementById("secs").innerHTML = seconds + "s"
				if(timeleft < 0) {
					clearInterval(myfunc);
					document.getElementById("hours").innerHTML = "";
					document.getElementById("mins").innerHTML = "";
					document.getElementById("secs").innerHTML = "";
					quizOver(questionNumber);
				}
			}, 1000);
			/*document.getElementById("submit-test").addEventListener("click", function() {
				clearInterval(myfunc);
				document.getElementById("hours").innerHTML = ""
				document.getElementById("mins").innerHTML = ""
				document.getElementById("secs").innerHTML = ""
				quizOver(questionNumber);
			});*/
		}
		function generateProblem(difficulty, type, number, dragOrInput) {
			var testbox = document.getElementById("test");
			testbox.innerHTML = ""
			var problemBox = document.createElement("div");
			testbox.appendChild(problemBox);
			var questionNo = document.createElement("h3");
			questionNo.style.textDecoration = "underline";
			
			var submitQuestion = document.createElement("button");
			submitQuestion.id  = "submit-question"
			submitQuestion.className  = "button"
			submitQuestion.innerHTML = "Submit"
			var question = document.createElement("h4");
			var label = document.createElement("label");
			problemBox.appendChild(questionNo);
			problemBox.appendChild(question);
			problemBox.appendChild(label);
			
			QuestionAnswers = generateMathOperation(difficulty, type);
			problemBox.className = "problem-box";
			question.innerHTML = QuestionAnswers[0];
			questionNo.innerHTML = "Problem " + number;
			label.innerHTML = "Your Answer: ";
			correctAnswers[number - 1] = QuestionAnswers[1];
			if(dragOrInput == 0) { //drag and drop style
				var inputbox = document.createElement("div");
				problemBox.appendChild(inputbox);
				var AnswersBox = document.createElement("div");
				problemBox.appendChild(AnswersBox);
				AnswersBox.setAttribute("ondragover", "allowDrop(event)");
				AnswersBox.setAttribute("ondrop", "drop(event)");
				AnswersBox.style.marginLeft = "70px";
				AnswersBox.style.height = "50px";
				inputbox.setAttribute("ondrop", "drop(event)");
				inputbox.setAttribute("ondragover", "allowDrop(event)");
				inputbox.setAttribute("id", "input-drag");
				inputbox.setAttribute("class", "input");
				var AnswersArray = [];
				for(let i = 1; i < 5; i++) {
					var Answer = document.createElement("p");
					Answer.innerHTML = QuestionAnswers[i];
					Answer.setAttribute("id", "Answer" + number + i);
					Answer.setAttribute("draggable", "true");
					Answer.setAttribute("ondragstart", "drag(event)");
					AnswersArray.push(Answer);
				}
				shuffleArray(AnswersArray);
				for(let i = 0; i < AnswersArray.length; i++) {
					console.log(AnswersArray[i]);
					AnswersBox.appendChild(AnswersArray[i]);
				}
			} else { //input-box    
				var inputbox = document.createElement("input");
				inputbox.className = "input";
				problemBox.appendChild(inputbox);
			}
			problemBox.appendChild( document.createElement("br"));
			problemBox.appendChild( document.createElement("br"));
			problemBox.appendChild(submitQuestion);
			
			document.getElementById("submit-question").addEventListener("click", function() {
				inputs = document.querySelectorAll(".input");
				for(let i = 0; i < inputs.length; i++) {
					if(inputs[i].tagName == "DIV") {
						if(inputs[i].childNodes.length != 0) {
							if(inputs[i].childNodes[0].innerHTML == correctAnswers[number-1]) {
								Total += 1;
							}
						}
					} else {
						if(inputs[i].value == correctAnswers[number-1]) {
							Total += 1;
						}
					}
				}
				if(QuestionCount < totalQuestions){
					QuestionCount++;
					generateQuestion(difficulty, type)
				}else{
					document.getElementById("hours").innerHTML = ""
					document.getElementById("mins").innerHTML = ""
					document.getElementById("secs").innerHTML = ""
					quizOver(totalQuestions);
				}
			});
		}
		///////////drag and drop functions/////////////////////
		function drag(ev) {
			ev.dataTransfer.setData("Text", ev.target.id);
		}

		function allowDrop(ev) {
			event.preventDefault();
		}

		function drop(ev) {
			ev.preventDefault();
			var data = ev.dataTransfer.getData("Text");
			ev.target.appendChild(document.getElementById(data));
		}

		function generateMathOperation(difficulty, type) {
			var operation;
			var correctAnswer;
			var badAndwer1;
			var badAndwer2;
			var badAndwer3;
			if(difficulty == "easy") {
				badAnswer1 = getRandomArbitrary(1, 20);
				badAnswer2 = getRandomArbitrary(1, 20);
				badAnswer3 = getRandomArbitrary(1, 20);
				if(type == "+") {
					operand1 = getRandomArbitrary(1, 30);
					operand2 = getRandomArbitrary(1, 30);
					operation = operand1 + " + " + operand2 + " = ?";
					correctAnswer = operand1 + operand2;
				}
				if(type == "-") {
					operand1 = getRandomArbitrary(1, 25);
					operand2 = getRandomArbitrary(1, 20);
					operation = operand1 + " - " + operand2 + " = ?";
					correctAnswer = operand1 - operand2;
				}
			} else if(difficulty == "medium") {
				badAnswer1 = getRandomArbitrary(1, 100);
				badAnswer2 = getRandomArbitrary(-20, 50);
				badAnswer3 = getRandomArbitrary(-2, 20);
				if(type == "+") {
					operand1 = getRandomArbitrary(1, 200);
					operand2 = getRandomArbitrary(1, 200);
					operation = operand1 + " + " + operand2 + " = ?";
					correctAnswer = operand1 + operand2;
				}
				if(type == "-") {
					operand1 = getRandomArbitrary(1, 50);
					operand2 = getRandomArbitrary(1, 30);
					operation = operand1 + " - " + operand2 + " = ?";
					correctAnswer = operand1 - operand2;
				}
				if(type == "*") {
					operand1 = getRandomArbitrary(1, 50);
					operand2 = getRandomArbitrary(1, 10);
					operation = operand1 + " x " + operand2 + " = ?";
					correctAnswer = operand1 * operand2;
				}
				if(type == "/") {
					operand1 = getRandomArbitrary(1, 50);
					operand2 = getRandomArbitrary(1, 20);
					operation = operand1 + " รท " + operand2 + " = ?";
					correctAnswer = operand1 / operand2;
				}
			} else if(difficulty == "hard") {
				badAnswer1 = getRandomArbitrary(1, 200);
				badAnswer2 = getRandomArbitrary(-20, 50);
				badAnswer3 = getRandomArbitrary(-2, 20);
				if(type == "+") {
					operand1 = getRandomArbitrary(1, 500);
					operand2 = getRandomArbitrary(1, 500);
					operation = operand1 + " + " + operand2 + " = ?";
					correctAnswer = operand1 + operand2;
				}
				if(type == "-") {
					operand1 = getRandomArbitrary(1, 500);
					operand2 = getRandomArbitrary(1, 500);
					operation = operand1 + " - " + operand2 + " = ?";
					correctAnswer = operand1 - operand2;
				}
				if(type == "*") {
					operand1 = getRandomArbitrary(1, 1000);
					operand2 = getRandomArbitrary(1, 70);
					operation = operand1 + " * " + operand2 + " = ?";
					correctAnswer = operand1 * operand2;
				}
				if(type == "/") {
					operand1 = getRandomArbitrary(1, 500);
					operand2 = getRandomArbitrary(1, 30);
					operation = operand1 + " รท " + operand2 + " = ?";
					correctAnswer = operand1 / operand2;
				}
				if(type == "%") {
					operand1 = getRandomArbitrary(1, 500);
					operand2 = getRandomArbitrary(1, 20);
					operation = operand1 + " % " + operand2 + " = ?";
					correctAnswer = operand1 % operand2;
				}
			}
			return [operation, correctAnswer, badAnswer1, badAnswer2, badAnswer3];
		}

		function getRandomArbitrary(min, max) {
			return Math.floor(Math.random() * (max - min) + min);
		}

		function shuffleArray(array) {
			for(var i = array.length - 1; i > 0; i--) {
				var j = Math.floor(Math.random() * (i + 1));
				var temp = array[i];
				array[i] = array[j];
				array[j] = temp;
			}
		}
	<?php } ?>
</script>
</body>
</html>