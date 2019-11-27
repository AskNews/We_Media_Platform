
<br/>
<div class="col-sm-3">
<form class="w3-container" method="post" >
<a href="news.php?c_news" class="w3-button w3-green" >Add News</a>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="text" style="width:20%;display:inline-block;" class="w3-input" placeholder="Search" name="keyword" >
<!--<input type="submit" name="btn_search" value="Search" class="w3-button w3-green">-->
<button type="submit" name="btn_search" class="w3-button w3-green">Search</button>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<label>
<select name="newsType" class="w3-input" >
<option class="w3-input" value="">--Select--</option>
<option class="w3-input" value="0">Pending</option>
<option class="w3-input" value="1">Offline</option>
<option class="w3-input" value="2">Rejected</option>
<option class="w3-input" value="3">Draft</option>
</select> 
<button class="w3-button w3-green" name="btn_filter" id="submit" type="submit">FILTER</button>
</label>
</div>
</form>

<div class="table">
<table class="w3-table-all">
    <thead>
      <tr class="w3-green">
      <th>Headline</th>
        <th >File</th>
        <th >Modify Date</th>
        <th >Publish Date</th>
        <th >Views</th>
        <th >Status</th>
        <th >Action</th></tr>    
    </tr>
    </thead>
    <tbody>
        <?php
    while($row=mysqli_fetch_array($result_news))
    {?>
        <tr>
            <td><?php echo $row['HeadLine']?></td>
            <td><img src="<?php echo $imgPath."/".$row['FileAttach'];?>" height="100px" widht="100px" ></td>
            <?php if($row["Approved"]){ ?>
            <td><?php echo $row['ModifyDate'];?></td>
            <td><?php echo $row['PublishDate'];?></td>
            <td><?php echo $row['Views'];?></td>
            <?php } elseif($row["Approved"]==0 && $row["Offline"]==1 && $row["Rejected"]==3){ ?> 
            <td colspan='3'> Your News is offline due to <?php echo $row["RejectionMsg"]; ?></td>
            <?php }
            elseif($row["Approved"]==0 && $row["Offline"]==0 && $row["Rejected"]==1){ ?>
            <td colspan='3'>Pending</td>
            <?php } elseif($row["Approved"]==0 && $row["Rejected"]==2){ ?>
                <td colspan='3'>News is Rejected due to <?php echo $row["RejectionMsg"]; ?><br/> <a href="?newsid=<?php echo $row["NewsID"]; ?>">click to modify</a> </td>
            <?php } ?>
            <td>
            <a  href="?status=<?php echo $row["NewsID"];?>">
            <button <?php if($row["Approved"]==0 && $row["Offline"]==1 && $row["Rejected"]==3 || $row["Rejected"]==2){ echo "disabled";} ?>  class="btn <?php echo $row['Status']?'w3-button w3-green':'w3-button w3-red'?>"><?php if($row['Status']){ echo "Active";}else{ echo "In-Active";} ?></button>
            </a>        
            </td>
            <td><a  href="?newsid=<?php echo $row["id"]; ?>"><button class="w3-button w3-green">View News</button></a></td>
            </td>
            </tr>    
<?php   }//while
    ?> 
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
</div>