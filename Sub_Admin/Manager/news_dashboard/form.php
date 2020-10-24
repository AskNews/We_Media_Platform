<div class="panel-body">
							<div class="row">
								<div class="col-md-3">
                                <a href="#"><div class="metric">
										<span class="icon"><i class="fa fa-users"></i></span>
										<p>
											<span class="number"><?php echo showcount("tbl_content_creator",NULL,NULL);?></span>
											<span class="title">Content Creators</span>
										</p>
									</div></a>
								</div>
								<div class="col-md-3">
									 <a href="#"><div class="metric">
										<span class="icon"><i class="fa fa-users"></i></span>
										<p>
											<span class="number"><?php echo showcount("tbl_content_creator","AccountApproval","0");?></span>
											<span class="title">Account Request</span>
										</p>
									</div></a>
								</div>
								<div class="col-md-3">
									 <a href="#"><div class="metric">
										<span class="icon"><i class="fa fa-newspaper-o"></i></span>
										<p>
											<span class="number"><?php echo showcount("tbl_news",NULL,NULL);?></span>
											<span class="title">News</span>
										</p>
									</div></a>
								</div>
								<div class="col-md-3">
									 <a href="#"><div class="metric">
										<span class="icon"><i class="fa fa-newspaper-o"></i></span>
										<p>
											<span class="number"><?php echo showcount("tbl_news","Approved","0");?></span>
											<span class="title">Pendding News</span>
										</p>
									</div></a>
								</div>
							</div>
							
							<div class="row">
								<div class="col-md-3">
                                <a href="#"><div class="metric">
										<span class="icon"><i class="fa fa-commenting"></i></span>
										<p>
											<span class="number"><?php echo showcount("tbl_feedback","role","2");?></span>
											<span class="title">Feedbacks </span>
										</p>
									</div></a>
								</div>
								<div class="col-md-3">
									 <a href="#"><div class="metric">
										<span class="icon"><i class="fa fa-question-circle-o"></i></span>
										<p>
											<span class="number"><?php echo showcount("tbl_qna","role","2");?></span>
											<span class="title">Total Q&A </span>
										</p>
									</div></a>
								</div>
								<div class="col-md-3">
									 <a href="#"><div class="metric">
										<span class="icon"><i class="fa fa-newspaper-o"></i></span>
										<p>
											<span class="number">274,678</span>
											<span class="title">Reported News</span>
										</p>
									</div></a>
								</div>
								<div class="col-md-3">
									 <a href="#"><div class="metric">
										<span class="icon"><i class="fa fa-newspaper-o"></i></span>
										<p>
											<span class="number"><?php echo showcount("tbl_news","Offline","1");?></span>
											<span class="title">Blocked News</span>
										</p>
									</div></a>
								</div>
							</div>
							
				
						</div>
				