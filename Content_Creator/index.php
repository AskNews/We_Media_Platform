<?php
$type="index";
	include "includes/header.php";
?>

<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h3>DASHBOARD</h3>
        <br/>
        <?php if($approve_account==0) { ?><div class='error'><h4><b><u> your account is not approved</u></b></h4></div> <?php } ?><br/><br/><br/>
        <div class="row clearfix">
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="info-box hover-zoom-effect">
                    <div class="icon bg-pink">
                        <i class="material-icons ">face</i>
                    </div>
                    <div class="content">
                        <div class="text">FOLLOWER</div>
                        <div class="number count-to" data-from="0" data-to="<?php echo $fl ?>" data-speed="1000" data-fresh-interval="20"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="info-box hover-zoom-effect">
                    <div class="icon bg-blue">
                        <i class="material-icons">trending_up</i>
                    </div>
                    <div class="content">
                        <div class="text">INDEX</div>
                        <div class="number count-to" data-from="0" data-to="<?php echo $index; ?>" data-speed="1000" data-fresh-interval="20"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="info-box hover-zoom-effect">
                    <div class="icon bg-indigo">	
                        <i class="material-icons">attach_money</i>
                    </div>
                    <div class="content">
                        <div class="text">BALANCE</div>
                        <div class="number count-to" data-from="0" data-to="<?php echo $bal; ?>" data-speed="1000" data-fresh-interval="20"></div>
                    </div>
                </div>
            </div>		
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="info-box hover-zoom-effect">
                    <div class="icon bg-lime">
                        <i class="material-icons">list</i>
                    </div>
                    <div class="content">
                        <div class="text">TOTAL NEWS</div>
                        <div class="number count-to" data-from="0" data-to="<?php echo $news; ?>" data-speed="1000" data-fresh-interval="20"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="info-box hover-zoom-effect">
                    <div class="icon bg-green">
                        <i class="material-icons ">timelapse</i>
                    </div>
                    <div class="content">
                        <div class="text">TOTAL PENDING NEWS</div>
                        <div class="number count-to" data-from="0" data-to="<?php echo $news_p; ?>" data-speed="1000" data-fresh-interval="20"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="info-box hover-zoom-effect">
                    <div class="icon bg-black">
                        <i class="material-icons">remove_red_eye</i>
                    </div>
                    <div class="content">
                        <div class="text">TOTAL VIEWS</div>
                        <div class="number count-to" data-from="0" data-to="<?php echo $views; ?>" data-speed="1000" data-fresh-interval="20"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="info-box hover-zoom-effect">
                    <div class="icon bg-red">
                        <i class="material-icons">favorite</i>
                    </div>
                    <div class="content">
                        <div class="text">TOTAL LIKES</div>
                        <div class="number count-to" data-from="0" data-to="<?php echo $t_like; ?>" data-speed="1000" data-fresh-interval="20"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row clearfix">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="header">
                        <div class="row clearfix">
                            <div class="col-xs-12 col-sm-6">
                                <h2>MONTH WISE NEWS </h2>
                            </div>
                        </div>
                    </div>
                    <div class="body">
                        <div id="news_graph"></div>
                        <?php 
                        $chart_qry=mysqli_query($con,"select Month,count(month(PublishDate)) NewsCountMonth FROM
                        ( select *,( CASE 
                            WHEN month(PublishDate)=01 THEN 'January'
                            WHEN month(PublishDate)=02 THEN 'February'
                            WHEN month(PublishDate)=03 THEN 'March'
                            WHEN month(PublishDate)=04 THEN 'April' 
                            WHEN month(PublishDate)=05 THEN 'May'
                            WHEN month(PublishDate)=06 THEN 'June' 
                            WHEN month(PublishDate)=07 THEN 'July' 
                            WHEN month(PublishDate)=08 THEN 'August' 
                            WHEN month(PublishDate)=09 THEN 'September' 
                            WHEN month(PublishDate)=10 THEN 'Octuber'
                            WHEN month(PublishDate)=11 THEN 'November' 
                            WHEN month(PublishDate)=12 THEN 'December' 
                            END) AS Month from tbl_news ) AS Result where Approved=1 and CreatorID=".$creatorid." GROUP BY Month order by month(PublishDate)");
                            
                        $arr=array();
                        $i=0;
                        while($row=mysqli_fetch_assoc($chart_qry))
                        {
                            if($row['Month']!=null)
                                $arr[]=$row;
                        }
                        ?>
                        <script src='js/jquery.min.js'></script>
                        <script src='js/morris.min.js'></script>
                        <script src='js/raphael-min.js'></script>
                        <script type="text/javascript" language="javascript" >
                        Morris.Bar({
                            element:'news_graph',
                            data:<?php echo json_encode($arr); ?>,
                            xkey:'Month',
                            ykeys:['NewsCountMonth'],
                            labels:['News Count']
                        });
                        </script>  
                                            </div>
                </div>


                <!------------------------------------------->
                <br/><br/><figure class="highcharts-figure">
                            <div id="container"></div>                        
                        </figure>
                        <?php
                            $qry=mysqli_query($con,"select title from tbl_categories order by title");
                            $d=array();
                            while($r=mysqli_fetch_array($qry))
                            {
                                $d[]=$r['title'];
                            }
                            $app=array();
                            for($i=0;$i<count($d);$i++)
                            {
                                $qry=mysqli_query($con,"select count(*) as a,c.title as title from tbl_news n, tbl_categories c where CreatorID=".$creatorid." and n.Approved=1 and year(n.PublishDate)=year(now()) and c.id=n.CategoryID and c.title='".$d[$i]."' GROUP by n.CategoryID");
                                @$dd=mysqli_fetch_array($qry);
                                @$a=$dd['a'];
                                if(@$a==null)
                                    $a="0";
                                array_push($app,$a);

                            }
                                $pen=array();
                            for($i=0;$i<count($d);$i++)
                            {
                                $qry=mysqli_query($con,"select count(*) as p,c.title as title from tbl_news n, tbl_categories c where n.Approved=0 and year(n.PublishDate)=year(now()) and c.id=n.CategoryID and c.title='".$d[$i]."' GROUP by n.CategoryID");
                                @$dd=mysqli_fetch_array($qry);
                                @$p=$dd['p'];
                                if(@$p==null)
                                    $p="0";
                                array_push($pen,$p);

                            }
                                $off=array();
                            for($i=0;$i<count($d);$i++)
                            {
                                $qry=mysqli_query($con,"select count(*) as o,c.title as title from tbl_news n, tbl_categories c where n.Offline=1 and year(n.PublishDate)=year(now()) and c.id=n.CategoryID and c.title='".$d[$i]."' GROUP by n.CategoryID");
                                @$dd=mysqli_fetch_array($qry);
                                @$o=$dd['o'];
                                if(@$o==null)
                                    $o="0";
                                array_push($off,$o);

                            }

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


Highcharts.chart('container', {
    chart: {
        type: 'bar'
    },
    title: {
        text: 'Category wise News of Current Year'
    },
    xAxis: {
        categories: jsonData
    },
    yAxis: {
        min: 0,
        title: {
            text: ''
        }
    },
    legend: {
        reversed: true
    },
    plotOptions: {
        series: {
            stacking: 'normal'
        }
    },
    series: [{
        name: 'Pending',
        data: dataPen
	}, 
	{
        name: 'Offline',
        data: dataOff
    }, {
        name: 'Approved',
        data: dataApp
    }]
});
</script>
                        <!------------------------------------------->

                        <!--------------------------->
                        <?php
                        $qry=mysqli_query($con,"select count(*) as c from tbl_news where Approved=1 and CreatorID=".$creatorid."");
                        $data=mysqli_fetch_array($qry);
                        $a=$data['c'];
                        $qry=mysqli_query($con,"select count(*) as c from tbl_news where Approved=0 and CreatorID=".$creatorid."");
                        $data=mysqli_fetch_array($qry);
                        $p=$data['c'];
                        $qry=mysqli_query($con,"select count(*) as c from tbl_news where Offline=1 and CreatorID=".$creatorid."");
                        $data=mysqli_fetch_array($qry);
                        $o=$data['c'];
                        ?>
                        <br><br><br><div id="chartContainer" style="height: 370px; width: 100%;"></div>
                        <script>
                        
                            window.onload = function() {    
                            var chart = new CanvasJS.Chart("chartContainer", {
                                animationEnabled: true,
                                title: {
                                    text: "All News Status"
                                },
                                data: [{
                                    type: "pie",
                                    startAngle: 240,
                                    yValueFormatString: "##\"\"",
                                    indexLabel: "{label} {y}",
                                    dataPoints: [
                                        {y: <?php echo $p; ?>, label: "Pending"},
                                        {y: <?php echo $o; ?>, label: "Offline"},
                                        {y: <?php echo $a; ?>, label: "Approved "}
                                    ]
                                }]
                            });
                            chart.render();

                            }
                            </script>
                                                <!--------------------------->

            </div>
           

        </div>
    </div>
</section>
<?php
include "includes/footer.php";
?>
