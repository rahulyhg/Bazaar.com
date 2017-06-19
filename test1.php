<?php
error_reporting(0);
session_start();

$conn = oci_connect($username = 'ns3',$password = 'Nnnmmm05',$connection_string = '//oracle.cise.ufl.edu/orcl');
$id=$_GET['c'];
   $sql="delete from cart where item_id='$id'";
   $stid = oci_parse($conn, $sql);
   $r=oci_execute($stid);
  
?>