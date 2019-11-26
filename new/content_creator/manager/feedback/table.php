<div class="col-sm-3">
<br/><br/><a href="feedback.php?feedback" class="w3-button w3-green" >Send Feedback</a>
</div>
<br/><br/>
<table class="w3-table-all">
    <thead>
      <tr class="w3-green">
      <th>Feedback Topic</th>
    <th>Date</th>
    <th>File</th>
    <th>Action</th>
    <th>Reply</th></tr>
    </thead>
    <tbody>
    <?php while($row=mysqli_fetch_assoc($result_feedback)){ ?>
    <tr>
    <td><?php echo $row['subject'] ?></td>
        <td><?php echo $row['c_date'] ?></td>
        <td><img src="<?php echo "img"."/".$row['file'];?>" height="100px" widht="100px" ></td>
        <!--<td></td>-->
        <td>
        <a class="w3-button w3-red" href="?feedid=<?php echo $row["id"]; ?>">Delete</a>

        <div class="w3-container">
        <div class="w3-light-grey w3-section">
        <button onclick="myFunction('Demo4')" class="w3-button w3-block">
        Show </button>
        <div id="Demo4" class="w3-hide w3-container">
            <p><?php echo $row['message'] ?></p>
        </div>
        </div>
        </td>
        <td>
        <!--<a class="btn bg-cyan waves-effect m-b-15" <?php //if($row['reply']==""){ echo 'disabled';}?> data-toggle="collapse" data-target="#reply" aria-expanded="false" aria-controls="collapseExample">
        <i class="material-icons"><big>reply</big></i>
        </a>-->
        <div class="w3-container">
        <div class="w3-light-grey w3-section">
        <button onclick="myFunction('Demo5')" <?php if($row['reply']==""){ echo 'disabled';}?> class="w3-button w3-block">
        Show Reply</button>
        <div id="Demo5" class="w3-hide w3-container">
            <p><?php echo $row['reply'] ?></p>
        </div>
        </div>
        </td>
    </tr>
    <?php } ?>
    
</tbody>
</table><br/><br/>
<div class="pagination">
  <a href="news.php?page=1" class="<?php echo ($page<$total_pages)?'disabled':'';?>">&laquo;</a>
  <?php
    for($i=1;$i<=$total_pages;$i++)
    {
    ?>
    <a class="<?php echo ($i==$_GET['page'])?'active':'';?>" href="news.php?page=<?php echo $i;?>" ><?php echo $i;?></a>
    <?php }
    ?>
  <a href="news.php?page=<?php echo $total_pages;?>" class="<?php if($page>=$total_pages){ echo "disabled";} ?>" >&raquo;</a>
</div>                
<br/><br/>
