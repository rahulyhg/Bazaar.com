<?php
error_reporting(0);
session_start();
$conn = oci_connect($username = 'ns3',$password = 'Nnnmmm05',$connection_string = '//oracle.cise.ufl.edu/orcl');
$id=$_GET['c'];
   $stid = oci_parse($conn, "delete from admin_login where username='$id'");
   
   $r=oci_execute($stid);
?>