<?php
include '../db/dbconnect.php';
include 'assets/include/admin_header.php';
?>
<div class="col-sm-9 col-xs-12 content pt-3 pl-0">


    <div class="row ">
        <div class="col-lg-5">

            <h5 class="mb-0"><strong>Services</strong></h5>
            <span class="text-secondary">Dashboard <i class="fa fa-angle-right"></i> View Services</span>
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
                                <th>Services</th>
                                <th>Category</th>
                                <th>Service Availibility</th>
                                <th>Operation</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $sql = "SELECT `service`.* , `category`.*
                            FROM `service` INNER JOIN `category` 
                            ON `service`.category_id=`category`.category_id";
                            $result = mysqli_query($conn, $sql);
                            if ($result) {
                                $sno = 0;
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $sno = $sno + 1;
                                    $service_id = $row['service_id'];
                                    $service_name = $row['service_name'];
                                    $category_name = $row['category_name'];
                                    if ($row['service_availibility'] == 1) {
                                        $service_availibility = "Yes";
                                    } else {
                                        $service_availibility = "No";
                                    }
                                  
                                    echo '<tr>
                                                <td>' . $sno . '</td>
                                                <td>' . $service_name . '</td>
                                                <td>' . $category_name . '</td>
                                                <td>' . $service_availibility . '</td>
                                                <td>
                                                <a href="service_delete.php?deleteid=' . $service_id . '"><button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button></a>
                                                </td>                                                
                                                </tr>';
                                                
                                }
                            }
                            ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Sno.</th>
                                <th>Services</th>
                                <th>Category</th>
                                <th>Service Availibility</th>
                                
                                <th>Operation</th>
                            </tr>
                        </tfoot>
                    </table>
                    <a href="service_add.php" class="btn btn-primary btn-sm">Add Service</a>
                </div>
            </div>
        </div>
    </div>

    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/jquery-1.12.4.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/sweetalert.js"></script>
    <script src="assets/js/progressbar.min.js"></script>
    <script src="assets/js/charts/canvas.min.js"></script>
    <script src="assets/js/calendar/bootstrap_calendar.js"></script>
    <script src="assets/js/calendar/demo.js"></script>
    <script src="assets/js/jquery.dataTables.min.js"></script>
    <script src="assets/js/dataTables.bootstrap4.min.js"></script> 
    <script src="assets/js/jsgrid.min.js"></script>
    <script src="assets/js/jsgrid-demo.php"></script>
    <script src="assets/js/custom.js"></script>
    <script>
        $('#example').DataTable();
    </script>
    <?php
    include 'assets/include/admin_footer.php';
    ?>