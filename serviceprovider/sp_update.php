<?php
include '../db/dbconnect.php';
include 'assets/include/admin_header.php';
?>



<div class="col-sm-9 col-xs-12 content pt-3 pl-0">

    <h5 class="mb-0"><strong>Service Provider</strong></h5>
    <span class="text-secondary">Dashboard <i class="fa fa-angle-right"></i> View Service Provider Details</span>
    <div class="row mt-3">




        <div class="mt-1 mb-3 p-3 button-container bg-white shadow-sm border">
            
            <form class="needs-validation" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" novalidate>

              
                <div class="form-row">
                    <div class="form-group col-md-12 input-group-sm">
                        <label for="spname">Name</label>
                        <input type="text" class="form-control" id="sp_name" name="sp_name" required>
                        
                    </div>
                    <div class="form-group col-md-6 input-group-sm">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" aria-describedby="emailFeedback" required>
                        <div id="emailFeedback" class="invalid-feedback">
                            Please provide a valid email.
                        </div>
                    </div>
                    <div class="form-group col-md-6 input-group-sm">
                        <label for="phone">Phone No.</label>
                        <input type="tel" class="form-control" pattern="\d{10}" data-for="phoneNumber" name="phone" aria-describedby="phoneFeedback" required>
                        <div id="phoneFeedback" class="invalid-feedback">
                            Please provide a valid Phone number.
                        </div>
                    </div>
                </div>



                <div class="form-row">
                    <div class="form-group col-md-4 input-group-sm">
                        <label for="city">City</label>
                        <select id="sp_city" class=" custom-select" name="sp_city" required>
                            <option value="">Choose City</option>
                            <?php 
                            $sql = "SELECT * FROM `city`";
                            $result = mysqli_query($conn, $sql);
                            if ($result) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $city_name = $row['city_name'];
                                    echo '<option value="' . $city_name . '">' . $city_name . '</option>';
                                }
                            }
                            ?>
                            
                        </select>
                        <div class="invalid-feedback">Please choose a city.</div>
                    </div>
                    <div class="form-group col-md-2 input-group-sm">
                        <label for="Pincode">Pincode</label>
                        <input type="text" class="form-control" pattern="\d{6}" name="pincode" id="pincode" required>
                    </div>
                </div>
                <hr class="mt-4 mb-4">

               
                <div class="form-row mt-4">
                    <div class="form-group col-md-6">
                        <label for="inlineFormInputGroupUsername2">Create Username</label>
                        <div class="input-group mb-2 mr-sm-2 input-group-sm">
                            <div class="input-group-prepend">
                                <div class="input-group-text bg-c1-1 text-light">@</div>
                            </div>
                            <input type="text" class="form-control" pattern="(?=.*[a-z]).{4,}" id="username" name="username" placeholder="sahil_18" aria-describedby="inputGroupPrepend" required>

                            <div class="invalid-feedback">
                                Please choose a right username.
                            </div>
                        </div>
                    </div>
                </div>

               
                <div class="form-row">
                    <div class="form-group col-md-6 input-group-sm">
                        <label for="password">Create Password</label>
                        <input type="password" class="form-control" id="password" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required>
                        <div id="phoneFeedback" class="invalid-feedback">
                            Must contain at least one number and one uppercase and lowercase letter, and at least 8 or
                            more characters.
                        </div>
                    </div>
                    <div class="form-group col-md-6 input-group-sm">
                        <label for="confirmpassword">Confirm Password</label>
                        <input type="password" class="form-control" id="cpassword" name="cpassword" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required>
                        <div id="phoneFeedback" class="invalid-feedback">
                            Password does not matched.
                        </div>
                    </div>
                </div>

                <a href=""><button type="submit" class="btn btn-c1-1">Sign in</button></a>
                <a href="index.php" class="btn btn-outline-secondary">Cancel</a>
            </form>
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