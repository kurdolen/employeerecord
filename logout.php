<?php
$_SESSION['isLoggedIn'] = false;
$inputPassword = "";
header("Location: login.php?message=You+have+logged+out+successfully");
exit();
?>