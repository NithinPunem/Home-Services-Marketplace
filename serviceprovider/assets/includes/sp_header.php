<?php
// if (!defined('MYSITE')) {
//     header('location: ../../sp_index.php');
//     die();
// }

session_start();

if (!isset($_SESSION['sp_loggedin']) || $_SESSION['sp_loggedin'] != true) {
    header("location: ../index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  
    <meta charset="utf-8">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="keywords" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

   
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  
    <link rel="stylesheet" href="assets/css/quicksand.css">
    <link rel="stylesheet" href="assets/css/style.css">
  
    <link rel="stylesheet" href="assets/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/css/fontawesome.css">
 
    <link rel="stylesheet" href="assets/css/chartist.min.css">
   
    <link rel="stylesheet" href="assets/css/jquery-jvectormap-2.0.2.css">
   
    <link rel="stylesheet" href="assets/css/chartist.min.css">
   
    <link rel="stylesheet" href="assets/js/calendar/bootstrap_calendar.css">
    
    <link rel="stylesheet" href="assets/css/dataTables.bootstrap4.min.css">
   
    <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
   
    <link rel="stylesheet" href="assets/css/switchery.min.css">
    
    <link rel="stylesheet" href="assets/css/bootstrap-tagsinput.css">


    <title><?php echo $title; ?> - HS</title>
</head>

<body>
    
    <div class="loader-wrapper">
        <div class="loader-circle">
            <div class="loader-wave"></div>
        </div>
    </div>
    <div class="container-fluid">

        <div class="row header shadow-sm">
            <div class="col-sm-3 pl-0 text-center header-logo">
                <div class="bg-theme mr-3 pt-3 pb-2 mb-0" style="">
                    <h3 class="logo"><a href="index.php" class="text-secondary logo"><i class="fa fa-institution"></i>
                            <span class="small"> <b>HS </b> workspace</span></a></h3>
                </div>
            </div>
            <div class="col-sm-9 header-menu pt-2 pb-0">
                <div class="row">

                  
                    <div class="col-sm-4 col-8 pl-0">
                    
                        <span class="menu-icon" onclick="toggle_sidebar()">
                            <span id="sidebar-toggle-btn"></span>
                        </span>
                     
                    </div>
                    
                    <div class="col-sm-8 col-4 text-right flex-header-menu justify-content-end">
                        
                        <div class="search-rounded mr-3">
                            <input type="text" class="form-control search-box" placeholder="Enter keywords.." />
                        </div>
                        <div class="mr-4">
                            <a class="" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img src="assets/img/default-avatar.jpg" alt="Adam" class="rounded-circle" width="40px" height="40px">
                            </a>
                            <div class="dropdown-menu dropdown-menu-right mt-13" aria-labelledby="dropdownMenuLink">
                                <a class="dropdown-item" href="#"><i class="fa fa-user pr-2"></i> Profile</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#"><i class="fa fa-th-list pr-2"></i> Tasks</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#"><i class="fa fa-book pr-2"></i> Projects</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="logout.php"><i class="fa fa-power-off pr-2"></i> Logout</a>
                            </div>
                        </div>
                    </div>
                  
                </div>
            </div>
           
        </div>
       
        <div class="row main-content">
       
            <div class="col-sm-3 col-xs-6 sidebar pl-0">
                <div class="inner-sidebar mr-3">
                  
                    <div class="avatar text-center">
                      
                        <img src="assets/img/default-avatar.jpg" alt="" class="img-fluid  rounded-circle" />
                        <p><strong>
                                <?php
                                echo $_SESSION['sp_username'];
                                ?>
                            </strong></p>
                        <span class="text-primary small"><strong>Serivce Provider</strong></span>
                    </div>
                  
                    <div class="sidebar-menu-container">
                        <ul class="sidebar-menu mt-4 mb-4">

                            <li class="parent">
                                <a href="sp_index.php" class=""><i class="fa fa-user mr-3"></i>
                                    <span class="none">My Desk </span>
                                </a>
                            </li>
                            <li class="parent">
                                <a href="gig_add.php" class=""><i class="fa fa-puzzle-piece mr-3"></i>
                                    <span class="none">Make service details</span>
                                </a>
                            </li>
                            <li class="parent">
                                <a href="gig_view.php" class=""><i class="fa fa-cogs mr-3"></i>
                                    <span class="none">View your service details</span>
                                </a>
                            </li>
                            <li class="parent">
                                <a href="order_view.php" class=""><i class="fa fa-check mr-3"></i>
                                    <span class="none">Orders </span>
                                </a>
                            </li>
                        
                        </ul>
                    </div>
                   
                </div>
            </div>
         