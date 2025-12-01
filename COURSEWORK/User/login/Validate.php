<?php
$ActualPassword = "1234";
if ($_POST['password']== $ActualPassword) {
    session_start();
    $_SESSION["Authorised"] = "Y";
    header("Location: ../index.php");
} else {
    header("Location: WrongPassword.php");
}