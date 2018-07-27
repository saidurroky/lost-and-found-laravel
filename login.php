<?php 
	include("inc/header.php");
	 Session::init();
?>

<section id="slider">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="carousel-item active slider1">
                                <br>
                                <h1>
                                    biggest lost &amp; found platform <br> in <br> bangladesh.
                                </h1>
                                <br>
                                <br>
                                <p>
                                    Do you lost something? <br> don't worry. <br>we are here for you. This website help you to find your lost item easily.
                                </p>
                                
                            </div>
							<?php
								$query ="SELECT * FROM tbl_slider ORDER BY id limit 5";
								$slider = $db -> select($query);

								if($slider){
									while($result = $slider ->fetch_assoc()){
							?>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="admin/<?php echo $result['image'];?>" alt="<?php echo $result['title'];?>">
                            </div>
                           <?php } } ?>

                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev"><span class="carousel-control-prev-icon" aria-hidden="true"></span><span class="sr-only">Previous</span></a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next"><span class="carousel-control-next-icon" aria-hidden="true"></span><span class="sr-only">Next</span></a>
                    </div>
                </div>
                <div class="col-md-4">

				
				<?php
					if($_SERVER['REQUEST_METHOD'] == 'POST'){
						$email = $fm ->validation($_POST['email']);
						$password = $fm ->validation(md5($_POST['password']));
						$email = mysqli_real_escape_string($db->link, $email);
						$password = mysqli_real_escape_string($db->link, $password);

						$query ="SELECT * FROM tbl_user WHERE email = '$email' AND password = '$password' ";
						$result = $db ->select($query);

						if($result != false){
							$value = mysqli_fetch_array($result);
							$row = mysqli_num_rows($result);
							if($row > 0){
								Session::set("login", true);
								Session::set("userid", $value['id']);
								Session::set("username", $value['username']);
								echo '<script type="text/javascript">
											location.replace("report.php");
										  </script>';
							}else{
								echo "<span style='color:red;font-size:18px'>No data found!!!</span>";
							}
						}else{
								echo "<span style='color:red;font-size:18px'>Username and Password don't match!!!</span>";
							}
					}
				?>
				
				
				
                    <div class="login_form">
                        <form class="px-4 py-3" method="post" >
                            <div class="form-group">
                                <h5 class="aa">Login here</h5>
                                <label for="exampleDropdownFormEmail1">Email address</label>
                                <input type="email" class="form-control" name="email" placeholder="email@example.com">
                            </div>
                            <div class="form-group">
                                <label for="exampleDropdownFormPassword1">Password</label>
                                <input type="password" class="form-control" name="password"  placeholder="Password">
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="dropdownCheck">
                                <label class="form-check-label" for="dropdownCheck">Remember me</label>
                            </div>
                            <button type="submit" class="btn btn-primary">Sign in</button>
                        </form>
						
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="registration.php">New around here? Sign up</a>
                        <a class="dropdown-item" href="#">Forgot password?</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
 <?php include("inc/footer.php");?>