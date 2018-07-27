<?php include("inc/header.php");?>
<?php
	if(!isset($_GET['id']) || $_GET['id'] == NULL){

		header("location: 404.php");
	}else{

		$id = $_GET['id'] ;
	}
?>
    <section id="item-details">
        <div class="container">
            <div class="row">
			
			<?php
					$query ="SELECT * FROM tbl_post WHERE id =$id";
					$post = $db ->select($query);

				if($post){
					while ($result = $post ->fetch_assoc()) {
				?>
			
                <div class="col-md-12 faw">
                    <h1><?php echo $result['title']; ?></h1>
                    <div class="post_commentbox">
						<a href="#">   <i class="fa fa-user"></i> <?php echo $result['author']; ?></a> 
						<span><i class="fa fa-calendar"></i> <?php echo $fm ->formatDate($result['date']); ?></span>
						<a href="#"><i class="fa fa-tags"></i> </a> 
						<i class="fas fa-phone-square"></i> <a href=""><?php echo $result['phone']; ?></a>
					</div>
                </div>
                <div class="col-md-6 single_page_content img-center">
                    <img class="img-responsive img-center" src="<?php echo $result['image']; ?>" alt="">
                </div>
                <div class="col-md-6 ppp">
                    <p><?php echo $result['body']; ?></p>
                </div>
				<?php } } ?>
                <div class="post_commentbox"> <span></span>
                </div>
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <h4>Give message</h4>
                    <form class="needs-validation novalidate">
                        
                        <div class="form-row">
                            <div class="col-md-12 mb-6">
                                <label for="validationCustom01">Name</label>
                                <input type="text" class="form-control" id="validationCustom01" placeholder="Name" required>
                            </div>
                            <div class="col-md-12 mb-6">
                                <label for="validationCustom05">Mobile Number</label>
                                <input type="tel" class="form-control" id="validationCustom05" placeholder="Contact Number" required>
                            </div>
                        </div>
                        <div class="form-group">
                             <label for="validationCustom05">Message</label>
                            <textarea type="text" name="message" class="form-control" id="message" required="" data-validation-required-message="Please write your message." aria-invalid="false"></textarea>
                        </div>

                        <button class="btn btn-primary" type="submit">Send Message</button>
                    </form>
                </div>
                <div class="col-md-3"></div>
            </div>
        </div>
    </section>

   <?php include("inc/footer.php");?>