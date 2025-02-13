<?php
if(!defined('MYSITE')){
  header('location: ../customer_index.php');
  die();
}
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
  header("location: ../index.php");
  exit;
}
?>


<!doctype html>
<html lang="en">

<head>
   
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    
    <link rel="stylesheet" href="<?= $css_directory ?> ">
    <link rel="stylesheet" href="<?= $css_directory2 ?> ">  

  
    
        <title> <?php echo $title; ?> - Home services</title>
</head>
