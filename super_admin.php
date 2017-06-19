<?php
error_reporting(0);
session_start();


         $conn = oci_connect($username = 'ns3',
                          $password = 'Nnnmmm05',
                          $connection_string = '//oracle.cise.ufl.edu/orcl');
$temp="reset";
if($_GET['c']){
$temp=$_GET['c'];
}	
if($temp == "reset"){
$sql1 = "select * from user1 where ROWNUM < 150";
        $stid1 = oci_parse($conn, $sql1);
        oci_execute($stid1);
 $name="User";
}
else if($temp == "admins"){

	$sql1 = "select * from admin a, admin_login al where a.admin_id=al.admin_id";
        $stid1 = oci_parse($conn, $sql1);
        oci_execute($stid1);
$name="Admin";
}
else if($temp == "users"){

$sql1 = "select * from user1 where ROWNUM < 150";
        $stid1 = oci_parse($conn, $sql1);
        oci_execute($stid1);
 $name="User";
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
                <a href="super_admin.php" class="navbar-brand" >Bazaar</a>
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

        <section class="container">

<br><br>
	<input type="search" class="light-table-filter" data-table="order-table" placeholder="Filtrer" />
  
  
  <select type="search" id="category"  onchange="fun()"> 
    <option value="0" selected><?php echo $temp ?></option>
    <option value="admins">Admins</option>  
	<option value="users">Users</option> 	
  </select>

	<table class="order-table">
		<thead>
			<tr>
				<th>Name</th>
				<th>Email</th>
				<th>Phone</th>
				<th>Type</th>
				<th> </th>
			</tr>
		</thead>
		<tbody>
			<?php
			while(oci_fetch($stid1))
			{
				$nam=oci_result($stid1, 'FIRST_NAME');
				$email=oci_result($stid1, 'EMAIL');
				$phn=oci_result($stid1, 'PHONE');
				$user=oci_result($stid1, 'USERNAME')
			
			?>
			<tr>
				<td><?php echo $nam; ?></td>
				<td><?php echo $email; ?></td>
				<td><?php echo $phn; ?></td>
				<td><?php echo $name; ?></td>
				<td><button type="submit" class="btn btn-primary" value=<?php echo $user ?> 
				<?php if($name=="User") { ?>
				onclick="fun3(this)"
				<?php } ?>
				<?php if($name=="Admin")
				{ ?> onclick="fun2(this)"
				<?php } ?>
				><span class="glyphicon glyphicon-remove" aria-hidden="true" onclick="fun()"></span></button></td>
			</tr>
			<?php } ?>
		</tbody>
	</table>

</section>
    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

     <!-- Bootstrap Core JavaScript -->
     <script src="js/bootstrap.min.js"></script>
	
 	<script>
	(function(document) {
	'use strict';

	var LightTableFilter = (function(Arr) {

		var _input;
    var _select;

		function _onInputEvent(e) {
			_input = e.target;
			var tables = document.getElementsByClassName(_input.getAttribute('data-table'));
			Arr.forEach.call(tables, function(table) {
				Arr.forEach.call(table.tBodies, function(tbody) {
					Arr.forEach.call(tbody.rows, _filter);
				});
			});
		}
    
		function _onSelectEvent(e) {
			_select = e.target;
			var tables = document.getElementsByClassName(_select.getAttribute('data-table'));
			Arr.forEach.call(tables, function(table) {
				Arr.forEach.call(table.tBodies, function(tbody) {
					Arr.forEach.call(tbody.rows, _filterSelect);
				});
			});
		}

		function _filter(row) {
      
			var text = row.textContent.toLowerCase(), val = _input.value.toLowerCase();
			row.style.display = text.indexOf(val) === -1 ? 'none' : 'table-row';

		}
    
		function _filterSelect(row) {
     
			var text_select = row.textContent.toLowerCase(), val_select = _select.options[_select.selectedIndex].value.toLowerCase();
			row.style.display = text_select.indexOf(val_select) === -1 ? 'none' : 'table-row';

		}

		return {
			init: function() {
				var inputs = document.getElementsByClassName('light-table-filter');
				var selects = document.getElementsByClassName('select-table-filter');
				Arr.forEach.call(inputs, function(input) {
					input.oninput = _onInputEvent;
				});
				Arr.forEach.call(selects, function(select) {
         select.onchange  = _onSelectEvent;
				});
			}
		};
	})(Array.prototype);

	document.addEventListener('readystatechange', function() {
		if (document.readyState === 'complete') {
			LightTableFilter.init();
		}
	});

})(document);
// 	</script>

</body>

</html>

<script language="javascript">
var selectedvalue;
function fun()
{
    var sel=document.getElementById("category");
    selectedvalue=sel.options[sel.selectedIndex].value;
    console.log(selectedvalue);
    window.location="http://localhost/super_admin.php?c="+selectedvalue;
}


function fun3(obj)
{
    var selectedvalue=obj.value;
    console.log(selectedvalue);
    $.ajax({type : "GET",
        url : "test2.php?c="+selectedvalue,
        success : function(){

        }

    });
    window.location="http://localhost/super_admin.php";
}

function fun2(obj)
{
    var selectedvalue=obj.value;
    console.log(selectedvalue);
    $.ajax({type : "GET",
        url : "test3.php?c="+selectedvalue,
        success : function(){

        }

    });
    window.location="http://localhost/super_admin.php";
}

</script>