
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="card">
        <div class="header">
            <h2>
                MY FEEDBACK
            </h2>
        </div>
        <div class="body">
        
            <div class="table-responsive">
                <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                
                <form name="f1" action="news.php" method="post">
                <div class="row"><div class="col-sm-12"><table class="table table-bordered table-striped table-hover js-basic-example dataTable" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
                    <thead>
                        <tr role="row">
                        <th class="" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 142px;">Feedback Topic</th>
                        <th class="" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 235px;">Date</th>
                        <th class="" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 103px;">File</th>
                        <th class="" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 103px;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php while($row=mysqli_fetch_assoc($result_feedback)) {?>
                        <tr>
                        <td><?php echo $row['subject'] ?></td>
                        <td><?php echo $row['c_date'] ?></td>
                        <td><img src="<?php echo "img"."/".$row['file'];?>" height="100px" widht="100px" ></td>
                        <!--<td></td>-->
                        <td>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="body">
                                
                                <a class="btn bg-cyan waves-effect m-b-15" data-toggle="collapse" data-target="#subject" aria-expanded="false" aria-controls="collapseExample">
                                <i class="material-icons"><big>remove_red_eye</big></i>
                                </a>
                                
                                <a class="btn bg-cyan waves-effect m-b-15" href="?feedid=<?php echo $row["id"]; ?>" data-toggle="tooltip" title="click to delete"  aria-expanded="false" aria-controls="collapseExample">
                                <i class="material-icons"><big>delete</big></i>
                                </a>
                                <div class="collapse" id="subject">
                                    <div class="well">
                                    <?php echo $row['message'] ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </td>
                        
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div></div>
        </div>
    </div>
</div>