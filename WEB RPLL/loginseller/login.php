<?php
session_start();
require 'function.php';

//cek cookie
if ( isset($_COOKIE['id']) && isset($_COOKIE['key'])) {
    $id = $_COOKIE['id'];
    $key = $_COOKIE['key'];
    //ambil username
    $result = mysqli_query($conn, "SELECT username FROM user WHERE id=$id");
    $row = mysqli_fetch_assoc($result);
    //cek cookie and username
    if ($key === hash('sha256', $row['username'])) {
        $_SESSION['login'] = true;
    }
}

//cek sudah login
if ( isset($_SESSION["login"])) {
    header("Location: home/index.php");
exit;
}

if (isset($_POST["login"])) {
    $username=$_POST["username"];
    $password=$_POST["password"];

    $result = mysqli_query($conn, "SELECT * FROM user WHERE username='$username'");
    #cek username
    if (mysqli_num_rows($result) === 1) {
        #cek password
        $row = mysqli_fetch_assoc($result);
        if( password_verify($password, $row["password"]) ){
            //set session
            $_SESSION["login"] = true;
            //cek remember me
                if (isset($_POST['remember'])) {
                    //buat cookie
                    setcookie('id', $row['id'], time()+60);
                    setcookie('key', hash('sha256', $row['username']), time()+60);
                }
			$_SESSION['uname'] = $username;
            header("Location: home/index.php");
            exit;
        }
    }
    $error = true;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv='cache-control' content='no-cache'>
	<meta http-equiv='expires' content='0'>
	<meta http-equiv='pragma' content='no-cache'>

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
	<!-- CSS File -->
	<link rel="stylesheet"  type="text/css" href="tugas.css">
</head>
<body>
<?php 
	if (isset($error)) {
		$message = "USERNAME ATAU PASSWORD SALAH";
        echo "<script type='text/javascript'>alert('$message');</script>";
    } 
?>
<!--Navbar-->
<nav class="navbar fixed-top navbar-expand-lg navbar-light bg-gradient-warning">
  <div class="container-fluid">
  	<a class="navbar-brand" href="../index.php" style="color:black">
      BACK TO MENU
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
      </ul>
        <ul class="navbar-nav">
          <li class="nav-item">

          </li>
        </ul>
    </div>
  </div>
</nav>
<div class="row">
	<!--Carousel-->
	<div class="carousel" id="carousel">
		<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
			<ol class="carousel-indicators">
			<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
			<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
			<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
			</ol>
			<div class="carousel-inner">
				<div class="carousel-item active animate__animated animate__slideInRight" style="margin-top: -189px;">
					<img id="carousel1" src="..\assets\img\banner1.png" class="d-block w-100" alt="..." style="height: 734px;">
				</div>
				<div class="carousel-item animate__animated animate__slideInRight" style="margin-top: -189px;">
					<img id="carousel2" src="..\assets\img\breadcrumb-bg.jpg" class="d-block w-100" alt="..." style="height: 734px;">

				</div>
				<div class="carousel-item animate__animated animate__slideInRight" style="margin-top: -189px;">
					<img id="carousel3" src="..\assets\img\banner1.png" class="d-block w-100" alt="..." style="height: 734px;">

				</div>
			</div>
			<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
			<span class="carousel-control-prev-icon" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
			</a>
			<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
			<span class="carousel-control-next-icon" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
			</a>
		</div>
	</div>

	<div class="login">
		<div class="second">
		<form action="" method="POST">
		<h1 style="margin: 10px;color: black; padding-bottom:20px;">Login</h1>

                Username
                <input type="text" name="username" id="username"><br><br>

                Password
                <input type="password" name="password" id="password">
				<i class="far fa-eye" id="togglePassword"></i><br><br>
                <input type="checkbox" name="remember" id="remember">
                
				<label for="remember"> Remember me</label> <br>
				<input id="button" name="login" type="submit" value="Login"><br><br>

				<a href="signup.php" style="color: black">Create Account</a><br><br>

        </form>
		</div>
	</div>
</div>

    <script>
		const togglePassword = document.querySelector('#togglePassword');
		const password = document.querySelector('#password');

		togglePassword.addEventListener('click', function (e) {
		// toggle the type attribute
		const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
		password.setAttribute('type', type);
		// toggle the eye slash icon
		this.classList.toggle('fa-eye-slash');
	});
	</script>
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

</body>
</html>
