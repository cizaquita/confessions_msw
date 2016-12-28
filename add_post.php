<?php
require "assets/config.php";
// Insert Header
include "header.php";

?>
			
				<div class="row">
					<div class="col-sm-12">
						<ol class="breadcrumb">
						  <li><a href="index.php">My Secret World - Confessions</a></li>
						  <li class="active">Add your secret!</li>
						</ol>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-12">
						<div class="panel panel-success wow fadeIn" data-wow-duration="2s">
						  	<div class="panel-heading">
						    	<h3 class="panel-title">Add a secret</h3>
						  	</div>
							<div class="panel-body">
							  	 <div class="col-sm-4">
							  	 	<legend>Privacy policy:</legend>
								    <p>We do not save any data, we do not use cookies <b>to garantize the complete anonymity</b> in this site. If any confession have bad words will be deleted inmediatly.</p>
								</div>
							  	<div class="col-sm-8">
								    <legend>Secret:</legend>
		
									<div class="form-group">
										<textarea name="content" id="inputContent" class="form-control" rows="5" required="required"></textarea>
									</div>
									<button type="submit" name="submit_content" class="btn btn-primary pull-right" onclick="postadder(this)">Add your secret!</button>
							    </div> 
							</div>
						</div>
					</div>
				</div>


<?php include "footer.php"; ?>