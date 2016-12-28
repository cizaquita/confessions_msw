<?php
require "assets/config.php";
// Insert Header
include "header.php";

// Read from database
$unique_post_id = $_GET["pid"];
$read_posts = "SELECT * FROM `posts` WHERE unique_id = '$unique_post_id';";
$read_comments = "SELECT * FROM `comments` WHERE unique_post_id = '$unique_post_id' ORDER BY `id` DESC;";
$resoult_post = mysqli_query($conn, $read_posts);
$resoult_comments = mysqli_query($conn, $read_comments);
?>


<!-- HEADER -->
			<form action="single_post.php" method="POST" role="form">
				<div class="row">
					<div class="col-sm-12">
						<ol class="breadcrumb">
						  <li><a href="index.php">My Secret World - Confessions</a></li>
						  <li class="active"><?php echo "#" . $unique_post_id; ?></li>
						</ol>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-12">
					
						<!-- TEST PANEL -->
						<?php
						if (mysqli_num_rows($resoult_post) > 0) {
							while ($row = mysqli_fetch_array($resoult_post)) {
								$id = $row["id"];
								$content = $row["content"];
								$likes = $row["likes"];
								$dislikes = $row["dislikes"];
								$comments_counter = $row["comments_counter"];
								$unique_id = $row["unique_id"];
								$post_id = $row["id"];

								$q_get_comments = "SELECT COUNT(`comment`) AS get_comments FROM `comments` WHERE `unique_post_id` = '$unique_id';";
								$result_get_comments = mysqli_query($conn, $q_get_comments);
								$get_comments_row   = mysqli_fetch_assoc($result_get_comments);
								$get_comments = $get_comments_row['get_comments'];

								
							}
						?>

						<!-- Post -->
						<div class="panel panel-info wow fadeIn" data-wow-duration="2s">
						  	<div class="panel-heading">
						    	<h3 class="panel-title"><?php echo "#" . $unique_id; ?></h3>
						  	</div>
							<div class="panel-body">
							  	 <?php echo $content; ?>	
							  	 <input id="id_holder" type="hidden" value="<?php echo $post_id; ?>"></input>		   
							</div>
							<div class="panel-footer">
								<div class="row">
									<div class="col-sm-7">
										<label>What do you think?</label>
										<div class="btn-group btn-group-justified hidden-xs" role="group" aria-label="..." >
											<div class="btn-group" role="group" post-id="<?php echo $post_id;?>">
												<button type="button" class="btn btn-default like_dislike" id="like" class="like" onclick="likePost(this)"><i class="fa fa-thumbs-up"></i> Like <span class="badge" id="likes_num"><?php echo $likes;?></span></button>
											</div>
											<div class="btn-group" role="group" post-id="<?php echo $post_id;?>">
												<button type="button" class="btn btn-default like_dislike" onclick="dislike(this)"><i class="fa fa-thumbs-down"></i> Dislike <span class="badge"><?php echo $dislikes;?></span></button>
											</div>
											<div class="btn-group" role="group" post-id="<?php echo $unique_id;?>">
												<button type="button" class="btn btn-default" onclick="comment(this)" id="click_comment"><i class="fa fa-comment-o"></i> <span class="badge"><?php echo $get_comments;?></span></button>
											</div>
										</div>
										<div class="btn-group btn-group-justified visible-xs" role="group" aria-label="..." >
											<div class="btn-group" role="group" post-id="<?php echo $post_id;?>">
												<button type="button" class="btn btn-default like_dislike" id="like" class="like" onclick="likePost(this)"><i class="fa fa-thumbs-up"></i><span class="badge" id="likes_num"><?php echo $likes;?></span></button>
											</div>
											<div class="btn-group" role="group" post-id="<?php echo $post_id;?>">
												<button type="button" class="btn btn-default like_dislike" onclick="dislike(this)"><i class="fa fa-thumbs-down"></i><span class="badge"><?php echo $dislikes;?></span></button>
											</div>
											<div class="btn-group" role="group" post-id="<?php echo $unique_id;?>">
												<button type="button" class="btn btn-default" onclick="comment(this)" id="click_comment" style="padding: 6px 12px;"><i class="fa fa-comment-o"></i> <span class="badge"><?php echo $get_comments;?></span></button>
											</div>
										</div>
									</div>
									<div class="col-sm-5">
										<label class="pull-right">Share:</label>
										<div class="btn-group btn-group-justified" role="group" aria-label="...">
											<div class="btn-group" role="group">
											<a href="https://www.facebook.com/sharer/sharer.php?u=32avzir6unmcg2y2.onion/single_post.php?pid=<?php echo $unique_id; ?>&t=Share your secrets and read another secrets anonymously!Share your secrets and read another secrets anonymously!" target="_blank">
											<button type="button" class="btn btn-link text-center" onclick="shareCounter('Facebook')"><i class="fa fa-facebook vblock"></i>Facebook</button>
											</a>
											</div>											
											<div class="btn-group" role="group">
											<a href="http://vk.com/share.php?url=http://32avzir6unmcg2y2.onion/single_post.php?pid=<?php echo $unique_id; ?>&image=http://32avzir6unmcg2y2.onion/images/sm.jpg&title=Share your secrets and read another secrets anonymously!Share your secrets and read another secrets anonymously!" target="_blank">
											<button type="button" class="btn btn-link" onclick="shareCounter('VKontakte')"><i class="fa fa-vk  vblock"></i>VKontakte</button>
											</a>
											</div>
											<div class="btn-group" role="group">
											<a href="https://twitter.com/share?url=32avzir6unmcg2y2.onion/single_post.php?pid=<?php echo $unique_id; ?>&via=32avzir6unmcg2y2.onion&text=My Secret World - Confessions /single_post.php?pid=<?php echo $unique_id ?>" target="_blank">
											<button type="button" class="btn btn-link" onclick="shareCounter('Twitter')" taget="_blank"><i class="fa fa-twitter vblock"></i>Twitter</button>
											</a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- / Post -->

						<!-- Comments & Add comment field -->
						<div class="row">
							<div class="col-sm-4">

								<div class="panel panel-info wow fadeIn" data-wow-duration="2s">
								  	<div class="panel-heading">
								    	<h3 class="panel-title">Добавить комментарий</h3>
								  	</div>
									<div class="panel-body">
										<div class="row">

											<div class="col-sm-12">
												 <div class="form-group">
												  <label for="comment">Добавить Ваш комментарий:</label>
												  <textarea class="form-control" rows="6" id="comment"></textarea>
												 
												</div>
												 <button type="button" class="btn btn-default" id="add_comment" style="width: 100%" onclick="postComment(<?php echo $unique_id; ?>)">Добавить</button>
												 <br>
											</div>
										</div>	
   
									</div>
								</div>

							</div>
							<div class="col-sm-8">
								<div class="panel panel-info wow fadeIn" data-wow-duration="2s">
								  	<div class="panel-heading">
								    	<h3 class="panel-title">Комментарии</h3>
								  	</div>
									<div class="panel-body">
									
									</div>
								  	<table class="table" id="table">
										<?php

										if (mysqli_num_rows($resoult_comments) > 0) {
											while ($row = mysqli_fetch_array($resoult_comments)) {
												$comment_id = $row["id"];
												$content_uid = $row["unique_post_id"];
												$comment_comment = $row["comment"];
												$comment_date = $row["date"];
												$comment_time = $row["time"];	
										?>
										<tr>
											<td width="70%"><?php echo $comment_comment ?></td>
											<td align="center"><?php echo $comment_date ?><br><?php echo substr($comment_time, 0, 8) ?></td>
										<tr>
										<?php
											}
										}
										else {
											echo "<div class='alert alert-info' role='alert' id='if_no_comment'>К сожалению, к этому признанию еще нет ни одного комментария. Оставьте свой, это так же полностью анонимно.</div>";
										}
										?>
									</table>
								</div>
							</div>
						</div>
						<!-- / Comments -->

						<?php
						}
						else {
							echo '<div class="alert alert-warning" role="alert"><span class="glyphicon glyphicon-warning-sign"></span> Извините, но такого ID не существует. Попробуйте еще раз.</div>';
						}
						?>
						
						
					</div>
				</div>
			</form>
<!-- FOOTER -->
<?php include "footer.php" ?>
