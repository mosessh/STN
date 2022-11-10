<!DOCTYPE html>
<html lang="en">
  <?php session_start() ?>
<?php 
	if(!isset($_SESSION['login_id']))
	    header('location:login.php');
 
?>

    
    
<?php include('db_connect.php') ?>


   






    <?php include 'sidebar.php' ?>


 



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
                    <div class="float-right">
                        <div class="dropdown dib">
                            <div class="header-icon" data-toggle="dropdown">
                                <i class="ti-bell"></i>
                                <div class="drop-down dropdown-menu dropdown-menu-right">
                                    <div class="dropdown-content-heading">
                                        <span class="text-left">  <?php 
                                            $page = isset($_GET['page']) ? $_GET['page'] : 'home';
                                            include $page.'.php';
                                            ?></span>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                         
                        <div class="dropdown dib">
                            <div class="header-icon" data-toggle="dropdown">
                                
                                <div class="drop-down dropdown-profile dropdown-menu dropdown-menu-right">
                                  
                                    <div class="dropdown-content-body">
                                        <ul>
                                            <li>
                                                <a href="#">
                                                    <i class="ti-user"></i>
                                                    <span>Profile</span>
                                                </a>
                                            </li>

                                            <li>
                                                <a href="#">
                                                    <i class="ti-email"></i>
                                                    <span>Inbox</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <i class="ti-settings"></i>
                                                    <span>Setting</span>
                                                </a>
                                            </li>

                                            <li>
                                                <a href="#">
                                                    <i class="ti-lock"></i>
                                                    <span>Lock Screen</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <i class="ti-power-off"></i>
                                                    <span>Logout</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
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
                                <h1>Hello, <span>Welcome </span></h1>
                            </div>
                        </div>
                    </div>
                    <!-- /# column -->
                    
                    <!-- /# column -->
                </div>
                <!-- /# row -->
                <section id="main-content">
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="card">
                                <div class="stat-widget-one">
                                    <div class="stat-icon dib"><i class="ti-rss-alt color-success border-success"></i>
                                    </div>
                                    <div class="stat-content dib">
                                        <div class="stat-text">Total subscription</div>
                                        <div class="stat-digit"><?php echo $conn2->query("SELECT * FROM sms_status")->num_rows; ?></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="card">
                                <div class="stat-widget-one">
                                    <div class="stat-icon dib"><i class="ti-bell color-danger border-danger"></i>
                                    </div>
                                    <div class="stat-content dib">
                                        <div class="stat-text">Failed sms</div>
                                        <div class="stat-digit"><?php echo $conn2->query("SELECT * FROM sms_status where status!='Success'")->num_rows; ?></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="card">
                                <div class="stat-widget-one">
                                    <div class="stat-icon dib"><i class="ti-bar-chart"></i>
                                    </div>
                                    <div class="stat-content dib">
                                        <div class="stat-text">massages delivered</div>
                                        <div class="stat-digit"><?php echo $conn2->query("SELECT * FROM sms_status where status ='Success'")->num_rows; ?></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="card">
                                <div class="stat-widget-one">
                                    <div class="stat-icon dib"><i class="ti-link color-danger border-danger"></i></div>
                                    <div class="stat-content dib">
                                        <div class="stat-text">Referral</div>
                                        <div class="stat-digit">0</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                          <div class="row">
                        <div class="col-lg-8">
                            <div class="card">
                                <div class="card-title">
                                    <h4>statistics</h4>

                                </div>
                                <div class="card-body">
          <div id="morris-area-chart"></div>
                                </div>
                            </div>
                        </div>


 
            

                        <div class="col-lg-4"> 
                         <div class="card">

                                <div class="card-body">
                        
                        <?php
                        $con= new mysqli('localhost','u825147531_voucher','6~Aa#:1;7O:','u825147531_voucher')or die("Could not connect to mysql".mysqli_error($con));
                        $sql = "SELECT * from sms_status where status !='Success'";
                        
                        
                        if ($result1 = mysqli_query($con, $sql)) {
                        
                            // Return the number of rows in result set
                            $num2 = mysqli_num_rows( $result1 );
                            
                            // Display result
                            echo "<div id='num2'>" . $num2 . "</div>";  
                         }
                        ?>
                            
                        
                        <?php
                        $con= new mysqli('localhost','u825147531_voucher','6~Aa#:1;7O:','u825147531_voucher')or die("Could not connect to mysql".mysqli_error($con));
                        $sql = "SELECT * from sms_status where status='Success'";
                        
                        
                        if ($result = mysqli_query($con, $sql)) {
                        
                            // Return the number of rows in result set
                            $num = mysqli_num_rows( $result );
                            
                            // Display result
                            echo "<div id='num'>" . $num . "</div>";  
                         }
                        ?>
                            
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>


    <canvas id="myChart" style="width:100%;max-width:600px"></canvas>
    
    <script>
    var num = parseInt(document.getElementById('num').innerHTML);
    console.log(num);
    var xValues = ["failed sms", "send sms", "pending"];
    var yValues = [num2, num, 0];
    var barColors = [
      "#b91d47",
      "#00aba9",
      "#2b5797",
      "#e8c3b9",
      "#1e7145"
    ];
    
    new Chart("myChart", {
      type: "doughnut",
      data: {
        labels: xValues,
        datasets: [{
          backgroundColor: barColors,
          data: yValues
        }]
      },
      options: {
        title: {
          display: true,
          text: "USSD SMS Delivery Report"
        }
      }
    });
    </script></div></div>
                        </div>

 
                             


                    </div>
                    <div class="row">
                         
                        <!-- /# column -->
                        <div class="col-lg-8">
                            <div class="card">
                                <div class="card-title pr">
                                    <h4>Subscription list</h4>

                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table student-data-table m-t-20">
                                  
				<thead>
					<tr>
						<th>#</th>
						<th>Phone</th>
						<th>SMS Status</th>
							<th>Delivery Status</th>
						<th>amount Paid</th>
						<th>Package</th>
						<th>Purchase Date</th>
						<th>SMS cost</th>
						 
					</tr>
				</thead>
				<tbody>
					<?php
					$i = 1;
					$qry = $conn2->query("SELECT * from sms_status ORDER BY Datec desc");
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
								<span class="badge badge-info"> Free Plan</span>
							<?php elseif($row['amount'] =='30'): ?>
								<span class="badge badge-info">3mbps 6hrs</span>
							<?php elseif($row['amount'] =='50'): ?>
								<span class="badge badge-info">4mbps 10hrs</span>
							<?php elseif($row['amount'] =='90'): ?>
								<span class="badge badge-info">5mbps 24hrs</span>
							<?php endif; ?>
						</td>
						
							<td><b><?php echo $row['Datec'] ?></b></td>
						<td><b><?php echo $row['cost'] ?></b></td>

					 
					</tr>	
				<?php endwhile; ?>
				</tbody>
			</table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                   
                    

                    <!-- /# row -->
                   
                    <!-- /# row -->

                 
                     

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="footer">
                                <p>2022 © stn support. - <a href="#">skytrendnetworks.com</a></p>
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

    <script src="js/lib/bootstrap.min.js"></script>
    <script src="js/scripts.js"></script>
    <!-- bootstrap -->

    <script src="js/lib/calendar-2/moment.latest.min.js"></script>
    <script src="js/lib/calendar-2/pignose.calendar.min.js"></script>
    <script src="js/lib/calendar-2/pignose.init.js"></script>

    <script src="js/lib/morris-chart/raphael-min.js"></script>
    <script src="js/lib/morris-chart/morris.js"></script>
    <script src="js/lib/morris-chart/morris-init.js"></script>
    <script src="js/lib/weather/jquery.simpleWeather.min.js"></script>
    <script src="js/lib/weather/weather-init.js"></script>
    <script src="js/lib/circle-progress/circle-progress.min.js"></script>
    <script src="js/lib/circle-progress/circle-progress-init.js"></script>
    <script src="js/lib/chartist/chartist.min.js"></script>
    <script src="js/lib/sparklinechart/jquery.sparkline.min.js"></script>
    <script src="js/lib/sparklinechart/sparkline.init.js"></script>
    <script src="js/lib/owl-carousel/owl.carousel.min.js"></script>
    <script src="js/lib/owl-carousel/owl.carousel-init.js"></script>
    <!-- scripit init-->
    <script src="js/dashboard2.js"></script>
</body>

</html>