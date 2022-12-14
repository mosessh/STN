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
                                
                      <li><a href="index.php"><i class="ti-home"></i> Dashboard 
                             
                       
                    </li></a>

              <li><a href="overview.php"><i class="ti-briefcase"></i>Subscriptions overview </a></li>
                    <li><a href="smstatus.php"><i class="ti-bar-chart-alt"></i>Successful subscription </a></li>
                    <li><a href="smstatus30.php"><i class="ti-bar-chart-alt"></i>30 subscription  </a></li>
                     
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
                
                <!-- /# row -->
                <section id="main-content">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-title">
                                    
                                    
                                </div>
                                <div class="bootstrap-data-table-panel">
                                    <div class="table-responsive">
                                        <table class="table tabe-hover table-bordered" id="list">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Phone</th>
                                                    <th>SMS Status</th>
                                                        <th>Code Delivery Status</th>
                                                    <th>amount Paid</th>
                                                    <th>Package</th>
                                                    <th>Purchase Date</th>
                                                    <th>SMS cost</th>
                                                     
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $i = 1;
                                                $qry = $conn2->query("SELECT * from sms_status where amount ='90' ORDER BY Datec desc");
                                                while($row= $qry->fetch_assoc()):
                                                ?>
                                                <tr>
                                                    <th class="text-center"><?php echo $i++ ?></th>
                                                    <td><b><?php echo ucwords($row['phone']) ?></b></td>
                                                    
                                                    <td><b><?php echo $row['status'] ?></b></td>	
                                                    <td>
                                                    
                                                        <?php if($row['status'] =='Success'): ?>
                                                            <span class="badge badge-success">Done</span>
                                                        <?php elseif($row['status']): ?>
                                                            <span class="badge badge-danger">failed</span>
                                                        <?php else: ?>
                                                            <span class="badge badge-danger">Closed</span>
                                                        <?php endif; ?>
                                                    </td>
                                                    
                                                    
                                                    
                                                    <td><b><?php echo $row['amount'] ?></b></td>
                                                    
                                                        <td>
                                                    
                                                        <?php if($row['amount'] =='0'): ?>
                                                            <span class="badge badge-info">1hr Free Plan</span>
                                                        <?php elseif($row['amount'] =='30'): ?>
                                                            <span class="badge badge-info">3mbps for 6hrs</span>
                                                        <?php elseif($row['amount'] =='50'): ?>
                                                            <span class="badge badge-info">4mbps for 10hrs</span>
                                                        <?php elseif($row['amount'] =='90'): ?>
                                                            <span class="badge badge-info">5mbps for 24hrs</span>
                                                        <?php endif; ?>
                                                    </td>
                                                    
                                                        <td><b><?php echo $row['Datec'] ?></b></td>
                                                    <td><b><?php echo $row['cost'] ?></b></td>
                            
                                                    <td class="text-center">
                                                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                                                          Action
                                                        </button>
                                                        <div class="dropdown-menu" style="">
                                                          <a class="dropdown-item" href="./index.php?page=edit_sms&id=<?php echo $row['id'] ?>">View</a>
                                                          <div class="dropdown-divider"></div>
                                                          <a class="dropdown-item view_staff" href="javascript:void(0)" data-id="<?php echo $row['id'] ?>">Resend</a>
                                                        </div>
                                                    </td>
                                                </tr>	
                                            <?php endwhile; ?>
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
                                <p>2022 ?? stn support - <a href="#">skytrendnetworks.com</a></p>
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