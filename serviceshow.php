<?php
define('MYSITE', true);
include 'db/dbconnect.php';

$title = 'Main';
$css_directory = 'css/main.min.css';
$css_directory2 = 'css/main.min.css.map';
include 'includes/header.php';
include 'includes/navbar.php';
?>

<style>
    .card:hover {
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
        transform: translateY(-5px);
        background-color: #0A2647;
        color: white;
    }

    .showcategoryimg {
        background-image: url('img/services/service_14.jpg');
        object-fit: cover;
        background-repeat: no-repeat;
        background-size: cover;
        opacity: 0.5;
    }

    .sticky {
        position: fixed;
        bottom: 0;
        left: 860px;
        bottom: 10px;
        width: 100%;    
        z-index: 1;
    }
</style>

<body>
    <?php

    if (isset($_GET['category_id'])) {
        $category_id = $_GET['category_id'];
        $sql = "SELECT * FROM `category` WHERE category_id = $category_id";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                $category_id = $row['category_id'];
                $category_name = $row['category_name'];
            }
        }
    } else {

        echo "<script>
        window.location.href='index.php';
        </script>";
    }
    ?>

    <div class="jumbotron jumbotron-fluid bg-c1-4 mb-0">
        <div class="container">
            <h1 class="display-4"><b><?php echo $category_name ?></b></h1>
         
        </div>
    </div>
    <div class="bg-white sticky-top">
        <div class="container mb-3 py-4">


            <?php
         
            $sql = "SELECT * FROM `service` WHERE category_id = $category_id";
            $result = mysqli_query($conn, $sql);
            $numexist = mysqli_num_rows($result);
            if ($numexist > 0) {
                if ($result) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $service_id = $row['service_id'];
                        $service_name = $row['service_name'];
                       
            ?>
                        <a href="serviceshow.php?serviceid=<?php echo $service_id ?>"><button type="button" class="btn btn-outline-c1-1"><?php echo $service_name ?></button></a>
            <?php
                    }
                }
            } else {
                echo '
            <div class="alert alert-danger" role="alert">
                No any Services under ' . $category_name . '
            </div>
            
            ';
            }
            ?>

        </div>
    </div>

    <div class="container">
    
        <div class="row">
            <div class="col-sm-7">
                <div class="">
                    <?php  
                    $price = false;
                    $fetchspgig = "SELECT * FROM `sp_service` where `category_id` = $category_id";
                    $gigresult = mysqli_query($conn, $fetchspgig);
                    while ($gigrow = mysqli_fetch_assoc($gigresult)) {
                        $service_title = $gigrow['service_title'];
                        $category_id = $gigrow['category_id'];
                        $sp_id = $gigrow['sp_id'];
                        $price = $gigrow['price'];
                        $description = $gigrow['description'];
                        if ($gigrow['availability'] == 1) {
                            $availibility = "Yes";
                        } else {
                            $availibility = "No";
                        }

                        $spname = "SELECT * FROM `sp` WHERE sp_id = $sp_id";
                        $spname_result = mysqli_query($conn, $spname);
                        while ($sprow = mysqli_fetch_assoc($spname_result)) {
                            $sp_name = $sprow['sp_name'];
                        }
                        $service_id = $gigrow['service_id'];
                        $servicename = "SELECT * FROM `service` WHERE service_id = $service_id";
                        $servicename_result = mysqli_query($conn, $servicename);
                        while ($servicerow = mysqli_fetch_assoc($servicename_result)) {
                            $service_name = $servicerow['service_name'];
                        }

                    ?>
                        <form action="manage_cart.php" method="post">
                            <div class="media m-4">
                                <div class="media-body col-7">

                                    <span class="text-success" style="text-transform:uppercase;"><?php echo $service_name ?></span>
                                    <hr style="margin:2px;">
                                    <h5 class="mt-0"><?php
                                                        echo $service_title;
                                                        ?></h5>
                                    <h6>Service provider: <?php echo $sp_name; ?></h6>
                                    <h6 class="badge badge-success">4.4 <i class="fa-solid fa-star"></i></h6>
                                    <h6>Starts at <small>&#8377;</small><?php echo $price ?>/-</h6>
                                    <hr style="margin-bottom: 5px;">
                                    <p><?php echo $description ?></p>
                                    <?php echo $service_name ?>
                                    </div>

                                <div class=" ml-5 text-center" style="width:10rem;">
                                    <img src="img/<?php echo $category_id ?>.jpg" style="width:100px; height:100px;object-fit:cover; border-radius:10px" class="card-img-top" alt="...">
                                    <div class="card-body text-center">
                                        <button type="submit" name="add_to_cart" class="card-link btn btn-c1-1" style="border-radius:10px;">Add to Cart</button>
                                        <input type="hidden" name="category_id" value="<?php echo $category_id ?>">
                                        <input type="hidden" name="service_id" value="<?php echo $service_id ?>">
                                        <input type="hidden" name="service_name" value="<?php echo $service_name ?>">
                                        <input type="hidden" name="service_title" value="<?php echo $service_title ?>">
                                        <input type="hidden" name="price" value="<?php echo $price ?>">
                                        <input type="hidden" name="sp_name" value="<?php echo $sp_name; ?>">
                                        <input type="hidden" name="sp_id" value="<?php echo $sp_id; ?>">
                                    </div>
                                </div>
                            </div>
                        </form>
                        <hr>
                        

                    <?php
                       
                    }
                    ?>

                </div>
            </div>
           
            <div class="col-sm-4 sticky">
                <div class="">

            <?php
            
            if (isset($_SESSION['status'])) {
                echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Success! </strong> ' . $_SESSION['status'] . '
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                        </div>';
                unset($_SESSION['status']);
            } elseif (isset($_SESSION['statusfail'])) {
                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Oops! </strong> ' . $_SESSION['statusfail'] . '
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                        </div>';
                unset($_SESSION['statusfail']);
            }
            ?>



                    <div class="row justify-content-around " style="bottom:0; align-items:center;">
                       
                            <a href="mycart.php" class="card-link btn btn-c1-2 px-5 py-3 "><b>View Cart</b></a>
                    </div>

                </div>
            </div>
            
        </div>
    </div>
  
    <script>
        var grandtotal = document.getElementById('grandtotal');
        var myVariable = localStorage.getItem("myVar");
        console.log(myVariable);
        grandtotal.innerText = myVariable;
    </script>

    <?php
    include 'includes/footer.php';
    
    ?>