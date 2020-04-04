	<div class="row clearfix">
                <!-- Basic Examples -->
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                            QNA
                            </h2>
                        </div>
                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-xs-12 ol-sm-12 col-md-12 col-lg-12">                                
								<?php while ($row=mysqli_fetch_array($result_qna)){ ?>
                                        <div class="panel panel-primary">
                                            <div class="panel-heading" role="tab" id="headingTwo_1">
                                                <h4 class="panel-title">
                                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion_1" href="#<?php echo "id".$row['id'];?>" aria-expanded="false"
                                                       aria-controls="collapseTwo_1">     
														<?php  echo $row['question']; ?>
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="<?php echo "id".$row['id'];?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo_1">
                                                <div class="panel-body">
                                                   
													<?php echo $row['answer'];?>
                                                </div>
                                            </div>
                                        </div>
								<?php } ?>
                                    </div>
                                </div>
							</div>
                        </div>
                    </div>
                </div>