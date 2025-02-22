<?php
include '../db/dbconnect.php';
include 'assets/include/admin_header.php';
?>

<div class="col-sm-9 col-xs-12 content pt-3 pl-0">
    <h5 class="mb-0"><strong>Category</strong></h5>
    <span class="text-secondary">Dashboard <i class="fa fa-angle-right"></i> View Category Details</span>

    <div class="row mt-3">


        <div class="col-sm-6">

           
            <div class="panel panel-default">
                <div class="panel-heading"><b> Demo </b> </div>

                <div class="panel-body">

                    <div class="tbl_user_data"></div>

                </div>

            </div>



            <div class="panel panel-default">
                <div class="panel-heading"><b>HTML Table Edits/Upates</b> </div>

                <div class="panel-body">

                    <p>All the changes will be displayed below</p>
                    <div class="post_msg"> </div>

                </div>
            </div>
           
            <div class="mt-1 mb-3 p-3 button-container bg-white shadow-sm border">
                
                <div class="table-responsive ">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Sno.</th>
                                <th>Category name</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                              
                                $sql = "SELECT * FROM `category`";
                                $result = mysqli_query($conn,$sql);
                                if ($result) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo '<tr>
                                        <td>' . $row['id'] . '</td>
                                        <td>' . $row['name'] . '</td>
                                        </tr>';
                                    }
                                }
                                else{
                                    echo 'note inserted';
                                }
                                ?>



                        </tbody>
                    </table>
                </div>
            </div>
           
        </div>

        <div class="col-sm-10">
           
            <div class="mt-1 mb-3 p-3 button-container  bg-white shadow-sm border">
                <h6 class="mb-2">Add Category:</h6>
              
                <?php
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {

                    $categoryname = $_POST['categoryname'];
                    $input = "INSERT INTO `category` (`id`, `name`) VALUES ('', '$categoryname')";
                    $inresult = mysqli_query($conn, $input);
                    if ($inresult) {
                        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Success</strong> Category Inserted Successfully.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>';
                    }else{
                        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Error!</strong> Category not inserted.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>';
                        }
                  }
                ?>

            </div>
           
        </div>

    </div>

    <?php
include 'assets/include/admin_footer.php';
?>