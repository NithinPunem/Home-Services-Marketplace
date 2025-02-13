<?php
include '../db/dbconnect.php';
$title = 'View Gig';
include 'assets/include/sp_header.php';
?>


<div class="col-sm-9 col-xs-12 content pt-3 pl-0">
    <div class="row ">
        <div class="col-lg-5">
            <h5 class="mb-0"><strong>View service</strong></h5>
            <span class="text-secondary">Workspace<i class="fa fa-angle-right"></i> View service</span>
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
           
            <div class="mt-1 mb-3 p-3 button-container bg-white border shadow-sm">

                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Sno.</th>
                                <th>Title</th>
                                <th>Category</th>
                                <th>Service</th>
                                <th>Price</th>
                                <th>Description</th>
                                <th>Availibility</th>
                                <th>Operation</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                           
                            $sp_id = $_SESSION['sp_id'];
                            $sql = "SELECT * FROM `sp_service` WHERE sp_id = $sp_id";
                            $result = mysqli_query($conn, $sql);
                            if ($result) {
                                $sno = 0;
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $sno = $sno + 1;
                                    $service_title = $row['service_title'];
                                    $service_id = $row['service_id'];
                                    $price = $row['price'];
                                    $description = $row['description'];
                                    
                                    if ($row['availability'] == 1) {
                                        $availibility = "Yes";
                                    } else {
                                        $availibility = "No";
                                    }

                                    $fetchother = "SELECT `service`.* , `category`.*
                                    FROM `service` INNER JOIN `category` 
                                    ON `service`.category_id=`category`.category_id WHERE `service`.service_id = $service_id ";
                                    $resultfetchother = mysqli_query($conn, $fetchother);
                                    while ($row = mysqli_fetch_assoc($resultfetchother)) {
                                        $service_name = $row['service_name'];
                                        $category = $row['category_name'];

                                        echo '<tr>
                                        <td>' . $sno . '</td>
                                        <td>' . $service_title . '</td>
                                        <td>' . $category . '</td>
                                        <td>' . $service_name . '</td>
                                        <td>' . $price . '</td>
                                        <td>' . $description . '</td>
                                        <td>' . $availibility . '</td>
                                        <td>
                                        <a href="gig_delete.php?service_id=' . $service_id . '&sp_id=' . $sp_id . '&service_title=' . $service_title . '"><button type="button" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button></a>   
                                        </td>                                                
                                        </tr>';
                                    }
                                }
                            }
                            ?>
                           
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Sno.</th>
                                <th>Title</th>
                                <th>Category</th>
                                <th>Service</th>
                                <th>Price</th>
                                <th>Description</th>
                                <th>Availibility</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>

           

        </div>
    </div>



    <?php
    include 'assets/include/sp_footer.php';
    ?>