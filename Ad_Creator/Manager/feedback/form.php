<form method="post" action="#" enctype="multipart/form-data" >
<div class="col-lg-10">
<div class="card">
                                    <div class="card-header">
                                        <strong>SEND FEEDBACK</strong>
                                    </div>
                                    <div class="card-body card-block">
                                        <div class="form-group">
                                              <a href="feedback.php?showfeed" role="buttton" class="btn btn-success  " >SHOW FEEDBACK</a>
                                            
                                            </div>
                                            <div class="form-group">
                                                    <label for="select" class=" form-control-label">Select Category</label>
                                                    <select name="category" class="form-control">
                                                        <option value="">Please select</option>
                                                        <option value="Account Audition">Account Audition</option>
                                                        <option value="ad Audition">ad Audition</option>
                                                        <option value="Other">Others</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <textarea name="message" id="textarea-input" rows="9" placeholder="Content..." class="form-control"></textarea>
                                            </div>
                                            <div class="form-group">
                                                    <input type="file" name="file" >
                                                </div>
                                                <span class="error" ><?php echo @$error; ?></span>
                                        </form>
                                    </div>
                                    <div class="card-footer">
                                    <div class="form-actions form-group">
                                                <button type="submit" name="Submit" class="btn btn-success btn-sm">SEND</button>
                                            </div>
                                    </div>
                                </div>
                                </div>

