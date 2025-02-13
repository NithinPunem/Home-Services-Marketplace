<?php

session_start();

unset($_SESSION['sp_loggedin']);

session_destroy();

header("location: ../index.php");
exit;
?>