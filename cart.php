<!DOCTYPE html>
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
body {
    padding-top: 50px;
}
.dropdown.dropdown-lg .dropdown-menu {
    margin-top: -1px;
    padding: 6px 20px;
}
.input-group-btn .btn-group {
    display: flex !important;
}
.btn-group .btn {
    border-radius: 0;
    margin-left: -1px;
}
.btn-group .btn:last-child {
    border-top-right-radius: 4px;
    border-bottom-right-radius: 4px;
}
.btn-group .form-horizontal .btn[type="submit"] {
  border-top-left-radius: 4px;
  border-bottom-left-radius: 4px;
}
.form-horizontal .form-group {
    margin-left: 0;
    margin-right: 0;
}
.form-group .form-control:last-child {
    border-top-left-radius: 4px;
    border-bottom-left-radius: 4px;
}

@media screen and (min-width: 768px) {
    #adv-search {
        width: 500px;
        margin: 0 auto;
    }
    .dropdown.dropdown-lg {
        position: static !important;
    }
    .dropdown.dropdown-lg .dropdown-menu {
        min-width: 500px;
    }
}

/*-----------------------------------
	General Styles
-----------------------------------*/

body{
	font-size : 14px;
	background-color: #f2f6f9;
}

ul{
	list-style-type: none;
}

a:hover {
	text-decoration:none;
}




/*-----------------------------------
	Breadcrumb 
-----------------------------------*/

.breadcrumb > .active a{
	color: #468595;
	font-weight: bold;
	text-transform: uppercase;
}

.breadcrumb li a{
	color :#b3d4dc;
	font-weight: bold;
	text-transform: uppercase;
}

.breadcrumb>li+li:before {
	content: "\00BB";
}

.breadcrumb{
	margin-bottom: 100px;
	background-color: #ffffff;
}

.breadcrumbBox{
	background-color: #ffffff;
	height: 100px;
	margin-bottom: 100px;
	padding-top: 32px;
}

/*----------------------------------- 
	Main
-----------------------------------*/

.container.text-center{
	padding: 0 32px;
}

/*-----------------------------------  
	Logo and description 
----------------------------------- */


.col-md-5.col-sm-12{
	padding: 0;
}

.col-md-5.col-sm-12 h1{
	color: #595c5f;
	font-size: 24px;
	font-weight: bold;
	margin-bottom:30px;
	text-align: left;
}

.col-md-5.col-sm-12 p{
	color: #898e92;
	line-height: 1.5;
	max-width: 400px;
	text-align: justify;
}

.bigcart{
	background:url(sprite.png);
	background-position: 0px 11px;
	background-repeat:no-repeat;
	width: 155px;
	height: 120px;
	margin:0 0 40px 60px;
}


/*-----------------------------------  
	Cart items list
-----------------------------------*/

.col-md-7.col-sm-12{
	padding-left: 50px ;
	margin-bottom: 72px;
}

.row{
	box-shadow: 0 1px 0 #e1e5e8;
	padding-bottom :0;
	padding-left: 15px;
	background-color: #ffffff;
	margin-bottom: 11px;
}

.row span{
	padding: 20px 0 6px 0;
}

/* Column Captions */

.columnCaptions{
	color: #7e93a7;
	font-size:12px;
	text-transform: uppercase;
	padding: 0;
	box-shadow: 0 0 0;
	background-color: #f2f6f9;
}

.columnCaptions span:first-child{
	padding-left:8px;
}

.columnCaptions span{
	padding: 0 21px 0 0;
}

.columnCaptions span:last-child{
	float: right;
	padding-right: 72px;
}


/* Items */

.itemName{	
	color: #727578;
	font-size :16px;
	font-weight: bold;
	float: left;
	padding-left:25px;
}


.quantity{	
	color: #4ea6bc;
	font-size :18px;
	font-weight: bold;
	float : left;
	width: 42px;
	padding-left: 7px;
}


.popbtn{
	background-color: #e6edf3;
	margin-left: 25px;
	height: 63px;
	width: 40px;
	padding: 32px 0 0 14px !important;
	float: right;
	cursor: pointer;
}

.arrow{
	width: 0; 
	height: 0; 
	border-left: 6px solid transparent;
	border-right: 6px solid transparent;
	border-top: 6px solid #858e97;
}

.price{
	color: #f06953;
	font-size :18px;
	font-weight: bold;
	float: right;
}

.cross{
	color: #f06953;
	font-size :18px;
	font-weight: bold;
	float: right;
}
/* Totals */

.totals{
	background-color: #f2f6f9;
}

.totals span{
	padding: 40px 15px 40px 0;
}

.totals .price{
	float: left;
}

.totals .itemName{
	margin-top: 1px;
}

.totals .order{
	float: right;
	padding: 0;
	margin-top: 40px; 
	padding-left: 5px;
	cursor: pointer;
}

.order a{
	background-color: #f08573;
	color: #fbfffa;
	font-weight: bold;
	border-radius: 2px;
	padding: 20px 30px;
}


/* Popovers */

.popover{
	border-radius: 3px;
	box-shadow: 0 0 1px 1px rgba(0,0,0,0.2);
	border: 0;
	background-color: #ffffff;
}

.popover.bottom{
	margin-top: -9px;
}

.glyphicon{
	width: 24px;
	font-size: 24px;
	padding: 0;
}

.glyphicon-pencil{
	color: #858e97;
	margin: 7px 12px 7px 10px;
}


/*-----------------------------------  
	Media Queries 
----------------------------------- */

/* Tablet size */

@media (max-width: 992px) {

	.container.text-center{
		padding: 0 15px;
	}

	.breadcrumb{
		margin-bottom: 32px;
	}

	.bigcart{
		margin: 0 auto 40px auto;
	}

	.col-md-5.col-sm-12 h1{
		text-align: center;
	}

	.col-md-5.col-sm-12 p{
		margin: 0 auto 64px auto;
		text-align: justify;
	}

	.col-md-7.col-sm-12{
		padding-left: 10px ;
		padding-right: 50px;
	}

	.totals{
		box-shadow: 0 0 0;
	}

}


/* Mobile device size */

@media (max-width: 768px) {

	.navbar{ 
		padding:10px 0;
	}
	
	.minicart{
		margin-right: -1px;
		padding-right: 0;
	}

	.navbar-brand{
		padding-left: 0;
	}

	.breadcrumbBox{
		height:80px;
		padding-top:21px;
	}

	.col-md-5.col-sm-12 p{
		max-width: 300px;
	}

	.col-md-7.col-sm-12{
		padding-left: 0;
		padding-right: 15px;
		margin-bottom: 32px;
	}

	.col-md-7.col-sm-12 ul{
		padding-left: 15px ;
	}

	.columnCaptions span{
		padding: 0 21px 0 0;
	}

	.columnCaptions span:last-child{
		float: right;
		padding-right: 42px;
	}

	.row{
		padding-bottom:10px;
	}

	.quantity{	
		width: 23px;
		padding-right: 40px !important;
	}

	.popbtn{
		background-color: white;
		position: absolute;
		height:40px;
		right: 0;
	}

	.price{	
		position: absolute;
		right: 42px;
	}
	.cross{	
		position: absolute;
		right: 44px;
	}
	.totals{
		padding: 0;
	}

	.totals .price{
		position: static;
	}

	/* Change Bootstrap's default popover to make it look nice on a mobile device */

	.popover.bottom>.arrow{
		left: auto;
		margin-left: 0;
		right: 5px;
	}

	.popover.bottom{
		margin-top: 7px;
		margin-left: -40px;
	}

}
</style>
</head>
<?php
error_reporting(0);
session_start();

$conn = oci_connect($username = 'ns3',
                         $password = 'Nnnmmm05',
                          $connection_string = '//oracle.cise.ufl.edu/orcl');

if (!$conn) {
    $m = oci_error();
    trigger_error(htmlentities($m['message']), E_USER_ERROR);
}
$n=$_SESSION['username'];
$sql = "select inventory.id as q3, inventory.item as q1, inventory.unit_price as q2, q from (select item_id i, count(*) q from cart where username='$n' group by item_id),inventory where inventory.id=i";
$stid = oci_parse($conn, $sql);
oci_execute($stid);

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
                <a href="index.php" class="navbar-brand" >Bazaar</a>
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

		<div class="container-fluid breadcrumbBox text-center">
			<ol class="breadcrumb">
				<li><a href="#">Review</a></li>
				<li class="active"><a href="#">Order</a></li>
				<li><a href="#">Payment</a></li>
			</ol>
		</div>
		
		<div class="container text-center">

			<div class="col-md-5 col-sm-12">
				<div class="bigcart"></div>
				<h1>Your shopping cart</h1>

			</div>
			
			<div class="col-md-7 col-sm-12 text-left">
				<ul>
					<li class="row list-inline columnCaptions">
						<span>QTY</span>
						<span>ITEM</span>
						<span>Price</span>
					</li>
					<?php
					$count=0;
      					while(oci_fetch($stid))
      					{
      						$q=oci_result($stid, 'Q');
      						$q1=oci_result($stid, 'Q1');
      						$q2=oci_result($stid, 'Q2');
      						$q3=oci_result($stid, 'Q3');
      						$count=$count + $q2;
      						// echo $q.$q1.$q2.$q3;
      				
      					
					?>
					<li class="row">      
						<span class="quantity"><input type="text" value=<?php echo $q ?> style="width: 30px"></span>
						<span class="itemName"><?php echo $q1 ?></span>
						<span class="popbtn"></span>
						<span class="price"><?php echo $q2 ?></span>
						<span class="cross"><button type="button" value=<?php echo $q3 ?> class="close" aria-label="Close" onclick="fun3(this)"><span aria-hidden="true">&times;</span></button></span>
					</li>
					<?php } ?>
					<li class="row totals">
						<span class="itemName">Total:</span>
						<span class="price">$<?php echo $count ?></span>
						<span class="order"> <a href="invoice.php" class="text-center">ORDER</a></span>
					</li>
				</ul>
			</div>

		</div>

		<!-- The popover content -->

		<div id="popover" style="display: none">
			<a href="#"><span class="glyphicon glyphicon-pencil"></span></a>
			<a href="#"><span class="glyphicon glyphicon-remove"></span></a>
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
<script>
function fun3(obj)
{
    var selectedvalue=obj.value;
    console.log(selectedvalue);
    //
    $.ajax({type : "GET",
        url : "test1.php?c="+selectedvalue,
        success : function(){

        }

    });
     window.location="cart.php";
}
</script>
