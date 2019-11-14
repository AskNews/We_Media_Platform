<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                   MY FEEDBACK
                </h2>
                
            </div>
            <div class="body">
                <div class="table-responsive">
                    <form method="post">
                    <div class="row"><div class="col-sm-12"><table class="table table-bordered table-striped table-hover js-basic-example dataTable" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
                        <thead>
                            <tr role="row">
                            <th class="" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 100px; height=50px;">Topic</th>
                            <th class="" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width:10px; height=50px;">Description</th>
                            <th class="" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 100px; height=50px;">Date</th>
                            <th class="" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 100px; height=50px;">Reply</th>
                            <th colspan=2 class="" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 100px; height=50px;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php while($row=mysqli_fetch_assoc($result_comment)){ ?>
                        <tr role="row" class="odd">
                                <td class="sorting_1"><?php echo $row['headLine'];?></td>
                                <td><?php echo $row['postdate']; ?></td>
                                <td><?php echo $row['comment']; ?></td>
                                <td><?php echo $row['user_name'];?></td>
                                <td><a href="comment.php?approve=<?php echo $row['comment_id']?>" class="btn btn-primary waves-effect">Approve</a>
                                <a href="comment.php?spam=<?php echo $row['comment_id']?>" class="btn btn-warning waves-effect">Spam</a></td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                    </form>
                </div>
            </div>
                  
            </div>
        </div>
    </div>
</div>
