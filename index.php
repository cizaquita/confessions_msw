<?php
require "assets/config.php";
// Insert Header
include "header.php";

// Read from database

$read_posts = "SELECT * FROM `posts` ORDER BY `id` DESC";
$resoult = mysqli_query($conn, $read_posts);
?>


<!-- HEADER -->
			<form action="add_post.php" method="POST" role="form">
				<div class="row">
					<div class="col-sm-12">
						<ol class="breadcrumb">
						  <li class="active">New Secrets</li>
						</ol>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-12">
						<?php
						if (mysqli_num_rows($resoult) > 0) {
							while ($row = mysqli_fetch_array($resoult)) {
								$id = $row["id"];
								$content = $row["content"];
								$likes = $row["likes"];
								$dislikes = $row["dislikes"];
								$comments_counter = $row["comments_counter"];
								$unique_id = $row["unique_id"];
								$post_id = $row["id"];
								$date = $row["date"];
								$time = $row["time"];

								$q_get_comments = "SELECT COUNT(`comment`) AS get_comments FROM `comments` WHERE `unique_post_id` = '$unique_id';";
								$result_get_comments = mysqli_query($conn, $q_get_comments);
								$get_comments_row   = mysqli_fetch_assoc($result_get_comments);
								$get_comments = $get_comments_row['get_comments'];

							?>
						<div class="panel panel-info wow fadeIn" data-wow-duration="2s">
						  	<div class="panel-heading">
						    	<a href="single_post.php?pid=<?php echo $unique_id; ?>">
							    	<h3 class="panel-title pull-left"><?php echo "#" . $unique_id; ?></h3>
						    	</a>
						    	<h3 class="panel-title pull-right"><?php echo $date . " / " . $time; ?></h3>
						    	<div class="clearfix"></div>
						  	</div>
							<div class="panel-body">
							  	 <?php echo $content; ?>	
							  	 <input id="id_holder" type="hidden" value="<?php echo $post_id; ?>"></input>		   
							</div>
							<div class="panel-footer">
								<div class="row">
									<div class="col-sm-7">
										<!--label>What do you think?</label-->
										<div class="btn-group btn-group-justified hidden-xs" role="group">
											<div class="btn-group" role="group" post-id="<?php echo $post_id;?>">
												<button type="button" class="btn btn-default like_dislike" id="like" class="like" onclick="likePost(this)"><i class="fa fa-thumbs-up"></i> Like<span class="badge" id="likes_num"><?php echo $likes;?></span></button>
											</div>
											<!--div class="btn-group" role="group" post-id="<?php echo $post_id;?>">
												<button type="button" class="btn btn-default like_dislike" onclick="dislike(this)"><i class="fa fa-thumbs-down"></i> Dislike<span class="badge"><?php echo $dislikes;?></span></button>
											</div-->
											<div class="btn-group" role="group" post-id="<?php echo $unique_id;?>">
												<button type="button" class="btn btn-default" onclick="comment(this)" id="click_comment"><i class="fa fa-comment-o"></i> <span class="badge"><?php echo $get_comments;?></span></button>
											</div>
										</div>
										<div class="btn-group btn-group-justified visible-xs" role="group">
											<div class="btn-group" role="group" post-id="<?php echo $post_id;?>">
												<button type="button" class="btn btn-default like_dislike" id="like" class="like" onclick="likePost(this)"><i class="fa fa-thumbs-up"></i> <span class="badge" id="likes_num"><?php echo $likes;?></span></button>
											</div>
											<!--div class="btn-group" role="group" post-id="<?php echo $post_id;?>">
												<button type="button" class="btn btn-default like_dislike" onclick="dislike(this)"><i class="fa fa-thumbs-down"></i> <span class="badge"><?php echo $dislikes;?></span></button>
											</div-->
											<div class="btn-group" role="group" post-id="<?php echo $unique_id;?>">
												<button type="button" class="btn btn-default" onclick="comment(this)" id="click_comment" style="padding: 6px 12px;"><i class="fa fa-comment-o"></i> <span class="badge"><?php echo $get_comments;?></span></button>
											</div>
										</div>
									</div>
									<!--div class="col-sm-5">
										<label class="pull-right">Share:</label>
										<div class="btn-group btn-group-justified" role="group" aria-label="...">
											<div class="btn-group" role="group">
											<a href="https://www.facebook.com/sharer/sharer.php?u=32avzir6unmcg2y2.onion/single_post.php?pid=<?php echo $unique_id; ?>&t=Делись своими секретами и читай откровения других анонимно! Самые невероятные признания." target="_blank">
											<button type="button" class="btn btn-link text-center" onclick="shareCounter('Facebook')"><i class="fa fa-facebook vblock"></i>Facebook</button>
											</a>
											</div>											
											<div class="btn-group" role="group">
											<a href="http://vk.com/share.php?url=http://32avzir6unmcg2y2.onion/single_post.php?pid=<?php echo $unique_id; ?>&image=http://32avzir6unmcg2y2.onion/images/sm.jpg&title=Делись своими секретами и читай откровения других анонимно! Самые невероятные признания." target="_blank">
											<button type="button" class="btn btn-link" onclick="shareCounter('VKontakte')"><i class="fa fa-vk  vblock"></i>VKontakte</button>
											</a>
											</div>
											<div class="btn-group" role="group">
											<a href="https://twitter.com/share?url=32avzir6unmcg2y2.onion/single_post.php?pid=<?php echo $unique_id; ?>&via=32avzir6unmcg2y2.onion&text=Признания - Не думай, скажи! 32avzir6unmcg2y2.onion/single_post.php?pid=<?php echo $unique_id ?>" target="_blank">
											<button type="button" class="btn btn-link" onclick="shareCounter('Twitter')"><i class="fa fa-twitter vblock"></i>Twitter</button>
											</a>
											</div>
										</div>
									</div-->
								</div>
							</div>
						</div>

						<!-- ./ TEST PANEL END -->




							<?php
							}
						}
						else {
							echo '<div class="alert alert-warning text-center" role="alert"><span class="glyphicon glyphicon-warning-sign"></span> No posts</div>';
						}
						?>
						
						
					</div>
				</div>
			</form>
<!-- FOOTER -->
<script>
	<?php 
		echo "var post_id = " . $post_id;
	?>



</script>
<?php require "footer.php"; ?>
