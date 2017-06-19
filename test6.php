<?php
error_reporting(0);
session_start();
$conn = oci_connect($username = 'ns3',$password = 'Nnnmmm05',$connection_string = '//oracle.cise.ufl.edu/orcl');
$id=$_GET['c'];
   $stid = oci_parse($conn, "delete from credible_items where item_id='$id'");
   oci_execute($stid);
?>