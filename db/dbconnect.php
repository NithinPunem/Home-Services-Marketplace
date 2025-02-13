
<?php

    $server = "localhost";
    $username = "root";
    $password = "";
    $database = "hs";

$conn = mysqli_connect($server, $username, $password, $database);

if (!$conn) {
    die("Sorry! We failed to connect: " . mysqli_connect_error());
}
    else{
        // echo "connection was successful<br>";
    }
?>
