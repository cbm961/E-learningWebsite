<?php
	session_start();
	include "DBconnection.php";
	if(isset($_SESSION["username"])){
		header("Location: ./dashboard.php");
		exit();
	}
	if(isset($_POST['submit'])) {
		$fullname = $_POST['name'];
		$username = $_POST['user'];
		$password = $_POST['password'];
		$cpassword = $_POST['cpassword'];
		$grade = $_POST['grade'];
		if(empty($name)) {
			$err_msg = "name is required";
		}
		if(empty($username)) {
			$err_msg = "username is required";
		}else if(empty($password)){
			$err_msg = "password is required";
		}else if($password != $cpassword){
			$err_msg = "password doesn't match";
		}else {
			$sql_query = "INSERT INTO users (username, password, fullname, grade) VALUES ('$username','$password', '$fullname', '$grade')";
			$result = mysqli_query($conn, $sql_query);
			if($result) {
				$_SESSION["username"] = $username;
				header("Location: ./dashboard.php");
				exit();
			}else {
				$err_msg = "Cannot create account try again later";
			}
		}
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
        <li><a href="./login.php">Sign in</a></li>
        <li><a href="./signup.php">Join us</a></li>
    </ul>
    </div>
  </div>
  
  <div class="banner-content-sub">
	<h1>Join US</h1>
		<div class="div-100">
			<div class="content">
				<form class="form-style" action="" method="POST">
					<?php 
						if(strlen(@$err_msg) > 0){
							?>
							<div class="alert">
							  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
							  <?php echo $err_msg; ?>
							</div>
							<?php 
						}
					?>

					<input type="text" class="form-input" name="name" placeholder="Full Name" required/>
					<input type="text" class="form-input" name="user" placeholder="Email" required/>
					<input type="password" class="form-input" name="password" placeholder="**********" required/>
					<input type="password" class="form-input" name="cpassword" placeholder="**********" required/>
					<select name="grade"  class="form-input">
					  <option value="1">Grade 1</option>
					  <option value="2">Grade 2</option>
					  <option value="3">Grade 3</option>
					  <option value="4">Grade 4</option>
					  <option value="5">Grade 5</option>
					  </option>
					</select>
					<div class="text-center">
						<input type="submit" value="Join" name="submit" class="form-btn-2" />
					</div>
					<hr />
					<div class="login_register_link">
						Have An Account<a href="login.php" class="link">Login</a>
					</div>
				</form>
			</div>
		</div>
	</div>
  <div id="footer">
  <hr style="color:white">
  <p>©2021 COA Academy</p>

   </div>
</body>
</html>