<?php 
 
error_reporting(0);
session_start();

$connection = oci_connect($username = 'ns3',$password = 'Nnnmmm05',$connection_string = '//oracle.cise.ufl.edu/orcl');

$user = $_POST['user'];
$pass = $_POST['pass'];
//echo $user;
//echo $pass;
$_SESSION["username"]=$user;
$_SESSION["check"]=0;
$_SESSION["invoice"]=0;
$sel=$_SESSION['sel'];
$error_flag = false;

if($user == ''){
   $error_flag = true;
}
if($pass == ''){
   $error_flag = true;
}

if($error_flag){
   echo "<br> Username or Password missing!</br>";
   echo "<br> <a href='login.php'>Please login again!</a></br>";
    exit();
}

if($sel == "User")
{
$statement = oci_parse($connection, "SELECT * FROM login WHERE username='$user' AND password='$pass'");
$result=oci_execute($statement, OCI_DEFAULT);
$results=array();
$numrows = oci_fetch_all($statement, $results, null, null, OCI_FETCHSTATEMENT_BY_ROW);
//echo $numrows;


if($result){
     if($numrows > 0){
      $_SESSION['username']=$user;
         header('Location: /index.php');
         // $page = include_once "index.php";
         // echo $page;
     }
    else{
        $error_flag = true;
        if($error_flag){
           echo '<br>Username and Password not found!</br>';
           echo "<br> <a href='login.php'>Please login again!</a></br>";
        }
    }
}
else{
   die("Query failed!");
}
}

if($sel == "Super Admin")
{
$statement = oci_parse($connection, "SELECT * FROM super_admin WHERE username='$user' AND password='$pass'");
$result=oci_execute($statement, OCI_DEFAULT);
$results=array();
$numrows = oci_fetch_all($statement, $results, null, null, OCI_FETCHSTATEMENT_BY_ROW);
//echo $numrows;


if($result){
     if($numrows > 0){
         header('Location: /super_admin.php');
         // $page = include_once "index.php";
         // echo $page;
     }
    else{
        $error_flag = true;
        if($error_flag){
           echo '<br>Username and Password not found!</br>';
           echo "<br> <a href='login.php'>Please login again!</a></br>";
        }
    }
}
else{
   die("Query failed!");
}
}

if($sel == "Admin")
{
$statement = oci_parse($connection, "SELECT * FROM admin_login WHERE username='$user' AND password='$pass'");
$result=oci_execute($statement, OCI_DEFAULT);
$results=array();
$numrows = oci_fetch_all($statement, $results, null, null, OCI_FETCHSTATEMENT_BY_ROW);
//echo $numrows;

if($result){
     if($numrows > 0){
      $_SESSION['admin']=$user;
         header('Location: /admin.php');
         // $page = include_once "index.php";
         // echo $page;
     }
    else{
        $error_flag = true;
        if($error_flag){
           echo '<br>Username and Password not found!</br>';
           echo "<br> <a href='login.php'>Please login again!</a></br>";
        }
    }
}
else{
   die("Query failed!");
}
}
oci_free_statement($statement);
oci_close($connection);
 
 ?>