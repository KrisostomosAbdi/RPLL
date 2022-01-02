<?php
session_start();
//cek sudah login
if ( !isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}
?>
<html>
    <head>

    </head>
    <body>
        <h1>INDEX PAGE</h1>
        <a href="logout.php">Log Out</a>
    </body>
</html>