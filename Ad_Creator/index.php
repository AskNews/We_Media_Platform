<?php
$type="index";
include 'includes/header.php';
?>
<?php
echo $type;
?>
 <div class="main-content">
 <div class="container">
<div class="row m-t-25">
                            <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c1">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i   class="fa fa-text-height" aria-hidden="true"></i>
                                            </div>
                                            <div class="text">
                                                <h2>10</h2>
                                                <span>Total Advertisements</span>
                                            </div>
                                        </div>
                                        <div class="overview-chart">
                                            <canvas id="widgetChart1"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c2">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i  class="fa fa-eye" aria-hidden="true"></i>
                                            </div>
                                            <div class="text">
                                                <h2>0</h2>
                                                <span>Viewers</span>
                                            </div>
                                        </div>
                                        <div class="overview-chart">
                                            <canvas id="widgetChart2"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c3">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i  class="fa fa-clock-o" aria-hidden="true"></i>
                                            </div>
                                            <div class="text">
                                                <h2>2</h2>
                                                <span>Pendding Advertisements</span>
                                            </div>
                                        </div>
                                        <div class="overview-chart">
                                            <canvas id="widgetChart3"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c4">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i  class="fa fa-inr" aria-hidden="true"></i>
                                            </div>
                                            <div class="text">
                                                <h2>5000</h2>
                                                <span>Balance</span>
                                            </div>
                                        </div>
                                        <div class="overview-chart">
                                            <canvas id="widgetChart4"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
     </div>
     </div>
<?php
include 'includes/footer.php';
?>