<div class="col-sm-3">
<br/><br/><a href="feedback.php?feedback" class="wmp-button wmp-green" >Send Feedback</a>
</div>
<br/><br/>
<table class="wmp-table-all">
    <thead>
      <tr class="wmp-green">
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
        <a class="wmp-button wmp-red" href="?feedid=<?php echo $row["id"]; ?>">Delete</a>

        <div class="wmp-container">
        <div class="wmp-light-grey wmp-section">
        <button onclick="myFunction('Demo4')" class="wmp-button wmp-block">
        Show </button>
        <div id="Demo4" class="wmp-hide wmp-container">
            <p><?php echo $row['message'] ?></p>
        </div>
        </div>
        </td>
        <td>
        <!--<a class="btn bg-cyan waves-effect m-b-15" <?php //if($row['reply']==""){ echo 'disabled';}?> data-toggle="collapse" data-target="#reply" aria-expanded="false" aria-controls="collapseExample">
        <i class="material-icons"><big>reply</big></i>
        </a>-->
        <div class="wmp-container">
        <div class="wmp-light-grey wmp-section">
        <button onclick="myFunction('Demo5')" <?php if($row['reply']==""){ echo 'disabled';}?> class="wmp-button wmp-block">
        Show Reply</button>
        <div id="Demo5" class="wmp-hide wmp-container">
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
