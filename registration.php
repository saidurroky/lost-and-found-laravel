<?php include("inc/header.php");?>

    <section id="registration">
        <div class="container">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">

<?php
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $email = mysqli_real_escape_string($db->link, $_POST['email']);
    $username = mysqli_real_escape_string($db->link, $_POST['username']);
    $password = mysqli_real_escape_string($db->link,md5($_POST['password']));
    $address = mysqli_real_escape_string($db->link, $_POST['address']);
    $phone = mysqli_real_escape_string($db->link, $_POST['phone']);
	
    if ($username == "" || $password == "" || $address == "" || $phone == "" || $email == "") {
        echo "<span class='error'>field must not be empty!</span>";
    } else{
        
         $query = "INSERT INTO tbl_user(address, username,password,email,phone) 
				   VALUES('$address','$username', '$password','$email','$phone')";
         $inserted_rows = $db->insert($query);
          if ($inserted_rows) {
              echo "<span class='success'>Data Inserted Successfully.</span>";
          }else {
             echo "<span class='error'>Data Not Inserted !</span>";
              }
          }
    }
?>
			
				
                    <form class="abc" method="post">
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="inputEmail4">Email</label>
                                <input type="email" name="email" class="form-control" id="inputEmail4" placeholder="Email">
                            </div>
                            <div class="form-group col-md-12">
                                <label for="inputPassword4">Username</label>
                                <input type="text" name="username" class="form-control" id="inputPassword4" placeholder="Password">
                                <label class="col-md-12 control-label" for="confirm_password">Password</label>
                                <input id="confirm_password" name="password" type="password" placeholder="Re-type password" class="form-control input-md" required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputAddress">Address</label>
                            <input type="text" class="form-control"  name="address" id="inputAddress" placeholder="1234 Main St">
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="mobilenumber">Mobile Number</label>
                            <input id="mobilenumber" name="phone" type="text" placeholder="Mobile Number" class="form-control input-md" required="">
                        </div>
                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="gridCheck">
                                <label class="form-check-label" for="gridCheck">Check me out</label>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Sign in</button>
                    </form>
                </div>
                <div class="col-md-3"></div>
            </div>
        </div>
    </section>


<?php include("inc/footer.php");?>