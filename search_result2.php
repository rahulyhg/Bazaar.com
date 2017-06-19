<?php
error_reporting(0);
session_start();
$s = $_GET["c1"];
 $conn = oci_connect($username = 'ns3',
                          $password = 'Nnnmmm05',
                          $connection_string = '//oracle.cise.ufl.edu/orcl');

         $sql6 = "select distinct category from inventory";
         $stid6 = oci_parse($conn, $sql6);
        oci_execute($stid6);
        $sql1 = "select distinct category from inventory where sub_category='$s'";
        $stid1 = oci_parse($conn, $sql1);
        oci_execute($stid1);

        if(oci_fetch($stid1))
        {
            $r=oci_result($stid1,"CATEGORY");
        }
        $sql2 = "select * from inventory where category='$r' AND sub_category='$s'";
        $stid2 = oci_parse($conn, $sql2);
        oci_execute($stid2);
        $k="All Categories";
if($_GET['c'])
{
$k=$_GET['c'];
$sql4 = "select distinct sub_category from inventory where category='$k'";
 $stid4= oci_parse($conn, $sql4);
        oci_execute($stid4);
}
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
	@import "http://fonts.googleapis.com/css?family=Roboto:300,400,500,700";

.container { margin-top: 20px; }
.mb20 { margin-bottom: 50px; } 

hgroup { padding-left: 15px; border-bottom: 1px solid #ccc; padding-top:100px;}
hgroup h1 { font: 500 normal 1.625em "Roboto",Arial,Verdana,sans-serif; color: #2a3644; margin-top: 0; line-height: 1.15; }
hgroup h2.lead { font: normal normal 1.125em "Roboto",Arial,Verdana,sans-serif; color: #2a3644; margin: 0; padding-bottom: 10px; }
.col-md-11 { padding-top:100px;}
.search-result .thumbnail { border-radius: 0 !important; }
.search-result:first-child { margin-top: 0 !important; }
.search-result { margin-top: 20px; }
.search-result .col-md-2 { border-right: 1px dotted #ccc; min-height: 140px; }
.search-result ul { padding-left: 0 !important; list-style: none;  }
.search-result ul li { font: 400 normal .85em "Roboto",Arial,Verdana,sans-serif;  line-height: 30px; }
.search-result ul li i { padding-right: 5px; }
.search-result .col-md-7 { position: relative; }
.search-result h3 { font: 500 normal 1.375em "Roboto",Arial,Verdana,sans-serif; margin-top: 0 !important; margin-bottom: 10px !important; }
.search-result h3 > a, .search-result i { color: #248dc1 !important; }
.search-result p { font: normal normal 1.125em "Roboto",Arial,Verdana,sans-serif; } 
.search-result span.plus { position: absolute; right: 0; top: 126px; }
.search-result span.plus a { background-color: #248dc1; padding: 5px 5px 3px 5px; }
.search-result span.plus a:hover { background-color: #414141; }
.search-result span.plus a i { color: #fff !important; }
.search-result span.border { display: block; width: 97%; margin: 0 15px; border-bottom: 1px dotted #ccc; }
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
@import url(http://fonts.googleapis.com/css?family=Concert+One);
@import url(http://fonts.googleapis.com/css?family=Advent+Pro:300);
html,body{
  height:100%;   
}

label[for=range] {
position: absolute;
top: 50%;
left: 50%;
margin-left: -175px;
margin-top: -32px;
height: 49px;
padding-top: 6px;
width: 350px;
padding-left: 13px;
-webkit-transform: skew(-62deg);
overflow: hidden;
padding-bottom: 10px;
}
label[for=range]:after {
content: "";
position: absolute;
bottom: 11px;
left: 69px;
height: 9px;
width: 278px;
box-shadow: 0px 3px 10px -3px rgba(0, 0, 0, 0.51);
-webkit-transform: skew(62deg);
}
input[type=range] {
-webkit-appearance: none;
background-color: transparent;
width: 300px;
height: 38px;
  padding-top:10px;
  overflow:hidden;
margin: 0;
margin-left: -20px;
transform-style: preserve-3d;
perspective: 300;
transform-origin: 50% 50% 300px;
perspective-origin: 50% -121%;
transform: skew(62deg);
}
input[type=range]:focus{
  outline:none;
}
input[type="range"]::-webkit-slider-thumb {
  position:relative;
     -webkit-appearance: none;
    cursor:pointer;
    background-color: transparent;
    width: 30px;
    height: 18px;
    box-shadow: 1px 5px 10px -1px rgba(0, 0, 0,0.2),
    -25px 0 0 10px rgba(90, 184, 6, 0.5),
    -75px 0 0 10px rgba(90, 184, 6, 0.5),
    -125px 0 0 10px rgba(90, 184, 6, 0.5),
    -175px 0 0 10px rgba(90, 184, 6, 0.5),
    -225px 0 0 10px rgba(90, 184, 6, 0.5),
    -275px 0 0 10px rgba(90, 184, 6, 0.5),
    -325px 0 0 10px rgba(90, 184, 6, 0.5);
  z-index:2;
}
input[type="range"]::-webkit-slider-thumb:after {
content: "";
position: absolute;
z-index: 1;
left: -285px;
top: -28px;
width: 300px;
height: 140px;
background: #9FE472;
transform: rotateX(90deg);
transform-origin: 0 0px 0;
transform: rotateX(90deg) translateY(-140px) translateZ(-18px);
}
input[type="range"]::-webkit-slider-thumb:before {
content: "< >";
font-family: 'Concert One', cursive;
position: absolute;
background: #eaebe5;
background: -moz-linear-gradient(top, #eaebe5 0%, #dcdedd 100%);
background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#eaebe5), color-stop(100%,#dcdedd));
background: -webkit-linear-gradient(top, #eaebe5 0%,#dcdedd 100%);
background: -o-linear-gradient(top, #eaebe5 0%,#dcdedd 100%);
background: -ms-linear-gradient(top, #eaebe5 0%,#dcdedd 100%);
background: linear-gradient(to bottom, #eaebe5 0%,#dcdedd 100%);
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#eaebe5', endColorstr='#dcdedd',GradientType=0 );
top: -2px;
left: 0px;
border-radius: 2px;
color: #5a5a5a;
text-shadow: 0 1px 0 white;
height: 22px;
width: 32px;
border-top: 1px solid white;
border-left: 1px solid white;
box-sizing: border-box;
text-align: center;
line-height: 19px;
font-size: 17px;
}
input[type="range"]::-webkit-slider-runnable-track:before {
content: "";
position: absolute;
height: 38px;
width: 283px;
background: #e8e8e8;
background: -moz-linear-gradient(top, #dfdfdf 0%, #d8d8d8 100%);
background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#dfdfdf), color-stop(100%,#d8d8d8));
background: -webkit-linear-gradient(top, #dfdfdf 0%,#d8d8d8 100%);
background: -o-linear-gradient(top, #dfdfdf 0%,#d8d8d8 100%);
background: -ms-linear-gradient(top, #dfdfdf 0%,#d8d8d8 100%);
background: linear-gradient(to bottom, #dfdfdf 0%,#d8d8d8 100%);
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#dfdfdf', endColorstr='#d8d8d8',GradientType=0 );
bottom: 0;
left: 0;
}
input[type="range"]::-webkit-slider-runnable-track:after {
content: "";
position: absolute;
height: 10px;
width: 270px;
background: rgb(247, 247, 247);
top: 0;
right: 26px;
transform: skew(62deg);
}
input[type=range]:before {
content: "";
position: absolute;
background: rgb(190, 190, 190);
box-shadow:0 1px 0 rgb(235, 235, 235);
width: 283px;
left: 0;
height: 1px;
top: 29px;
z-index: 1;
}
input[type=range]:after {
content: "";
position: absolute;
background: rgb(190, 190, 190);
width: 7px;
left: 3px;
border-radius: 50%;
height: 6px;
top: 26px;
z-index: 1;
box-shadow:30px 0 0 rgb(190, 190, 190),
60px 0 0 rgb(190, 190, 190),
90px 0 0 rgb(190, 190, 190),
120px 0 0 rgb(190, 190, 190),
150px 0 0 rgb(190, 190, 190),
180px 0 0 rgb(190, 190, 190),
210px 0 0 rgb(190, 190, 190),
240px 0 0 rgb(190, 190, 190),
270px 0 0 rgb(190, 190, 190),
60px 1px 0 rgb(235, 235, 235),
90px 1px 0 rgb(235, 235, 235),
120px 1px 0 rgb(255, 255, 255),
150px 1px 0 rgb(235, 235, 235),
180px 1px 0 rgb(235, 235, 235),
210px 1px 0 rgb(235, 235, 235),
240px 1px 0 rgb(235, 235, 235),
270px 1px 0 rgb(235, 235, 235);
}

.budget {
position: absolute;
top: 50%;
left:0;
margin-top: -100px;
text-align: center;
width: 100%;
font-size: 1.85em;
font-family: 'Advent Pro', sans-serif;
color: rgb(58, 58, 58);
}
.output {
position: absolute;
bottom: 50%;
left: 0;
margin-bottom: -100px;
text-align: center;
width: 100%;
font-size: 2em;
font-family: 'Advent Pro', sans-serif;
color: rgba(132, 206, 66, 1);
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
            <h1>Search Results</h1>
        </header>
	<div class="row">
		<div class="col-md-8">
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
					  <div class="col-md-4" >
								<form class="form-horizontal" role="form">
                                  <div class="form-group">
                                    <label for="filter">Filter by</label>
                                    <select class="form-control" id="category" onchange="fun2()">
                                        <option value="0" selected><?php echo $k ?></option>
                                           <?php
                                           
                                            while(oci_fetch($stid6))
                                          {  
                                          $n=oci_result($stid6, 'CATEGORY') ;
                                          echo '<option value="'.$n.'">'.$n.'</option>';
                                         };
                                         ?>
                                    </select>
                                    <select class="form-control" id="sub_category" >
                                        <option value="0" selected>Sub Categories</option>
                                        <?php
                                           
                                            while(oci_fetch($stid4))
                                          {  
                                          $n=oci_result($stid4, 'SUB_CATEGORY') ;
                                          echo '<option value="'.$n.'">'.$n.'</option>';
                                         };
                                         ?>
                                    </select>

                                  </div>
                                <button type="button" class="btn btn-primary"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>

                                </form>

								</div>
          </div>
		  <div class="col-md-4">
		  		  		<p class="budget">Budget</p>
				<label for="range">
				<input type="range" name="range" id="range" min="0" max="300" step="5" value="175"/>
				</label>
				<output for="range" class="output"></output>
				</div>
		</div>
		<div class="row">

		<hgroup class="mb20">
		<h1>Search Results</h1>
        <?php
         $sql3 = "select count(*) as cnt from inventory where category='$r' AND sub_category='$s'";
        $stid3 = oci_parse($conn, $sql3);
        oci_execute($stid3);
        if(oci_fetch($stid3))
        $t = oci_result($stid3, 'CNT');
        ?>

		<h2 class="lead"><strong class="text-danger"><?php echo $t; ?></strong> results were found for the search for <strong class="text-danger"><?php echo $s ?></strong></h2>								
	</hgroup>

    <section class="col-xs-12 col-sm-6 col-md-12">
        <?php
          while(oci_fetch($stid2))
          {

            $cat=oci_result($stid2, 'CATEGORY') ;
            $u=oci_result($stid2, 'UNIT_PRICE') ;
            $n=oci_result($stid2, 'ITEM') ;
            $l=oci_result($stid2, 'ID') ;

             $sql2 = "select rating from rating, inventory where inventory.id = rating.inventory_id AND inventory.item='$n'";
        $stid5 = oci_parse($conn, $sql2);
        oci_execute($stid5);
        if(oci_fetch($stid5))
        $r=oci_result($stid5, 'RATING') ;
        ?>
		<article class="search-result row">
			<div class="col-xs-12 col-sm-12 col-md-3">
				<a href="#" title="Lorem ipsum" class="thumbnail"><img src="http://lorempixel.com/250/140/people" alt="Lorem ipsum" /></a>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-2">
				<ul class="meta-search">
					<li><i class=""></i> <span><?php echo "$".$u;?></span></li>
					<li><i class=""></i> <span><?php echo $r."/10";?></span></li>
					<li><i class=""></i> <span><?php echo $cat;?></span></li>
				</ul>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-7 excerpet">
				<h3><a href="#" title=""><?php echo $n;?></a></h3>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatem, exercitationem, suscipit, distinctio, qui sapiente aspernatur molestiae non corporis magni sit sequi iusto debitis delectus doloremque.</p>						
                <span class="plus"><button type="button" value=<?php echo $l ?> class="btn btn-primary" onclick="fun3(this)" ><i class="glyphicon glyphicon-plus"></i></span>
			</div>
			<span class="clearfix borda"></span>
		</article>
         <?php }?>
        <!-- <article class="search-result row">
			<div class="col-xs-12 col-sm-12 col-md-3">
				<a href="#" title="Lorem ipsum" class="thumbnail"><img src="http://lorempixel.com/250/140/food" alt="Lorem ipsum" /></a>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-2">
				<ul class="meta-search">
					<li><i class=""></i> <span>02/13/2014</span></li>
					<li><i class=""></i> <span>8:32 pm</span></li>
					<li><i class=""></i> <span>Food</span></li>
				</ul>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-7">
				<h3><a href="#" title="">Voluptatem, exercitationem, suscipit, distinctio</a></h3>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatem, exercitationem, suscipit, distinctio, qui sapiente aspernatur molestiae non corporis magni sit sequi iusto debitis delectus doloremque.</p>						
                <span class="plus"><a href="#" title="Lorem ipsum"><i class="glyphicon glyphicon-plus"></i></a></span>
			</div>
			<span class="clearfix borda"></span>
		</article>

		<article class="search-result row">
			<div class="col-xs-12 col-sm-12 col-md-3">
				<a href="#" title="Lorem ipsum" class="thumbnail"><img src="http://lorempixel.com/250/140/sports" alt="Lorem ipsum" /></a>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-2">
				<ul class="meta-search">
					<li><i class=""></i> <span>01/11/2014</span></li>
					<li><i class=""></i> <span>10:13 am</span></li>
					<li><i class=""></i> <span>Sport</span></li>
				</ul>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-7">
				<h3><a href="#" title="">Voluptatem, exercitationem, suscipit, distinctio</a></h3>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatem, exercitationem, suscipit, distinctio, qui sapiente aspernatur molestiae non corporis magni sit sequi iusto debitis delectus doloremque.</p>						
                <span class="plus"><a href="#" title="Lorem ipsum"><i class="glyphicon glyphicon-plus"></i></a></span>
			</div>
			<span class="clearfix border"></span>
		</article>			
 -->
	</section>
		</div>
	</div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
	<script>
$('#range').on("change", function() {
    $('.output').val(this.value +",000  $" );
    }).trigger("change");
</script>

</body>

</html>

<script language="javascript">
function fun3(obj)
{
    var selectedvalue=obj.value;
    console.log(selectedvalue);
    $.ajax({type : "GET",
        url : "test4.php?c="+selectedvalue,
        success : function(){

        }

    });
}

function fun2()
{
    var sel=document.getElementById("category");
    var selectedvalue=sel.options[sel.selectedIndex].value;
    //console.log(selectedvalue);
    window.location="http://localhost/search_result.php?c="+selectedvalue;
}

function fun1()
{
    var sel1=document.getElementById("sub_category");
    var selectedvalue1=sel1.options[sel1.selectedIndex].value;
    //console.log(selectedvalue1);
    window.location="http://localhost/search_result2.php?c1="+selectedvalue1;
}


</script>
