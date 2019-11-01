
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                               ADD NEWS
                            </h2>
                            
                        </div>
                        <div class="body">
                            <form id="form_advanced_validation" method="POST">            
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <select class="form-control show-tick" name="category">
                                        <option value="">-- select category --</option>
                                        <option value="10">10</option>
                                        <option value="20">20</option>
                                        <option value="30">30</option>
                                        <option value="40">40</option>
                                        <option value="50">50</option>
                                    </select>
                                </div>    
                            </div>
                            <div class="form-group form-float">
                                    <div class="form-line">
                                    <label class="form-label">New Headline</label>
                                        <input type="url" class="form-control" name="newsheadline" required>
                                    </div>
                            </div>
                            <div class="form-group form-float">
                                    <div class="form-line">
                                    <label class="form-label">Url</label>
                                        <input type="url" class="form-control" name="url" required>
                                    </div>
                            </div>
                            <div class="form-group form-float">
                                    <div class="form-line">
                                    <label class="form-label">SEO Title</label>
                                        <input type="text" class="form-control" name="seotitle" required>  
                                    </div>
                            </div>
                            <div class="form-group form-float">
                                    <div class="form-line">
                                    <label class="form-label">SEO Description</label>
                                        <input type="text" class="form-control" name="seodes" required>    
                                    </div>
                            </div>
                            <div class="form-group form-float">
                            <label class="form-label" style="color:grey;">Attach File</label>
                                    <div class="form-line">
                                        <input type="file"  class="form-control" name="file_attach" required>    
                                    </div>
                            </div>
                            <div class="form-group form-float">
                                <label class="form-label">Details</label>
                                    <div class="form-line">
                                           <!-- Ckeditor -->
                                        <script src="plugins/ckeditor/ckeditor.js"></script>
                                            <textarea name="editor1">
                                            </textarea>
                                        <script>
                                            // Replace the <textarea id="editor1"> with a CKEditor
                                            // instance, using default configuration.
                                            CKEDITOR.replace("editor1");
                                        </script>
                                    </div>  
                            </div>
                            <div class="form-group form-float">
                                    <div class="form-line">
                                    <label class="form-label">Summary</label>
                                        <input type="text" class="form-control" name="summary" required>    
                                    </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <select class="form-control show-tick" name='status'>
                                        <option value="">-- Status --</option>
                                        <option value="10">Active</option>
                                        <option value="20">In-Active</option>
                                        
                                    </select>
                                </div>    
                            </div>
                                <button class="btn btn-primary waves-effect" type="submit">SUBMIT</button>
                            </form>
                        </div>
                        
                    </div>
                </div>
          