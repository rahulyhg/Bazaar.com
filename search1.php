<?php
error_reporting(0);
session_start();

$k="All Categories";
         $conn = oci_connect($username = 'ns3',
                          $password = 'Nnnmmm05',
                          $connection_string = '//oracle.cise.ufl.edu/orcl');

        
        $sql1 = "select distinct category from inventory ";
        $stid1 = oci_parse($conn, $sql1);
        oci_execute($stid1);

if($_GET['c'])
{
$k=$_GET['c'];
$sql2 = "select distinct sub_category from inventory where category='$k'";
 $stid2 = oci_parse($conn, $sql2);
        oci_execute($stid2);
         // while(oci_fetch($stid2))
         //                                  {  
         //                                  $n=oci_result($stid2, 'sub_category') ;
         //                                  echo ".....".$n;
         //                                 };
}
$user=$_SESSION['username'];
$sql6 = "select count(*) c from cart where username='$user'";
 $stid6 = oci_parse($conn, $sql6);
        oci_execute($stid6);
        oci_fetch($stid6);
        $n=oci_result($stid6, 'C');
if($n==0)
{
if($_SESSION['check']==0)
{
$sql3 = "select max(order_id) as ma from order1 ";
        $stid3 = oci_parse($conn, $sql3);
        oci_execute($stid3);
        oci_fetch($stid3);
        $temp=oci_result($stid3, 'MA');
        $_SESSION['order']=$temp+1;
        $_SESSION['check']=1;

$date = date('d-m-y');

$stid4 = oci_parse($conn, "INSERT INTO order1(order_id, order_date) VALUES (:n1, to_date(:n4, 'DD-MM-YYYY'))");
oci_bind_by_name($stid4, ':n1', $_SESSION['order']);
oci_bind_by_name($stid4, ':n4', $date);
$r=oci_execute($stid4);

$stid5 = oci_parse($conn, "INSERT INTO order2(order_id, order_date,username,discount,quantity) VALUES (:n1,to_date(:n4, 'DD-MM-YYYY'),:n5,20,0)");
oci_bind_by_name($stid5, ':n1', $_SESSION['order']);
oci_bind_by_name($stid5,':n4', $date);
oci_bind_by_name($stid5, ':n5', $_SESSION['username']);
$r1=oci_execute($stid5);

}
}

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
	max-width: 500px;
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

    <!-- Page Content -->
    <div class="container">
        <header class="jumbotron hero-spacer">
            <h1>Search</h1>
        </header>
		<br>
		<br>
		<br>
		<div class="container">
		
		<div class="col-md-4">
            <div class="input-group" id="adv-search">
                <form action='search_result.php' id='signupform' method='POST'>
                <input type="text" class="form-control" placeholder="Search" name="search"/>
                <div class="input-group-btn">
                    <div class="btn-group" role="group">
						<input type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
                    </div>
                </div>
				</form>
            </div>
          </div>
		  <br>
		  <br>
		  <br>
		  <div class="col-md-12" >
								<form class="form-horizontal" role="form">
                                  <div class="form-group">
                                    <label for="filter">Filter by</label>
                                    <select class="form-control" id="category" onchange="fun()">
                                        <option selected disabled>Select Category</option>
                                        <option value="0" selected><?php echo $k ?></option>
                                           <?php
                                           
                                            while(oci_fetch($stid1))
                                          {  
                                          $n=oci_result($stid1, 'CATEGORY') ;
                                          echo '<option value="'.$n.'">'.$n.'</option>';
                                         };
                                         ?>
                                        
                                    </select>

									<select class="form-control" id="sub_category">
                                        <option value="0" selected>Sub Categories</option>
                                        <?php
                                           
                                            while(oci_fetch($stid2))
                                          {  
                                          $n=oci_result($stid2, 'SUB_CATEGORY') ;
                                          echo '<option value="'.$n.'">'.$n.'</option>';
                                         };
                                         ?>
                                    </select>
                                  </div>
                                  <div class="form-group">
                                    <label for="contain">Author</label>
                                    <input class="form-control" type="text" />
                                  </div>
                                  <div class="form-group">
                                    <label for="contain">Contains the words</label>
                                    <input class="form-control" type="text" />
                                  </div>
                                  <button type="button" class="btn btn-primary" onclick="fun1()"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
                                </form>
								</div>
		
		
		
	</div>
	</div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
	

</body>

</html>

<script language="javascript">
var selectedvalue;
function fun()
{
    var sel=document.getElementById("category");
    selectedvalue=sel.options[sel.selectedIndex].value;
    //console.log(selectedvalue);
    window.location="http://localhost/search1.php?c="+selectedvalue;
}

function fun1()
{
    var sel1=document.getElementById("sub_category");
    var selectedvalue1=sel1.options[sel1.selectedIndex].value;
    //console.log(selectedvalue1);
    window.location="http://localhost/search_result2.php?c1="+selectedvalue1;
}
</script>

