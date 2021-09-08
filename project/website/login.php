<?php	
	session_start();

	include "DBconnection.php";

	if(isset($_SESSION["username"])){
		header("Location: ./dashboard.php");
		exit();
	}
	if(isset($_POST['user']) && isset($_POST['password'])) {
		$username = $_POST['user'];
		$password = $_POST['password'];
		if (empty($username)) {
			$err_msg = "error=username is required";
		}else if(empty($password)){
			$err_msg = "password is required";
		}else {
			$sql_query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
			$result = mysqli_query($conn, $sql_query);
			if(mysqli_num_rows($result) === 1) {
				$row = mysqli_fetch_assoc($result);
				echo "Logged in!";
				$_SESSION["username"] = $row['username'];
				header("Location: ./dashboard.php");
				exit();
			}else {
				$err_msg = "Incorrect username or password";
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
	<h1>Login</h1>
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

					<input type="text" class="form-input" name="user" placeholder="Email" required/>
					<input type="password" class="form-input" name="password" placeholder="**********" required/>

					<div class="text-center">
						<input type="submit" value="Login" name="submit" class="form-btn-2" />
					</div>
					<hr />
					<div class="login_register_link">
						Don't Have An Account<a href="signup.php" class="link">Create Account</a>
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