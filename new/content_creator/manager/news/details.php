<br/><br/><br/>
<div class="news-card">
<div class="wmp-card-4">
<div class="wmp-container wmp-green">
  <h2>Add News</h2>
</div>
  <div class="table">
    <table class="wmp-table-all">
        <tr >
            <th >News Headline</th>
            <td><?php echo  wordwrap($update['HeadLine'],25,"<br>\n") ?></td>
        </tr>
        <tr >
            <th >News Url</th>
            <td><?php echo wordwrap($update['Url'],25,"<br>\n") ?></td>
        </tr>
        <tr >
            <th >SEO Title</th>
            <td><?php echo @$update['SeoTitle']; wordwrap($update['SeoTitle'],25,"<br>\n") ?></td>
        </tr>
        <tr >
            <th >News Summary</th>
            <td><?php echo wordwrap($update['Summary'],25,"<br>\n") ?></td>
        </tr>
        <tr >
            <th >SEO Description</th>
            <td><?php echo wordwrap($update['SeoDescription'],25,"<br>\n") ?></td>
        </tr>
        <tr >
            <th >News Details</th>
            <td><?php echo wordwrap($update['Details'],25,"<br>\n") ?></td>
        </tr>
        <tr >
            <th >News File</th>
            <td><img src='img/<?php echo @$update['FileAttach']; ?>' height='200px' widht='200px' ></td>
        </tr>
        
        <tr >
            <th >News Status</th>
            <td><?php if(@$update['Status']==1){ echo 'Active';}elseif(@$update['Status']==0){ echo 'In-Active';}elseif(@$update['Status']==2){ echo 'Draft';} ?></td>
        </tr>
        <!-- <tr>
            <td></td><td></td>
        </tr> -->
    </table>
</div><br/>
</div>
</div>