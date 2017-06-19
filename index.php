
<!DOCTYPE html>
<html lang="en">

<head title="Home">

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Heroic Features - Start Bootstrap Template</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/heroic-features.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<?php
error_reporting(0);
session_start();
// Before running, create the table:
//   CREATE TABLE MYTABLE (col1 NUMBER);
//$name='nikhil';

$conn = oci_connect($username = 'ns3',
                         $password = 'Nnnmmm05',
                          $connection_string = '//oracle.cise.ufl.edu/orcl');

if (!$conn) {
    $m = oci_error();
    trigger_error(htmlentities($m['message']), E_USER_ERROR);
}

// Prepare the statement
/*$stid = oci_parse($conn, 'SELECT * FROM login');
if (!$stid) {
    $e = oci_error($conn);
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
}*/

$sql1 = 'create or replace VIEW CN as select INVENTORY_ID, count(rating) c from rating where rating=10 group by INVENTORY_ID';
$stid1 = oci_parse($conn, $sql1);
oci_execute($stid1);
$sql = 'select b.item from (select distinct b.category, a.inventory_ID nam from (select INVENTORY_ID, max(c) from CN group by INVENTORY_ID) a,
inventory b where a.inventory_ID=b.id group by (a.INVENTORY_id,b.category)) a,inventory b where nam=b.ID AND ROWNUM<5';
$stid = oci_parse($conn, $sql);
oci_execute($stid);

$sql12 = "select sum(NUM_ROWS) s FROM ALL_TABLES WHERE OWNER='NS3'";
$stid12 = oci_parse($conn, $sql12);
oci_execute($stid12);
oci_fetch($stid12);
$nm=oci_result($stid12, 'S');
$u=$_SESSION['username'];
$sql121 = "select first_name f from user1 where username='$u'";
$stid121 = oci_parse($conn, $sql121);
oci_execute($stid121);
oci_fetch($stid121);
$nm1=oci_result($stid121, 'F');

/*

while (oci_fetch($stid)) {
    echo oci_result($stid, 'USERNAME') . " is ";

}
*/

// Displays:
//   1000 is Roma
//   1100 is Venice
//oci_free_statement($stid);
//oci_close($conn);
?>

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
                <a class="navbar-brand" href="index.php">Bazaar</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="cart.php">Cart</a>
                    </li>
                    <li>
                        <a href="search1.php">Search</a>
                    </li>
                    <li>
                        <a href="sell.html">Sell</a>
                    </li>
                    <li>
                        <a ><?php echo $nm; ?></a>
                    </li>
                    <li>
                        <a href="login.php">Logout</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Content -->
    <div class="container">

        <!-- Jumbotron Header -->
        <header class="jumbotron hero-spacer">
            <h1>A Warm Welcome <?php echo $nm1; ?>!</h1>
            <p>Buy and sell electronics, cars, fashion apparel, collectibles, sporting goods, digital cameras, baby items, and everything else on Bazaar</p>
            </p>
        </header>

        <hr>

        <!-- Title -->
        <div class="row">
            <div class="col-lg-12">
                <h3>Latest Features</h3>
            </div>
        </div>
        <!-- /.row -->

        <!-- Page Features -->
        <?php
        
        while(oci_fetch($stid))

    {  
        $n=oci_result($stid, 'ITEM') ;
        
        echo  '<div class="col-md-3 col-sm-6 hero-feature">
                <div class="thumbnail">
                    <img src="http://placehold.it/800x500" alt="">
                    <div class="caption">
                            <h3>'.$n.'</h3>
                            <p></p>
                        <p>
                            <a href="#" class="btn btn-primary">Buy Now!</a> <a href="#" class="btn btn-default">More Info</a>
                        </p>
                    </div>
                </div>
            </div>';

            
      };       
             
            
  ?>
        </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Your Website 2014</p>
                </div>
            </div>
        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
