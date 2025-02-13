<?php
include '../db/dbconnect.php';
$title = 'Order view';
include 'assets/include/sp_header.php';
?>


<div class="col-sm-9 col-xs-12 content pt-3 pl-0">
    <div class="row ">
        <div class="col-lg-5">
            <h5 class="mb-0"><strong>Order</strong></h5>
            <span class="text-secondary">Workspace<i class="fa fa-angle-right"></i> Order</span>
        </div>
        <div class="col-md-auto col-lg-7">
            
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
                        <strong>Success! </strong> ' . $_SESSION['statusfail'] . '
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                        </div>';
                unset($_SESSION['statusfail']);
            }
            ?>
        </div>
    </div>





    <div class="row mt-3">
        <div class="col-sm-12">
            <div class="mt-4 mb-4 p-3 bg-white border shadow-sm lh-sm">
                
                <div class="product-list">
                    <div class="table-responsive product-list">
                        <table class="table table-bordered table-striped mt-3" id="productList">
                            <thead>
                                <tr>
                                    <th>Order ID</th>
                                    <th>Customer</th>
                                    <th>Phone</th>
                                    <th>Address</th>
                                    <th>Pincode</th>
                                    <th>Pay mode</th>
                                    <th>Order date</th>
                                    <th>Due date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sp_id = $_SESSION['sp_id'];
                                $query1 = "SELECT * FROM `order_master` WHERE `order_id` IN (SELECT `order_id` FROM `user_order` WHERE sp_id = $sp_id)";
                                $result1 = mysqli_query($conn, $query1);
                                if ($result1) {
                                    while ($row1 = mysqli_fetch_assoc($result1)) {
                                        $order_id = $row1['order_id'];
                                        $customer_id = $row1['customer_id'];
                                        $full_name = $row1['full_name'];
                                        $phone = $row1['phone'];
                                        $address = $row1['address'];
                                        $pincode = $row1['pincode'];
                                        $pay_mode = $row1['pay_mode'];
                                        $total = $row1['total'];
                                        $fake_order_date = $row1['order_date'];
                                        $order_date = date('j F, Y g:i A', strtotime($fake_order_date));
                                        $fake_due_date = $row1['due_date'];
                                        $due_date = date('j F, Y g:i A', strtotime($fake_due_date));


                                ?>


                                        <tr>
                                            <td class="align-middle"><?php echo $order_id ?></td>
                                            <td class="align-middle"><?php echo $full_name ?></td>
                                            <td class="align-middle"><?php echo $phone ?></td>
                                            <td class="align-middle"><?php echo $address ?></td>
                                            <td class="align-middle"><?php echo $pincode ?></td>
                                            <td class="align-middle"><?php echo $pay_mode ?></td>
                                            <td class="align-middle"><?php echo $order_date ?></td>
                                            <td class="align-middle"><?php echo $due_date ?></td>

                                                <td class="align-middle text-center">

                                                <a href="order_details.php?order_id=<?php echo $order_id ?>&sp_id=<?php echo $sp_id ?>"><button class="btn btn-theme mb-2" title="See Order Details">
                                                        <i class="fa fa-eye"></i>
                                                    </button>
                                                </a>
                                              
                                            </td>
                                        </tr>

                                <?php
                                    }
                                }
                                ?>
                            </tbody>
                        </table>

                       
                    </div>
                </div>
                <?php echo $order_id; ?>
               
            </div>
        </div>
    </div>


    <?php
    include 'assets/include/sp_footer.php';
    ?>