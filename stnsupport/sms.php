<!DOCTYPE html>
<html lang="en">
<?php 
session_start();
include('./db_connect.php');

                         
require 'vendor/autoload.php';

use AfricasTalking\SDK\AfricasTalking;


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
                                
                      <li><a href="index.php"><i class="ti-home"></i> Dashboard 
                             
                       
                    </li></a>

              <li><a href="overview.php"><i class="ti-briefcase"></i>Subscriptions overview </a></li>
                    <li><a href="smstatus.php"><i class="ti-bar-chart-alt"></i>Successful subscription </a></li>
                    <li><a href="smstatus30.php"><i class="ti-bar-chart-alt"></i>30 subscription  </a></li>
                     
                    <li><a href="smstatus50.php"><i class="ti-bar-chart-alt"></i>50 subscription </a></li>
                   
                    <li><a href="smstatus90.php"><i class="ti-bar-chart-alt"></i> 90 subscription </a></li>
                        <li><a href="All-Attempts.php"><i class="ti-bar-chart-alt"></i> All attempts </a></li>
                        <li><a href=""><i class="ti-hand-open"></i>Referalls </a></li>
                        <li><a href=""><i class="ti-user"></i>Regestered Agents </a></li><?php if($_SESSION['login_type'] == 1): ?><?php endif; ?>
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
                
                <!-- /# row -->
                <section id="main-content">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-title">
                                    
                               
                                </div>
                                  <div class="row">
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-title">
                                    <h4>SMS Advert</h4>
                                    
                                </div>
                                <div class="card-body">
                                    <div class="basic-form">  <?php
                                                $i = 1;
                                                $qry = $conn2->query("SELECT * from phone where id = ".$_GET['id']);
                                                while($row= $qry->fetch_assoc()): 
                                                    
                                                    $mobile1=$row['phone_n'];
                                                    $mobile="+".$mobile1;
                                                  
                                                ?> 
                                        <form method="post">
                                           
                                            <div class="form-group">
                                                <label>Send SMS to <?php echo ucwords($row['phone_n']) ?></label>
                                               
                                            </div>
                                            <div class="form-group">
                                                <label>Compose message</label>
                                                <input type="text" class="form-control" name="message" placeholder="message">
                                            </div>
                                          
                                            <input type="submit" name="send" class="btn btn-default"  placeholder="send">
                                        </form> <?php endwhile; ?>
                                         
              <?php
              
        if(isset($_POST['send']))
                {
                
 $message = $_POST['message'];
            
              


$username = 'Splynx'; // use 'sandbox' for development in the test environment
$apiKey   = 'b6811b50ca4e228ccb1d94c1be5e15f2bf4e51565ee3b4d5fb26ea74494b3c4a';// use your sandbox app API key for development in the test environment 
$AT       = new AfricasTalking($username, $apiKey);
$sms      = $AT->sms();
// $message="hello testing db";
 
   
$result   = $sms->send([
    'to'      => $mobile,
    'message' =>''.$message.'',
    'from'  => 'SkyTrend'
]);
       }                     ?>    
                                    
                                    
                                      
           
                                    </div>
                                </div>
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
                                <p>2022 © stn support - <a href="#">skytrendnetworks.com</a></p>
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
    <script src="js/lib/data-table/datatables.min.js"></script>
    <script src="js/lib/data-table/dataTables.buttons.min.js"></script>
    <script src="js/lib/data-table/jszip.min.js"></script>
    <script src="js/lib/data-table/pdfmake.min.js"></script>
    <script src="js/lib/data-table/vfs_fonts.js"></script>
    <script src="js/lib/data-table/buttons.html5.min.js"></script>
    <script src="js/lib/data-table/buttons.print.min.js"></script>
    <script src="js/lib/data-table/buttons.colVis.min.js"></script>
    <script src="js/lib/data-table/datatables-init.js"></script>










</body>

</html>