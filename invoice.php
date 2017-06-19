<?php
error_reporting(0);
session_start();
$conn = oci_connect($username = 'ns3',
                         $password = 'Nnnmmm05',
                          $connection_string = '//oracle.cise.ufl.edu/orcl');
$u=$_SESSION['username'];
$o=$_SESSION['order'];
$sql1 = "select * from signup where username='$u'";
        $stid1 = oci_parse($conn, $sql1);
        oci_execute($stid1);
 if(oci_fetch($stid1))
 {
    $a=oci_result($stid1, 'STREET') ;
    $b=oci_result($stid1, 'CITY');
    $c=oci_result($stid1, 'STATE');
    $d=oci_result($stid2, 'ZIP');   
 }
 if($_SESSION['invoice']==0)
 {
 $sql2 = "select max(invoice_id) as m from invoice";
        $stid2 = oci_parse($conn, $sql2);
        oci_execute($stid2);
        oci_fetch($stid2);

    $e=oci_result($stid2, 'M');
    $e=$e+1;
$quantity=0;
$_SESSION['invoice']=$e;
}
$sql = "select inventory.id as q3, inventory.item as q1, inventory.unit_price as q2, q from (select item_id i, count(*) q from cart where username='$u' group by item_id),inventory where inventory.id=i";
$stid = oci_parse($conn, $sql);
oci_execute($stid);
$sql1 = "create or replace view h as select count(*) h,item_id,order_id from cart group by order_id, item_id";
$stid1 = oci_parse($conn, $sql1);
oci_execute($stid1);
$sql2 = "select discount*cost*0.01 total from(select h.h*inventory.unit_price cost,h.order_id 
from(select * from cart where username='$u') c, h,inventory 
where h.order_id=c.order_id and inventory.id=c.item_id) a,order2 where a.order_id=order2.order_id";
$stid2 = oci_parse($conn, $sql2);
oci_execute($stid2);
$sql3 = "select sum(total) total_amount from(select discount*cost*0.01 total from(select h.h*inventory.unit_price cost,h.order_id 
from(select * from cart where username='$u') c, h,inventory 
where h.order_id=c.order_id and inventory.id=c.item_id) a,order2 where a.order_id=order2.order_id)";
$stid3 = oci_parse($conn, $sql3);
oci_execute($stid3);

?>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Amazon</title>

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
	

	<script src="http://code.jquery.com/jquery-1.10.2.js"></script>
    <script src="http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
<style>

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
                <a href="index.php" class="navbar-brand" href="#">Bazaar</a>
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
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

		

<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="text-center">
                <i class="fa fa-search-plus pull-left icon"></i>
                <h2>Invoice for purchase #<?php echo $_SESSION['invoice'];?></h2>
            </div>
            <hr>
            <div class="row">
                <div class="col-xs-12 col-md-3 col-lg-3 pull-left">
                    <div class="panel panel-default height">
                        <div class="panel-heading">Billing Details</div>
                        <div class="panel-body">
                            <strong><?php echo $u; ?></strong><br>
                            <?php echo $a; ?><br>
                            <?php echo $b; ?><br>
                            <?php echo $c; ?><br>
                            <strong><?php echo $d; ?></strong><br>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-md-3 col-lg-3">
                    <div class="panel panel-default height">
                        <div class="panel-heading">Payment Information</div>
                        <div class="panel-body">
                            <strong>Card Name:</strong> Visa<br>
                            <strong>Card Number:</strong> ***** 332<br>
                            <strong>Exp Date:</strong> 09/2020<br>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-md-3 col-lg-3">
                    <div class="panel panel-default height">
                        <div class="panel-heading">Shipping Address</div>
                        <div class="panel-body">
                           <strong><?php echo $u; ?></strong><br>
                            <?php echo $a; ?><br>
                            <?php echo $b; ?><br>
                            <?php echo $c; ?><br>
                            <strong><?php echo $d; ?></strong><br>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="text-center"><strong>Order summary</strong></h3>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-condensed">
                            <thead>
                                <tr>
                                    <td><strong>Item Name</strong></td>
                                    <td class="text-center"><strong>Item Price</strong></td>
                                    <td class="text-center"><strong>Item Quantity</strong></td>
                                    <td class="text-center"><strong>Discount</strong></td>
                                    <td class="text-right"><strong>Total</strong></td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                        while(oci_fetch($stid))
                        {
                            $q=oci_result($stid, 'Q');
                            $q1=oci_result($stid, 'Q1');
                            $q2=oci_result($stid, 'Q2');
                            $q3=oci_result($stid, 'Q3');
                            $q4=oci_result($stid, 'Q4');
                            oci_fetch($stid2);
                            $subtotal=oci_result($stid2, 'TOTAL');
                            echo $subtotal;
                            $quantity=$quantity+$q;
                            
                            
                    
                    
                        
                    ?>
                                <tr>
                                    <td><?php echo $q1; ?></td>
                                    <td class="text-center">$<?php echo $q2; ?></td>
                                    <td class="text-center"><?php echo $q; ?></td>
									<td class="text-center">20%</td>
                                    <td class="text-right">$<?php echo $subtotal; ?></td>
                                </tr>
                              <?php }
                    
                            oci_fetch($stid3);
                            $total=oci_result($stid3, 'TOTAL_AMOUNT');
                            $t1=$total+20;
                               ?>

                                <tr>
                                    <td class="highrow"></td>
                                    <td class="highrow"></td>
                                    <td class="highrow text-center"><strong>Subtotal</strong></td>
									<td class="emptyrow"></td>
                                    <td class="highrow text-right">$<?php echo $total; ?></td>
                                </tr>
                                <tr>
                                    <td class="emptyrow"></td>
                                    <td class="emptyrow"></td>
                                    <td class="emptyrow text-center"><strong>Shipping</strong></td>
									<td class="emptyrow"></td>
                                    <td class="emptyrow text-right">$20</td>
                                </tr>
                                <tr>
                                    <td class="emptyrow"><i class="fa fa-barcode iconbig"></i></td>
                                    <td class="emptyrow"></td>
                                    <td class="emptyrow text-center"><strong>Total</strong></td>
									<td class="emptyrow"></td>
                                    <td class="emptyrow text-right">$<?php echo $t1; ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>		
		
		
		<!-- JavaScript includes -->

		<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script> 
		<script src="assets/js/bootstrap.min.js"></script>
		<script src="assets/js/customjs.js"></script>

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
	

</body>

</html>

<?php
$date=date('d-m-y');
$sql4 = "select first_name,last_name from user1 where username='$u'";
$stid4 = oci_parse($conn, $sql4);
oci_execute($stid4);
oci_fetch($stid4);
$first=oci_result($stid4, 'FIRST_NAME');
$last=oci_result($stid4, 'LAST_NAME');
$sql5 = "insert into invoice values(:n1,:n2,:n3,:n4,to_date(:n5,'DD-MM-YY'),:n6,:n7,:n8,:n9)";
$stid5 = oci_parse($conn, $sql5);
oci_bind_by_name($stid5, ':n1',$e);
oci_bind_by_name($stid5, ':n2', $o);
oci_bind_by_name($stid5, ':n3',$first);
oci_bind_by_name($stid5, ':n4', $last);
oci_bind_by_name($stid5, ':n5', $date);
oci_bind_by_name($stid5, ':n6', $e);
oci_bind_by_name($stid5, ':n7', $quantity);
oci_bind_by_name($stid5, ':n8', $u);
oci_bind_by_name($stid5, ':n9', $t1);
oci_execute($stid5);
$sql6 = "delete from cart where order_id='$o'";
$stid6 = oci_parse($conn, $sql6);
oci_execute($stid6);
$sql7 = "delete from order2 where order_id='$o'";
$stid7 = oci_parse($conn, $sql7);
oci_execute($stid7);
?>