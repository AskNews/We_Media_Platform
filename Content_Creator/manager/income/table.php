
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                               ALL TRANSACTION
                            </h2>
                            
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                                <form name="f1" action="news.php" method="post">
                                <div class="col-sm-5">
								<div class="dataTables_length" name="" id="DataTables_Table_0_length">
								<label>Show 
								<select name="sort" aria-controls="DataTables_Table_0" class="form-control show-tick">
                                <option class="wmp-input" <?php if(isset($_POST["sort"]) && $_POST['sort']=="") {echo "selected";} ?> value="">--Select--</option>
                                <option class="wmp-input" <?php if(isset($_POST["sort"]) && $_POST['sort']==1) {echo "selected";} ?> value="1">Ascending</option>
                                <option class="wmp-input" <?php if(isset($_POST["sort"])&& $_POST['sort']==2) {echo "selected";} ?> value=2>Descending</option>
                                </select> 
                                <button class="btn btn-primary waves-effect" name="btn_filter" id="submit" type="submit">FILTER</button>
                                </label>
								</div>
								</div>

                                <div class="col-sm-5">
                                <div id="DataTables_Table_0_filter" class="dataTables_filter">  
                                <label>Search:<input type="search" class="form-control input-sm" name="keyword" placeholder="" aria-controls="DataTables_Table_0">
                                <button class="btn btn-primary waves-effect"  name="btn_sort" id="submit" type="submit">SEARCH</button>
                               </form>
								</div>

                                </div>
                                <div class="row"><div class="col-sm-12"><table class="table table-bordered table-striped table-hover js-basic-example dataTable" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
                                    <thead>
                                        <tr role="row">
                                        <th class="" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 100px; height=50px;">Date</th>
                                        <th class="" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 100px; height=50px;">Amount Withdraw</th>
                                        <th class="" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 100px; height=50px;">Income</th>
                                        <th class="" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 100px; height=50px;">Balance</th></tr>
                                    </thead>
                                    <tbody>
                                    <tr role="row" class="odd">
                                    <?php
                                    while()
                                    {?>
                                        <td></td>
                                    <?php}
                                    ?>
                                        </tr>
                                    </tbody>
                                </table>
                            </div></div>
                            </div>
                        </div>
                    </div>
                </div>
