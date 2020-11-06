
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">QNA</div>
                                    <?php
                                     while ($row=mysqli_fetch_array($result_qna)){ ?>
                                    <div class="card-body">
                                    <button style="text-align:left;" type="button" class="btn btn-outline-primary btn-lg active"><?php  echo $row['question']; ?></button>  
                                    <input id="ans1" name="ans1" type="text" class="form-control btn-lg" aria-required="true" value="<?php echo $row['answer'];?>">
                                    </div>
                                     <?php } ?>
                                </div>
                             </div>
                        </div>
                    </div>
                </div>
