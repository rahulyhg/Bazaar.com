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

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
	<script src="http://code.jquery.com/jquery-1.10.2.js"></script>
    <script src="http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
	
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


$sql ='select abc.first_name,abc.last_name,b from (select m.seller as b from (select sell_id,sum(price*quantity) as x from product_list a, products_list1 b where a.PROD_ID = b.PROD_ID group by sell_id order by x DESC) n,seller m where m.seller_id=n.sell_id AND ROWNUM=1)xyz,user1 abc where b=abc.username';
$stid = oci_parse($conn, $sql);
oci_execute($stid);


oci_fetch($stid);
$nm=oci_result($stid, 'FIRST_NAME');
// $st="Texas";
$lm=oci_result($stid, 'LAST_NAME');
$um=oci_result($stid, 'B');

$sql1=' select abc.first_name,abc.last_name,b from ( select seller as b from seller s1 
where not exists(
(select item from inventory i1,credible_items c1 where i1.id=c1.item_id and c1.sell_id=s1.seller_id)
minus
(select product_name from product_list p1,products_list1 p2 where p1.prod_id=p2.prod_id and p2.sell_id=s1.seller_id)
) and rownum<11) xyz,user1 abc where b=abc.username';

$stid1 = oci_parse($conn, $sql1);




$sql21="select k,max(bc) as i from (select d.STATE as k, sum(c.abc) as bc
        from SIGNUP d, (select a.USERNAME,sum(a.TOTAL_AMOUNT) as abc from invoice a, order2 b where a.ORDER_ID = b.ORDER_ID group by a.USERNAME) c 
        where d.USERNAME= c.USERNAME 
        group by d.state) group by k";
$stid21 = oci_parse($conn, $sql21);
oci_execute($stid21);
oci_fetch($stid21);
$st=oci_result($stid21, 'K');


$sql3='select extract(month from( b.date_added)) as mon,b.item as it from rating a,inventory b where 

a.inventory_id=b.id 

and extract(year from b.date_added)=12 group by extract(month from( b.date_added)),b.item order 

by extract(month from( b.date_added)) DESC' ;
$stid3 = oci_parse($conn, $sql3);


$sql4='select sum(quantity*unit_price) as y from INVENTORY ' ;
$stid4 = oci_parse($conn, $sql4);
oci_execute($stid4);


oci_fetch($stid4);
$st11=oci_result($stid4, 'Y');



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

	<div class="container">
        <h2>SELLER WITH MAXIMUM AMOUNT OF INVESTMENT IN THE INVENTORY</h2>
        <div class="alert alert-success alert-dismissable">
            <?php
             echo "NAME:  ";
             echo $nm;
             echo " ";
             echo $lm;
             echo "<br />\n";
             echo "USERNAME: ";
             echo $um;

            ?>
        </div>

    </div>
    

    <div class="container">
        <h2>SELLER WITH EACH PRODUCT APPROVED</h2>
        <div class="alert alert-success alert-dismissable">
<?php    
    oci_execute($stid1);
    while(oci_fetch($stid1))

    {  
        
        $nm=oci_result($stid1, 'FIRST_NAME');
$lm=oci_result($stid1, 'LAST_NAME');
        $nmn=oci_result($stid1, 'B') ;
        
             echo "NAME:  ";
             echo $nm;
             echo " ";
             echo $lm;
             echo " ";
             echo "<br />\n";
             echo "USERNAME: ";
             echo $nmn;
            echo "<br />\n";
            echo "<br />\n";

      }      ?>            




        
        </div>

    </div>

    <div class="container">
        <h2>STATE WITH MAXIMUM AMOUNT OF SALES</h2>
        <div class="alert alert-success alert-dismissable">
            <?php
             echo "STATE:  ";
             echo $st;
             
            ?>
        </div>

    </div>
	
	  <div class="container">
        <h2>MAXIMUM RATED PRODUCTS OF ALL MONTHS</h2>
        <div class="alert alert-success alert-dismissable">


            <?php    
    oci_execute($stid3);
    while(oci_fetch($stid3))

    {  
        
        $nom=oci_result($stid3, 'IT');
        $mom=oci_result($stid3, 'MON');

             echo "MONTH ";
             echo $mom;
             echo "  PRODUCT:  ";
             echo $nom;

          
            echo "<br />\n";
           
      };       ?>            


        </div>

    </div>
    
	
	  <div class="container">
        <h2>NET INVENTORY WORTH</h2>
        <div class="alert alert-success alert-dismissable">
            <?php
             echo "NET INVENTORY WORTH:  $";
             echo $st11;
             
            ?>
        </div>

    </div>
    <!-- /.container -->
	

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
