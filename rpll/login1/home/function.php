<?php
$conn = mysqli_connect("localhost", "root", "", "login");
function registrasi($data){
    global $conn;
    
	$nama = $_POST['nama'];
	$usia=$_POST['usia'];
	$alamat=$_POST['alamat'];    
    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);

    //cek username
    $result= mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");
    if (mysqli_fetch_assoc($result)) {
        echo "<script> 
        alert('username sudah terdaftar');
        </script>";
        return false;
    }
    //cek password
    if ($password != $password2) {
        echo "<script> 
        alert('password tidak sama');
        </script>";
        return false;
    }
    //enkripsi
    $password = password_hash($password, PASSWORD_DEFAULT);
    mysqli_query($conn, "INSERT INTO user (id,username,password,nama,usia,alamat) VALUES('', '$username', '$password', '$nama','$usia', '$alamat')");
    return mysqli_affected_rows($conn);
}
?>