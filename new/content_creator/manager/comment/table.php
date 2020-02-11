<br/><br/>

<div class="wmp-card-4">
<div class="wmp-container wmp-green">
  <h2>Pending Comment</h2>
</div><br/><br/>
<table class="wmp-table-all">
    <thead>
      <tr class="wmp-green">
      <th>News Headline</th>
        <th>Date</th>
        <th>Comment</th>
        <th>User Name</th>
        <th>Action</th>
    </tr>    
    </tr>
    </thead>
    <tbody>
    <?php while($row=mysqli_fetch_assoc($result_comment)){ ?>
    <tr>
        <td class="sorting_1"><?php echo $row['headLine'];?></td>
        <td><?php echo $row['postdate']; ?></td>
        <td><?php echo $row['comment']; ?></td>
        <td><?php echo $row['user_name'];?></td>
        <td><a href="comment.php?deleteComment=<?php echo $row['id']?>" class="wmp-button wmp-red">Delete</a>
        <a href="comment.php?spam=<?php echo $row['id']?>" class="wmp-button wmp-yellow">Spam</a>
        </td>
    </tr>
    <?php } ?>
    
</tbody>
</table><br/><br/>
<div class="pagination">
  <a href="comment.php?page=1" class="<?php echo ($page<$total_pages_pen_com)?'disabled':'';?>">&laquo;</a>
  <?php
    for($i=1;$i<=$total_rec_pen_com;$i++)
    {
    ?>
    <a class="<?php echo ($i==$_GET['page'])?'active':'';?>" href="news.php?page=<?php echo $i;?>" ><?php echo $i;?></a>
    <?php }
    ?>
  <a href="comment.php?page=<?php echo $total_rec_pen_com;?>" class="<?php if($page>=$total_rec_pen_com){ echo "disabled";} ?>" >&raquo;</a>
</div>                



<br/><br/>

<div class="wmp-card-4">
<div class="wmp-container wmp-green">
  <h2>Approved Comment</h2>
</div><br/><br/>
<table class="wmp-table-all">
    <thead>
      <tr class="wmp-green">
      <th>News Headline</th>
        <th>Date</th>
        <th>Comment</th>
        <th>User Name</th>
        <th>Action</th>
    </tr>    
    </tr>
    </thead>
    <tbody>
    <?php while($row=mysqli_fetch_assoc($approve_comment)){ ?>
    <tr>
        <td class="sorting_1"><?php echo $row['headLine'];?></td>
        <td><?php echo $row['postdate']; ?></td>
        <td><?php echo $row['comment']; ?></td>
        <td><?php echo $row['user_name'];?></td>
        <td><a href="comment.php?deleteComment=<?php echo $row['id']?>" class="wmp-button wmp-red">Delete</a>
        <a href="comment.php?spam=<?php echo $row['id']?>" class="wmp-button wmp-yellow">Spam</a>
        </td>
    </tr>
    <?php } ?>
    
</tbody>
</table><br/><br/>
<div class="pagination">
  <a href="comment.php?page=1" class="<?php echo ($page<$total_pages_app_com)?'disabled':'';?>">&laquo;</a>
  <?php
    for($i=1;$i<=$total_pages_app_com;$i++)
    {
    ?>
    <a class="<?php echo ($i==$_GET['page'])?'active':'';?>" href="news.php?page=<?php echo $i;?>" ><?php echo $i;?></a>
    <?php }
    ?>
  <a href="comment.php?page=<?php echo $total_pages_app_com;?>" class="<?php if($page>=$total_pages_app_com){ echo "disabled";} ?>" >&raquo;</a>
</div>                


<br/><br/>

<div class="wmp-card-4">
<div class="wmp-container wmp-green">
  <h2>Spam Comment</h2>
</div><br/><br/>
<table class="wmp-table-all">
    <thead>
      <tr class="wmp-green">
      <th>News Headline</th>
        <th>Date</th>
        <th>Comment</th>
        <th>User Name</th>
        <th>Action</th>
    </tr>    
    </tr>
    </thead>
    <tbody>
    <?php while($row=mysqli_fetch_assoc($spam_comment)){ ?>
    <tr>
        <td class="sorting_1"><?php echo $row['headLine'];?></td>
        <td><?php echo $row['postdate']; ?></td>
        <td><?php echo $row['comment']; ?></td>
        <td><?php echo $row['user_name'];?></td>
        <td><a href="comment.php?deleteComment=<?php echo $row['id']?>" class="wmp-button wmp-red">Delete</a>
        
        </td>
    </tr>
    <?php } ?>
    
</tbody>
</table><br/><br/>
<div class="pagination">
  <a href="comment.php?page=1" class="<?php echo ($page<$total_pages_spam_com)?'disabled':'';?>">&laquo;</a>
  <?php
    for($i=1;$i<=$total_rec_spam_com;$i++)
    {
    ?>
    <a class="<?php echo ($i==$_GET['page'])?'active':'';?>" href="news.php?page=<?php echo $i;?>" ><?php echo $i;?></a>
    <?php }
    ?>
  <a href="comment.php?page=<?php echo $total_rec_spam_com;?>" class="<?php if($page>=$total_rec_spam_com){ echo "disabled";} ?>" >&raquo;</a>
</div>                
