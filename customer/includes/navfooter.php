<?php
if (!defined('MYSITE')) {
    header('location: ../index.php');
    die();
}
?>

<nav class="container-fluid bg-c1-1" style="height:250px;">

  
    <footer class="page-footer font-small blue pt-4">

       
        <div class="container-fluid text-center text-md-left">

           
            <div class="row">

                
                <div class="col-md-6 mt-md-0 mt-3">

                   
                    <a class="navbar-brand" href=""> <img src="../img/mainlogo.png" style="width:170px;" alt="Logo"> </a>

                   

                </div>
                

                <hr class="clearfix w-100 d-md-none pb-3">

               
                <div class="col-md-3 mb-md-0 mb-3">

                    
                    <h5 class="text-uppercase text-light">Links</h5>

                    <ul class="list-unstyled">

                        <li>
                            <a href="customer_index.php" class="text-light">Home</a>
                        </li>
                       
                        <li>
                            <a href="../sp_signup.php" class="text-light">Register as a Service Provider</a>
                        </li>
                        <li>
                            <a href="logout.php" class="text-light">Logout</a>
                        </li>
                    </ul>

                </div>
               
                <div class="col-md-3 mb-md-0 mb-3">

                   
                    <h5 class="text-uppercase text-light">Links</h5>

                    <ul class="list-unstyled">
                        <li>
                            <a href="serviceshow.php?category_id=84" class="text-light">Category</a>
                        </li>
                        <li>
                            <a href="order_details.php" class="text-light">My Orders</a>
                        </li>
                        <li>
                            <a href="mycart.php" class="text-light">Cart</a>
                        </li>
                    </ul>

                </div>
              
            </div>
          

        </div>
       

    </footer>
   
</nav>
