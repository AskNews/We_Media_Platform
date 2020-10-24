<div class="panel-body">
<div class="row">
								<div class="col-md-3">
                                <a href="#"><div class="metric">
										<span class="icon"><i class="fa fa-users"></i></span>
										<p>
											<span class="number"><?php echo showcount("tbl_ad_creator",NULL,NULL);?></span>
											<span class="title">Ad Creators</span>
										</p>
									</div></a>
								</div>
								<div class="col-md-3">
									 <a href="#"><div class="metric">
										<span class="icon"><i class="fa fa-users"></i></span>
										<p>
											<span class="number"><?php echo showcount("tbl_ad_creator","approval","1");?></span>
											<span class="title">Account Request</span>
										</p>
									</div></a>
								</div>
								<div class="col-md-3">
									 <a href="#"><div class="metric">
										<span class="icon"><i class="fa fa-newspaper-o"></i></span>
										<p>
											<span class="number"><?php echo showcount("tbl_adunit",NULL,NULL);?></span>
											<span class="title">Ads</span>
										</p>
									</div></a>
								</div>
								<div class="col-md-3">
									 <a href="#"><div class="metric">
										<span class="icon"><i class="fa fa-newspaper-o"></i></span>
										<p>
											<span class="number"><?php echo showcount("tbl_adunit","approve","0");?></span>
											<span class="title">Pendding Ads</span>
										</p>
									</div></a>
								</div>
							</div>
								
							<div class="row">
								<div class="col-md-3">
                                <a href="#"><div class="metric">
										<span class="icon"><i class="fa fa-commenting"></i></span>
										<p>
											<span class="number"><?php echo showcount("tbl_feedback","role","0");?></span>
											<span class="title">Feedbacks </span>
										</p>
									</div></a>
								</div>
								<div class="col-md-3">
									 <a href="#"><div class="metric">
										<span class="icon"><i class="fa fa-question-circle-o"></i></span>
										<p>
											<span class="number"><?php echo showcount("tbl_qna","role","0");?></span>
											<span class="title">Total Q&A </span>
										</p>
									</div></a>
								</div>
								<div class="col-md-3">
									 <a href="#"><div class="metric">
										<span class="icon"><i class="fa fa-newspaper-o"></i></span>
										<p>
											<span class="number">274,678</span>
											<span class="title">Reported Ads</span>
										</p>
									</div></a>
								</div>
								<div class="col-md-3">
									 <a href="#"><div class="metric">
										<span class="icon"><i class="fa fa-newspaper-o"></i></span>
										<p>
											<span class="number"><?php echo showcount("tbl_adunit","offline","1");?></span>
											<span class="title">Blocked Ads</span>
										</p>
									</div></a>
								</div>
							</div>
							
						</div>
				