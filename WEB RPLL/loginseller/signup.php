<?php
    require 'function.php';
    if(isset($_POST["register"])){
        if(registrasi($_POST)>0){
			header("Location: login.php");
			echo "<script> 
            alert('user baru ditambahkan');
            </script>";

        }else {
            echo mysqli_error($conn);
        }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
	<!-- CSS File -->
	<link rel="stylesheet"  type="text/css" href="signup.css">
</head>
<style>
	.photo{
		width: 200px;
	}
</style>
<body>
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
					<div class="carousel-caption">
						
					</div>
				</div>
				<div class="carousel-item animate__animated animate__slideInRight" style="margin-top: -189px;">
					<img id="carousel1" src="..\assets\img\breadcrumb-bg.jpg" class="d-block w-100" alt="..." style="height: 734px";>

				</div>
				<div class="carousel-item animate__animated animate__slideInRight" style="margin-top: -189px;">
					<img id="carousel1" src="..\assets\img\banner1.png" class="d-block w-100" alt="..." style="height: 734px;">

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
			<form action="" method="POST" enctype="multipart/form-data">
				<table>
					<tr>
						<td colspan="2"><h1 style="margin: 10px;color: black; padding-bottom:20px;">Signup</h1></td>
					</tr>
					<tr>
						<td>Nama</td>
						<td class="forminput"><input type="text" name="nama" id="nama" placeholder="your name"></td>
					</tr>
					<tr>
						<td>Usia</td>
						<td class="forminput"><input type="text" name="usia" id="usia" placeholder="your age"></td>
					</tr>
					<tr>
						<td>Alamat</td>
						<td class="forminput"><input type="text" name="alamat" id="alamat" placeholder="your home address"></td>
					</tr>
					<tr>
						<td>Username</td>
						<td class="forminput"><input type="text" name="username" id="username" placeholder="your username"></td>
					</tr>
					<tr>
						<td>Password</td>
						<td class="forminput"><input type="password" name="password" id="password" placeholder="your password"></td>
					</tr>
					<tr>
						<td colspan="2"><input type="checkbox" id="togglePassword">Show Password</td>
					</tr>
					<tr>
						<td>Confirm</td>
						<td class="forminput"><input type="password" name="password2" id="password2" placeholder="confirm your password">
					</tr>
					<tr>
						<td colspan="2"><input type="checkbox" id="togglePassword1">Show Password</td>
					</tr>
					<tr>
						<td colspan="2">Silahkan upload foto anda</td>
					</tr>
					<tr>
						<td colspan="2"><input type="file" class="photo" name="uploadfile" value=""/></td>
					</tr>
					<tr>
						<td colspan="2"><input id="button" name="register" type="submit" value="Signup"></td>
					</tr>
					<tr>
						<td colspan="2"><a href="login.php" style="color:black">Click to Login</a></td>
					</tr>
				</table>
			</form>
		</div>
	</div>
</div>

	<script>
		const togglePassword = document.querySelector('#togglePassword');
		const togglePassword1 = document.querySelector('#togglePassword1');

		const password = document.querySelector('#password');
		const password2 = document.querySelector('#password2');

		togglePassword.addEventListener('click', function (e) {
			// toggle the type attribute
			const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
			password.setAttribute('type', type);
		});

		togglePassword1.addEventListener('click', function (e) {
			// toggle the type attribute
			const type = password2.getAttribute('type') === 'password' ? 'text' : 'password';
			password2.setAttribute('type', type);
		});
	</script>
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

</body>
</html>