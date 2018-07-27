<?php include("inc/header.php");?>

    <section id="notice_board">
        <div class="container">
            <div class="row item">
			
			<?php
				$query ="SELECT * FROM tbl_post";

				$post = $db ->select($query);

				if($post){
					while ($result = $post ->fetch_assoc()) {
				
			?>
			
                <div class="col-md-3 single-item">
                    <div class="card">
                        <a href="item-details.php?id=<?php echo $result['id']; ?>">
                            <img class="card-img-top" src="<?php echo $result['image']; ?>" alt="Card image cap">
                            <h4>Title</h4>
                            <div class="card-body">
                                <p> <img src="img/icon/place.png" class="iconn"> Location:<?php echo $result['city']; ?></p>
                                <p><img src="img/icon/tag.png" class="iconn"> Lost/found</p>
                                <p><img src="img/icon/calendar.png" class="iconn"> Date:<?php echo $result['date']; ?></p>
                                <p><img src="img/icon/statistic.png" class="iconn"><span class="ui-badge"> ID:<?php echo $result['id']; ?></span></p>
                            </div>
                                <p><?php echo $fm ->textShorten($result['body']); ?></p>
                        </a>
                    </div>
                </div>
		<?php } } ?>
                
               
            </div>
        </div>
    </section>

<?php include("inc/footer.php");?>