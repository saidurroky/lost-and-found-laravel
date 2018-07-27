<?php include("inc/header.php");?>

    <section id="report_lost">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>Report for found Item</h1>
                </div>
            </div>
      			
			
			
 <?php
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $title = mysqli_real_escape_string($db->link, $_POST['title']);
    $cat = mysqli_real_escape_string($db->link, $_POST['cat']);
    $body = mysqli_real_escape_string($db->link, $_POST['body']);
    $date = mysqli_real_escape_string($db->link, $_POST['date']);
	$author = mysqli_real_escape_string($db->link, $_POST['author']);
    $userid = mysqli_real_escape_string($db->link, $_POST['userid']);
    $phone = mysqli_real_escape_string($db->link, $_POST['phone']);
	 $email = mysqli_real_escape_string($db->link, $_POST['email']);
    $role = mysqli_real_escape_string($db->link, $_POST['role']);
    $city = mysqli_real_escape_string($db->link, $_POST['city']);

    
    $permited  = array('jpg', 'jpeg', 'png', 'gif');
    $file_name = $_FILES['image']['name'];
    $file_size = $_FILES['image']['size'];
    $file_temp = $_FILES['image']['tmp_name'];

    $div = explode('.', $file_name);
    $file_ext = strtolower(end($div));
    $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
    $uploaded_image = "admin/upload/".$unique_image;

    if ($title == "" || $cat == "" || $body == "" || $date == "" || $phone == "" || $email == "") {
        echo "<span class='error'>field must not be empty!</span>";
    }elseif ($file_size >1048567) {
        echo "<span class='error'>Image Size should be less then 1MB!</span>";
    } elseif (in_array($file_ext, $permited) === false) {
         echo "<span class='error'>You can upload only:-".implode(', ', $permited)."</span>";
    } else{
         move_uploaded_file($file_temp, $uploaded_image);
         $query = "INSERT INTO tbl_post(cat, title, body, image, author, date, userid,phone,email,role,city) 
				   VALUES('$cat', '$title','$body', '$uploaded_image', '$author', '$date', '$userid','$phone','$email','$role','$city')";
         $inserted_rows = $db->insert($query);
          if ($inserted_rows) {
              echo "<span class='success'>Data Inserted Successfully.</span>";
          }else {
             echo "<span class='error'>Data Not Inserted !</span>";
              }
          }
    }
?>
			
			
			
			
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <form class="form_f" method="post" enctype="multipart/form-data">
                        <div class="form-row">
                            <div class="col-md-6 mb-3">
                                <input type="hidden" name="author" value="<?php echo Session::get('username');?>" class="form-control">
                            </div>
							<div class="col-md-6 mb-3">
                                <input type="hidden" name="userid" value="<?php echo Session::get('id');?>" class="form-control">
                            </div>
							<div class="col-md-6 mb-3">
                                <label>Title</label>
                                <input type="text" name="title" class="form-control">
                            </div>
							
                            <div class="col-md-6 mb-3">
                                <label>Date Item was Found</label>
                                <input type="date" name="date" id="date">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-12 mb-3">
                                <label>City/Town where Item was Found</label>
                            <input type="text" name="city" class="form-control">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-12 mb-3">
                                <label class="control-label" for="Category">Category</label>
                          
                                <select id="radius" name="cat" class="form-control">
									  <option value="">Choose a Category</option>
								<?php
									$query ="SELECT * FROM tbl_category ORDER BY id asc";
									$category = $db ->select($query);

									if($category){
										
										while ($result = $category ->fetch_assoc()) {
											
								?>
                                              
                                                <option value="<?php echo $result['id']; ?>"><?php echo $result['name']; ?></option>
                                <?php } } ?>                     
                                            </select>
                            </div>
                        </div>
                       
                        <div class="form-group">
                            <label>Specific Description</label>
                            <textarea rows="3" name="body" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <h4>Upload Image</h4>
                            <input type="file" name="image" accept="image/gif, image/jpeg, image/png">
                        </div>

                        <div class="form-group">
                            <label>Phone Number</label>
                            <input type="text" name="phone" placeholder="Enter Phone Number Here.." class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Email Address</label>
                            <input type="text" name="email" placeholder="Enter Email Address Here.." class="form-control">
                        </div>
						<div class="col-md-6 mb-3">
							<input type="hidden" name="role" value="2" class="form-control">
                         </div>
                    
                        <button class="btn btn-primary" type="submit">Submit form</button>
                    </form>
                </div>
                <div class="col-md-3"></div>
            </div>
        </div>
    </section>
   <?php include("inc/footer.php");?>