<?php
error_reporting(0);
session_start();
         $conn = oci_connect($username = 'ns3',
                          $password = 'Nnnmmm05',
                          $connection_string = '//oracle.cise.ufl.edu/orcl');

        
        $sql1 = "select distinct category from inventory ";
        $stid1 = oci_parse($conn, $sql1);
        oci_execute($stid1);

$n=$_SESSION['username'];


?>        
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
                <a class="navbar-brand" href="#">Amazon</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="#">Orders</a>
                    </li>
                    <li>
                        <a href="#">Cart</a>
                    </li>
                    <li>
                        <a href="#">Search</a>
                    </li>
                    <li>
                        <a href="#">History</a>
                    </li>
                    <li>
                        <a href="#">Sell</a>
                    </li>
                    <li>
                        <a href="sell.html"><?php echo $n; ?></a>
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
	<div class="row">
		<div class="col-md-12">
            <div class="input-group" id="adv-search">
                <input type="text" class="form-control" placeholder="Search" />
                <div class="input-group-btn">
                    <div class="btn-group" role="group">
                        <div class="dropdown dropdown-lg">
                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><span class="caret"></span></button>
                            <div class="dropdown-menu dropdown-menu-right" role="menu">
                                <form class="form-horizontal" role="form">
                                  <div class="form-group">
                                    <label for="filter">Filter by</label>
                                    <select class="form-control" id="category" onchange="fun()">
                                        <option selected disabled>Select Category</option>
                                        <option value="0" selected>All Categories</option>
                                           <?php
                                           
                                            while(oci_fetch($stid1))
                                          {  
                                          $n=oci_result($stid1, 'CATEGORY') ;
                                          echo '<option value="'.$n.'">'.$n.'</option>';
                                         };
                                         ?>
                                        
                                    </select>

									<select class="form-control">
                                        <option value="0" selected>Sub Categories</option>
                                       <?php
                                           
                                            while(oci_fetch($stid))
                                          {  
                                          $n=oci_result($stid, 'SUB_CATEGORY') ;
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
                                  <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
                                </form>
                            </div>
                        </div>
                        <button type="button" class="btn btn-primary"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
                    </div>
                </div>
            </div>
          </div>
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

function fun()
{
    var sel=document.getElementById("category");
    var selectedvalue=sel.options[sel.selectedIndex].value;
    console.log(selectedvalue);
    window.location="http://localhost/search.php?c="+selectedvalue;
    
    // <?php 
    //  $sql = "select distinct sub_category from inventory where category='Technology'";
    //  //?>//+selectedvalue+"'";
    //  <?php
    //  $stid = oci_parse($conn, $sql);
    //  oci_execute($stid);
    //  echo "hey";
     // while(oci_fetch($stid))
     //                                      {  
     //                                      $n=oci_result($stid, 'SUB_CATEGORY') ;
     //                                      echo $n;
     //                                     };

   // ?>


}
</script>

