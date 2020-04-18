<div class="container">
                    <div class="au-card">
                        <div class="login-wra">
                            <div class="login-content">
                                <div class="login-logo">
                                    <a href="#">
                                        <b>Create Your Advertise Here</b>
                                    </a>
                                </div>
                                <div class="login-form">
                                    <form action="create_ad_code.php" method="post">
                                        <div class="row form-group">

                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label>Ad Unit Name</label>
                                                    <input class="au-input au-input--full" type="text" name="unit_name" placeholder="Unit Name">
                                                </div>
                                                <div class="form-group">
                                                    <label>Amount</label>
                                                    <input class="au-input au-input--full" type="amount" name="amount" placeholder="Amount">
                                                </div>
                                                <div class="form-group">
                                                    <label>Seo_title</label>
                                                    <input class="au-input au-input--full" type="text" name="seo_title" placeholder="Seo_Title">
                                                </div>
                                                <div class="form-group">
                                                    <label>Seo_Description</label>
                                                    <input class="au-input au-input--full" type="text" name="seo_desc" placeholder="Seo_Description">
                                                </div>
                                                <div class="form-group">
                                                    <label>Ad Unit Image</label>
                                                    <input type="file" id="file-input" name="file" class="form-control-file">
                                                </div>
                                           
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label>Catagory</label>
                                                    <div>
                                                        <select name="catagory" id="select" class="form-control">
                                                            <option value="0">Please select</option>
                                                            <option value="1">sports</option>
                                                            <option value="2">Entertainment</option>
                                                            <option value="3">Politics</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label>CPC</label>
                                                    <input class="au-input au-input--full" type="cpc" name="cpc" placeholder="CPC">
                                                </div>
                                                <div class="form-group">
                                                    <label>URL</label>
                                                    <input class="au-input au-input--full" name="url" placeholder="URL">
                                                </div>
                                                
                                                <div class="form-group">
                                                    <label>Status</label>
                                                    <div class="form-group">
                                                        <select name="status" id="select" class="form-control">
                                                            <option value="0">Please select</option>
                                                            <option value="1">Active</option>
                                                            <option value="2">In-Active</option>
                                                            <option value="2">Draft</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div style="margin-left:43%;">
                                                <button class="au-btn au-btn--block au-btn--green" type="submit">Submit</button>
                                            </div>
                                    </form>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>