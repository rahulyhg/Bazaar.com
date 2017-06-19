<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>PNSS</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/heroic-features.css" rel="stylesheet">
	
	<script src="http://code.highcharts.com/highcharts.js"></script>
    <title>Simple HighCharts Line Chart</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" />
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="http://code.angularjs.org/1.2.21/angular.js"></script>
    <!--<link rel="stylesheet" href="style.css" />-->
    <script src="http://code.highcharts.com/highcharts.src.js"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
	<style>
	
h2 {
  margin-bottom: 50px;
}

.container {
  text-align: center;
  overflow: hidden;
  width: 800px;
  margin: 0 auto;
}

.container table {
  width: 100%;
}

.container td, .container th {
  padding: 10px;
}

.container td:first-child, .container th:first-child {
  padding-left: 20px;
}

.container td:last-child, .container th:last-child {
  padding-right: 20px;
}

.container th {
  border-bottom: 1px solid #ddd;
  position: relative;
}
.wrapper {
    text-align: center;
}

.btn btn-primary{
    position: absolute;
    top: 50%;
}
	</style>

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a href="super_admin.php" class="navbar-brand">Bazaar</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="super_admin.php">List of Employees</a>
                    </li>
                    <li>
                        <a href="stats_superadin.php">Stats1</a>
                    </li>
                    <li>
                        <a href="stats2.php">Stats2</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
    <!-- Page Content -->
<div id="container" style="height: 70%; width: 70%"></div>
<div class="wrapper"><button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span></div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
	<script src="https://code.highcharts.com/highcharts.js"></script>
	<script src="https://code.highcharts.com/modules/exporting.js"></script>
	<?php
//   $j=0;
// $t1[$j]="141434.25";
// echo $t1[0];
// $m="ja";
  ?>
	<!-- Initializing highcharts -->
	<?php

  error_reporting(0);
session_start();


         $conn = oci_connect($username = 'ns3',
                          $password = 'Nnnmmm05',
                          $connection_string = '//oracle.cise.ufl.edu/orcl');

   $sql="select extract(month from invoice_date) v, sum(total_amount) su
from invoice where extract(year from invoice_date)=2015 
group by extract(month from invoice_date) order by extract(month from invoice_date)";

$stid1 = oci_parse($conn, $sql);
        oci_execute($stid1);
        $i=0;
        while(oci_fetch($stid1))
        {
          
          
          $t[$i]=oci_result($stid1, 'SU');
          $i++;
        }
        
  ?>
	<script>
var chart = new Highcharts.Chart({
  chart: {
    renderTo: 'container',
    marginBottom: 80,
	marginLeft: 500
  },
             title: {
                text: 'Sales Graph'
            },
  xAxis: {
    categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
    labels: {
      rotation: 90
    }
  },

  series: [{
    data: [<?php echo $t[0]; ?>, <?php echo $t[1]; ?>, <?php echo $t[2]; ?>, <?php echo $t[3]; ?>, <?php echo $t[4]; ?>, <?php echo $t[5]; ?>, <?php echo $t[6]; ?>, <?php echo $t[7]; ?>, <?php echo $t[8]; ?>, 143494.1, 134595.6, 143454.4]        
  }]
});
</script>
	
</body>

</html>
