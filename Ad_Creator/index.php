<?php
$type="index";
include 'includes/header.php';
?>
<?php
$qry_ttl_ad=mysqli_query($con,"select count(id) as ttl_ad from tbl_adunit where approve=1  and ad_creator_id=".$creatorid);
$qry_ttl_pen_ad=mysqli_query($con,"select count(id) as ttl_pen_ad from tbl_adunit where approve=0  and ad_creator_id=".$creatorid);
$ttl_ad=mysqli_fetch_array($qry_ttl_ad);
$ttl_ad=$ttl_ad['ttl_ad'];
$ttl_pen_ad=mysqli_fetch_array($qry_ttl_pen_ad);
$ttl_pen_ad=$ttl_pen_ad['ttl_pen_ad'];
?>
<div class="main-content">
<div class="container">
<section class="statistic statistic2">       
<?php if($approve!=1)
                        { ?><label style="color:red;font-size:20px">Hi there...!!! You can continue creating ads, after your account get approved</label> <?php } ?>       
    <div class="row">
        <div class="col-md-6 col-lg-3">
            <div class="statistic__item statistic__item--blue">
                <h2 class="number"><?php echo $ttl_ad; ?></h2>
                <span class="desc">Total Ads</span>
                <div class="icon">
                    <i class=""></i>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="statistic__item statistic__item--red">
                <h2 class="number"><?php echo $ttl_pen_ad; ?></h2>
                <span class="desc">Total Pending Ads</span>
                <div class="icon">
                    <i class=""></i>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="statistic__item statistic__item--green">
                <h2 class="number"><?php echo $lifetime_amt; ?></h2>
                <span class="desc">Total Lifetime Deposite Amount</span>
                <div class="icon">
                    <i class="zmdi zmdi-money"></i>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="statistic__item statistic__item--orange">
                <h2 class="number"><?php echo $spend_amt; ?></h2>
                <span class="desc">Total Spend Amount</span>
                <div class="icon">
                    <i class="zmdi zmdi-money"></i>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="statistic__item statistic__item--green">
                <h2 class="number"><?php echo $wal_amt; ?></h2>
                <span class="desc">Current Wallet Amount</span>
                <div class="icon">
                    <i class="zmdi zmdi-money"></i>
                </div>
            </div>
        </div>
    </div>
</section>      
<section>
 
<section>
<div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                         <!-----------------------chart start------------------------------>
                         <div class="col-lg-10">
                                <div class="au-card m-b-30">
                                    <div class="au-card-inner">
                                        <h3 class="title-2 m-b-40">Month Wise Ads</h3>
                                        <canvas id="mybarChart"></canvas>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-10">
                                <div class="au-card m-b-30">
                                    <div class="au-card-inner">
                                        <h3 class="title-2 m-b-40">Category wise Ads</h3>
                                        <canvas id="mylineChart"></canvas>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-10">
                                <div class="au-card m-b-30">
                                    <div class="au-card-inner">
                                        <h3 class="title-2 m-b-40">Ad Status</h3>
                                        <canvas id="mydoughutChart"></canvas>
                                    </div>
                                </div>
                            </div>
                             <!-----------------------chart end------------------------------>
                            
                        </div>
                    </div>
</div>                        
</section>                             
</div>
</div>
<?php
include 'includes/footer.php';
?>
<!--------------------------bar chart start---------------------------------->
<?php
    $data;
    $con=mysqli_connect('localhost','root','','dbasknews');
    $qry=mysqli_query($con,"SELECT month,COUNT(ApprovedStatus) TotalApprovedStatus,
    COUNT(OfflineStatus) TotalOfflineStatus,  
    COUNT(PendingStatus) TotalPendingStatus,
    MonthNumber
    FROM (
        SELECT MonthTable.month, MonthTable.MonthNumber,
            CASE WHEN tbl_adunit.approve = 1 THEN 'Approved' END  ApprovedStatus,
            CASE WHEN tbl_adunit.approve = 0 THEN 'Pending' END PendingStatus,
            CASE WHEN tbl_adunit.offline = 1 THEN 'OffLine'  END  OfflineStatus
        FROM (
        SELECT 'January' AS
        MONTH,1 AS MonthNumber
        UNION SELECT 'February' AS
        MONTH ,2 AS MonthNumber
        UNION SELECT 'March' AS
        MONTH ,3 AS MonthNumber
        UNION SELECT 'April' AS
        MONTH ,4 AS MonthNumber
        UNION SELECT 'May' AS
        MONTH ,5 AS MonthNumber
        UNION SELECT 'June' AS
        MONTH ,6 AS MonthNumber
        UNION SELECT 'July' AS
        MONTH ,7 AS MonthNumber
        UNION SELECT 'August' AS
        MONTH ,8 AS MonthNumber
        UNION SELECT 'September' AS	MONTH ,9 AS MonthNumber
        UNION SELECT 'October' AS
        MONTH ,10 AS MonthNumber
        UNION SELECT 'November' AS
        MONTH ,11 AS MonthNumber
        UNION SELECT 'December' AS
        MONTH ,12 AS MonthNumber
        ) AS MonthTable
    LEFT JOIN `tbl_adunit` ON MONTHNAME(`tbl_adunit`.`c_date`) = Monthtable.month and  tbl_adunit.ad_creator_id='$creatorid'
    )  AS Result
 
    GROUP BY month,MonthNumber
    ORDER BY MonthNumber");
                    while($r=mysqli_fetch_array($qry))
                    {
                        $o[]=$r;
                    }
                    $data=$o;
    
    
    ?>
<script>
var jsonData=<?php echo json_encode($data);?>;
	var monthNames = jsonData.map(function(v){
		return v.month;
	});
	var totalApprovedStatus = jsonData.map(function(v){
		return v.TotalApprovedStatus;
	});
	var totalPendingStatus = jsonData.map(function(v){
		return v.TotalPendingStatus;
	});
	var totalOfflineStatus = jsonData.map(function(v){
		return v.TotalOfflineStatus;
	});
(function ($) {
  // USE STRICT
  "use strict";
  try {
    //bar chart
    var ctx = document.getElementById("mybarChart");
    if (ctx) {
      ctx.height = 200;
      var myChart = new Chart(ctx, {
        type: 'bar',
        defaultFontFamily: 'Poppins',
        data: {
          labels: monthNames,
          datasets: [
            {
              label: "Approved",
              data: totalApprovedStatus,
              borderColor: "rgba(0, 123, 255, 0.9)",
              borderWidth: "0",
              backgroundColor: "rgba(0, 123, 255, 0.5)",
              fontFamily: "Poppins"
            },
            {
              label: "Pending",
              data:totalPendingStatus,
              borderColor: "rgba(0,0,0,.09)",
              borderWidth: "0",
              backgroundColor: "rgba(0,0,0,.07)",
              fontFamily: "Poppins"
            },
            {
              label: "Dis-Approved",
              data:totalOfflineStatus,
              borderColor: "rgba(0, 180,355, 0.18)",
              borderWidth: "0",
              backgroundColor: "rgb(120, 120, 120)",
              fontFamily: "Poppins"
            }
          ]
        },
        options: {
          legend: {
            position: 'top',
            labels: {
              fontFamily: 'Poppins'
            }

          },
          scales: {
            xAxes: [{
              ticks: {
                fontFamily: "Poppins"

              }
            }],
            yAxes: [{
              ticks: {
                beginAtZero: true,
                fontFamily: "Poppins"
              }
            }]
          }
        }
      });
    }


  } catch (error) {
    console.log(error);
  }
})(jQuery);
</script>

    <!---------------------------bar chart end--------------------------------->

    <!-------------------------line chart start------------------------------->
    <?php
$qry=mysqli_query($con,"select title from tbl_categories order by title");
$d=array();
while($r=mysqli_fetch_array($qry))
{
	$d[]=$r['title'];
}
//print_r($d);
$app=array();
for($i=0;$i<count($d);$i++)
{
	$qry=mysqli_query($con,"select count(*) as a,c.title as title from tbl_adunit n, tbl_categories c where n.approve=1 and year(n.c_date)=year(now()) and c.id=n.category_id and c.title='".$d[$i]."' and ad_creator_id='$creatorid' GROUP by n.category_id");
  //echo "select count(*) as a,c.title as title from tbl_adunit n, tbl_categories c where n.approve=1 and year(n.c_date)=year(now()) and c.id=n.category_id and c.title='".$d[$i]."' and ad_creator_id='$creatorid' GROUP by n.category_id<br/>";
  @$dd=mysqli_fetch_array($qry);
	@$a=$dd['a'];
	if(@$a==null)
		$a="0";
	array_push($app,$a);

 }
 //print_r($app);
	$pen=array();
for($i=0;$i<count($d);$i++)
{
	$qry=mysqli_query($con,"select count(*) as p,c.title as title from tbl_adunit n, tbl_categories c where n.approve=0 and year(n.c_date)=year(now()) and c.id=n.category_id and c.title='".$d[$i]."' and ad_creator_id='$creatorid' GROUP by n.category_id");
  //echo "select count(*) as p,c.title as title from tbl_adunit n, tbl_categories c where n.approve=0 and year(n.c_date)=year(now()) and c.id=n.category_id and c.title='".$d[$i]."' and ad_creator_id='$creatorid' GROUP by n.category_id<br/>"; 
  @$dd=mysqli_fetch_array($qry);
	@$p=$dd['p'];
	if(@$p==null)
		$p="0";
	array_push($pen,$p);

 }
 
 //print_r($pen);
	$off=array();
for($i=0;$i<count($d);$i++)
{
  $qry=mysqli_query($con,"select count(*) as o,c.title as title from tbl_adunit n, tbl_categories c where n.offline=1 and year(n.c_date)=year(now()) and c.id=n.category_id and c.title='".$d[$i]."'and ad_creator_id='$creatorid' GROUP by n.category_id");
 // echo "select count(*) as o,c.title as title from tbl_adunit n, tbl_categories c where n.offline=1 and year(n.c_date)=year(now()) and c.id=n.category_id and c.title='".$d[$i]."'and ad_creator_id='$creatorid' GROUP by n.category_id <br/>";
	@$dd=mysqli_fetch_array($qry);
	@$o=$dd['o'];
	if(@$o==null)
		$o="0";
	array_push($off,$o);

 }
 
 //print_r($off);

?>
<script>
var jsonData=<?php echo json_encode($d);?>;
	var jsonApp=<?php echo json_encode($app); ?>;
	var jsonPen=<?php echo json_encode($pen); ?>;
	var jsonOff=<?php echo json_encode($off); ?>;
	var dataPen=[];
	var dataOff=[];
	var dataApp=[];
	for(var i=0;i<jsonApp.length;i++)
	{ dataApp.push(parseInt(jsonApp[i]));}
	for(var i=0;i<jsonPen.length;i++)
	{ dataPen.push(parseInt(jsonPen[i]));}
	for(var i=0;i<jsonOff.length;i++)
	{ dataOff.push(parseInt(jsonOff[i]));}
(function ($) {
  // USE STRICT
  "use strict";
  try {

//line chart
var ctx = document.getElementById("mylineChart");
if (ctx) {
  ctx.height = 150;
  var myChart = new Chart(ctx, {
    type: 'line',
    data: {
      labels:jsonData ,
      defaultFontFamily: "Poppins",
      datasets: [
        {
          label: "Approved",
          borderColor: "rgba(0, 123, 255, 0.9)",
          borderWidth: "1",
          backgroundColor: "rgba(0, 123, 255, 0.5)",
          data: dataApp
        },
        {
          label: "Pending",
          borderColor: "rgba(0,0,0,.09)",
          borderWidth: "1",
          backgroundColor: "rgba(0,0,0,.07)",
          pointHighlightStroke: "rgba(26,179,148,1)",
          data: dataPen
        },
        {
          label: "Dis-Approved",
          borderColor: "rgba(0, 180,355, 0.18)",
          borderWidth: "1",
          backgroundColor: "rgb(120, 120, 120)",
          pointHighlightStroke: "rgba(26,179,148,1)",
          data: dataPen
        }
      ]
    },
    options: {
      legend: {
        position: 'top',
        labels: {
          fontFamily: 'Poppins'
        }

      },
      responsive: true,
      tooltips: {
        mode: 'index',
        intersect: false
      },
      hover: {
        mode: 'nearest',
        intersect: true
      },
      scales: {
        xAxes: [{
          ticks: {
            fontFamily: "Poppins"

          }
        }],
        yAxes: [{
          ticks: {
            beginAtZero: true,
            fontFamily: "Poppins"
          }
        }]
      }

    }
  });
}


} catch (error) {
console.log(error);
}


})(jQuery);
</script>

    <!-------------------------line chart end------------------------------->
  <!-------------------------Doughut chart start------------------------------->
   <?php
   
   $qry=mysqli_query($con,"select count(*) as c from tbl_adunit where approve=1");
$data=mysqli_fetch_array($qry);
$a=$data['c'];
$qry=mysqli_query($con,"select count(*) as c from tbl_adunit where approve=0");
$data=mysqli_fetch_array($qry);
$p=$data['c'];
$qry=mysqli_query($con,"select count(*) as c from tbl_adunit where offline=1");
$data=mysqli_fetch_array($qry);
$o=$data['c'];
   ?>

    <script>
(function ($) {
  // USE STRICT
  "use strict";

  try {

//doughut chart
var ctx = document.getElementById("mydoughutChart");
if (ctx) {
  ctx.height = 150;
  var myChart = new Chart(ctx, {
    type: 'doughnut',
    data: {
      datasets: [{
        data: [<?php echo $a ;?>,<?php echo $p ;?>,<?php echo $o ;?>],
        backgroundColor: [
          "rgba(0, 123, 255,0.9)",
          "rgba(0, 123, 255,0.5)",
          "rgba(0,0,0,0.07)"
        ],
        hoverBackgroundColor: [
          "rgba(0, 123, 255,0.9)",
          "rgba(0, 123, 255,0.5)",
          "rgba(0,0,0,0.07)"
        ]

      }],
      labels: [
        "Apprroved",
        "Pending",
        "Dis-Approved"
      ]
    },
    options: {
      legend: {
        position: 'top',
        labels: {
          fontFamily: 'Poppins'
        }

      },
      responsive: true
    }
  });
}
} catch (error) {
console.log(error);
}

})(jQuery);
</script>
 <!-------------------------Doughut chart end------------------------------->
