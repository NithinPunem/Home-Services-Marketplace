<?php
define('MYSITE', true);
include '../db/dbconnect.php';

$title = 'Main';
$css_directory = '../css/main.min.css';
$css_directory2 = '../css/main.min.css.map';
include 'includes/header.php';
include 'includes/navbar.php';
?>
<body>
    <div class="container">

        <section class="h-100 gradient-custom">
            <div class="container py-5 h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-lg-10 col-xl-8">
                        <div class="card" style="border-radius: 10px;">
                            <div class="card-header px-4 py-5" style="background-color: #227c70;">

                                <center>
                                    <img src="../img/done_100.svg" alt="order_done" srcset="">
                                    <h4 class="text-light mb-0">Thanks for your Order, <u><?php echo $_SESSION['username'] ?></u>!</h4>
                                </center>
                                
                            </div>
                            <div class="card-body p-4">
                                <center>                                
                                    <a href="order_details.php"><button class="btn btn-c1-1">Order status</button></a>
                                </center>
                                
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <?php
    include '../includes/footer.php';
    
    ?>