<!DOCTYPE html>
<html lang="en">
<?php 
session_start();
include('./db_connect.php');
?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>STN support</title>

    <!-- ================= Favicon ================== -->
    <!-- Standard -->
    <link rel="shortcut icon" href="http://placehold.it/64.png/000/fff">
    <!-- Retina iPad Touch Icon-->
    <link rel="apple-touch-icon" sizes="144x144" href="http://placehold.it/144.png/000/fff">
    <!-- Retina iPhone Touch Icon-->
    <link rel="apple-touch-icon" sizes="114x114" href="http://placehold.it/114.png/000/fff">
    <!-- Standard iPad Touch Icon-->
    <link rel="apple-touch-icon" sizes="72x72" href="http://placehold.it/72.png/000/fff">
    <!-- Standard iPhone Touch Icon-->
    <link rel="apple-touch-icon" sizes="57x57" href="http://placehold.it/57.png/000/fff">

    <!-- Styles -->
    <link href="css/lib/font-awesome.min.css" rel="stylesheet">
    <link href="css/lib/themify-icons.css" rel="stylesheet">
    <link href="css/lib/menubar/sidebar.css" rel="stylesheet">
    <link href="css/lib/bootstrap.min.css" rel="stylesheet">
    <link href="css/lib/helper.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>

<body>

        <div class="sidebar sidebar-hide-to-small sidebar-shrink sidebar-gestures">
            <div class="nano">
                <div class="nano-content">
                   
                    <ul>
                        <div class="logo"><a href="index.html">
                                <!-- <img src="images/logo.png" alt="" /> --><span><?php echo ucwords($_SESSION['login_firstname'].' '.$_SESSION['login_lastname']) ?>STN Support</span></a></div>
                                
                      <li><a href="index.php" ><i class="ti-home"></i> Dashboard 
                             
                       
                    </li></a>

                    <li><a href="overview.php"><i class="ti-briefcase"></i>Subscriptions overview </a></li>

                    <li><a href="smstatus.php"><i class="ti-bar-chart-alt"></i>Successful subscription </a></li>
                    <li><a href="smstatus30.php"><i class="ti-bar-chart-alt"></i>30 subscription </a></li>
                     
                    <li><a href="smstatus50.php"><i class="ti-bar-chart-alt"></i>50 subscription </a></li>
                   
                    <li><a href="smstatus90.php"><i class="ti-bar-chart-alt"></i> 90 subscription </a></li>
                        <li><a href="All-Attempts.php"><i class="ti-bar-chart-alt"></i> All attempts </a></li>
                        <li><a href=" "><i class="ti-hand-open"></i>Referalls </a></li>
                        <li><a href=" "><i class="ti-user"></i>Regestered Agents </a></li><?php if($_SESSION['login_type'] == 1): ?><?php endif; ?>
                        <li><a><i class="ti-close"></i> Logout</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- /# sidebar -->


    <div class="header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="float-left">
                        <div class="hamburger sidebar-toggle">
                            <span class="line"></span>
                            <span class="line"></span>
                            <span class="line"></span>
                        </div>
                    </div>
                     
            </div>
        </div>
    </div>




    <div class="content-wrap">
    <div class="main">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8 p-r-0 title-margin-right">
                    <div class="page-header">
                        <div class="page-title">
                            
                        </div>
                    </div>
                </div>
                <!-- /# column -->
           
                <!-- /# column -->
            </div>
            <!-- /# row -->
            <section id="main-content">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-title">
                                <h4>Top subscribers </h4>
                                
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Phone</th>
                                                <th>Status</th>
                                                <th>Date</th>
                                                <th>Package</th>
                                                <th>Number of subscriptions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th scope="row">#</th>
                                                <td> </td>
                                                <td><span class="badge badge-primary"> </span></td>
                                                <td> </td>
                                                <td class="color-primary"> </td>
                                                <td class="color-primary"> </td>
                                            </tr>
                                            
                                             
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /# column -->
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-title">
                                <h4>Location Data </h4>
                                
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                  <th>Location</th>
                                                <th>No of subsriptions</th>
                                                <th>Downtime period</th>
                                                <th>Date</th>
                                              
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th scope="row"> </th>
                                                <td> </td>
                                                <td><span class="badge badge-primary"> </span></td>
                                                <td> </td>
                                          
                                            </tr>
                                             
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /# column -->
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-title">
                                <h4>Total Dials </h4>
                                
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Phone</th>
                                                <th>Date</th>
                                               
                                                 
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th scope="row">1</th>
                                                <td> </td>
                                                <td><span class="badge badge-primary"> </span></td>
                                                <td> </td>
                                                 
                                            </tr>
                                          
                                             
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /# column -->
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-title">
                                <h4>Conversion </h4>
                                
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover ">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Phone</th>
                                                <th>Attempts</th>
                                                <th>package puchased</th>
                                                <th>Date</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th scope="row"> </th>
                                                <td> </td>
                                                <td><span class="badge badge-primary"> </span></td>
                                                <td></td>
                                                <td class="color-primary"> </td>
                                            </tr>
                                             
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- /# card -->
                    </div>
                    <!-- /# column -->
                </div>
                <!-- /# row -->

                <div class="row">
                    <div class="col-lg-12">
                        <div class="footer">
                            <p>2022 © stnsuport. - <a href="#"> </a></p>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>







<!-- jquery vendor -->
<script src="js/lib/jquery.min.js"></script>
<script src="js/lib/jquery.nanoscroller.min.js"></script>
<!-- nano scroller -->
<script src="js/lib/menubar/sidebar.js"></script>
<script src="js/lib/preloader/pace.min.js"></script>
<!-- sidebar -->

<!-- bootstrap -->
<script src="js/lib/bootstrap.min.js"></script><script src="js/scripts.js"></script>
<!-- scripit init-->





</body>

</html>