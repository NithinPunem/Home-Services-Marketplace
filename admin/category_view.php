<?php
include '../db/dbconnect.php';

include 'assets/include/admin_header.php';

?>

<?php
if (isset($_GET['showAlert'])) {
    $showAlert = $_GET['showAlert'];
}
if (isset($_GET['showError'])) {
    $showError = $_GET['showError'];
}
?>

<div class="col-sm-9 col-xs-12 content pt-3 pl-0">

    <div class="row ">
        <div class="col-lg-5">

            <h5 class="mb-0"><strong>Category</strong></h5>
            <span class="text-secondary">Dashboard <i class="fa fa-angle-right"></i> View Category Details</span>
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
                        <strong>Sorry! </strong> ' . $_SESSION['statusfail'] . '
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
        <div class="col-sm-6">
            <div class="mt-1 mb-3 p-3 button-container bg-white shadow-sm border">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Sno.</th>
                                <th>Category name</th>
                                <th>Option</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $sql = "SELECT * FROM `category`";
                            $result = mysqli_query($conn, $sql);
                            if ($result) {
                                $sno = 0;
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $sno = $sno + 1;
                                    $category_id = $row['category_id'];
                                    $category_name = $row['category_name'];
                                    echo '<tr>
                                                <td>' . $sno . '</td>
                                                <td>' . $category_name . '</td>
                                                <td>
                                                <a href="category_delete.php?deleteid=' . $category_id . '"><button type="submit" class="btn btn-danger">Delete</button></a>
                                                        </td>                                                
                                                        </tr>';
                                }
                            }

                            ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-sm-6">
            <div class="mt-1 mb-3 p-1 button-container  bg-white shadow-sm border">

                <?php

                ?>

                <div class="col-sm">
                    <h6 class="mb-2 pt-3 font-weight-bold">Add Category:</h6>
                    <div class="mt-4 mb-3 p-3 button-container bg-white border shadow-sm">
                        <form action="category_add.php" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="categoryname">Category Name:</label>
                                <input type="text" id="categoryname" name="categoryname" class="form-control" placeholder="ex. Cleaning" required />
                            </div>
                            <div class="form-group">
                                <label for="categoryphoto">Category Photo:</label>
                                <input type="file" id="categoryphoto" name="categoryphoto" class="form-control" required />
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success" name="add"><i class="fa fa-check"></i> Add</button>
                            </div>
                        </form>
                    </div>
                </div>


                <div class="mt-1 mb-3 p-1 button-container  bg-white shadow-sm border">
                   
                    <div class="col-sm ">
                        <h6 class="mb-2 pt-3 font-weight-bold">Edit Category:</h6>
                        <div class="mt-4 mb-3 p-3 button-container bg-white border shadow-sm ">

                            <form action="category_update.php" method="POST">
                                <div class="form-group row">
                                    <label for="selectcategory" class="control-label col-sm-2">Select:</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" id="selectcategory" name="selectcategory" required>
                                            <option value="">select category</option>
                                            <?php
                                            $sql = "SELECT * FROM `category`";
                                            $result = mysqli_query($conn, $sql);
                                            if ($result) {
                                                while ($row = mysqli_fetch_assoc($result)) {
                                                    $category_name = $row['category_name'];
                                                    echo '
                                                    <option value="' . $category_name . '">' . $category_name . '</option>
                                                    ';
                                                }
                                            } else {
                                                echo 'note inserted';
                                            }
                                            ?>
                                        </select>
                                        <small id="emailHelp" class="form-text text-muted">Choose category which you want to update:</small>
                                    </div>
                                </div>

                                <div class="form-group row pt-3">
                                    <label class="control-label col-sm-2" for="updatedcategory">Edit category:</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="updatedcategory" name="updatedcategory" placeholder="ex.Repairing" required>
                                        <small id="emailHelp" class="form-text text-muted">Enter New category name:</small>
                                    </div>
                                </div>

                                <div class="form-group pt-3">
                                    <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php
        include 'assets/include/admin_footer.php';
        ?>