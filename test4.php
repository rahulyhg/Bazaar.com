<?php
error_reporting(0);
session_start();
//$_SESSION['username']
$n='singh0520';
$n1=$_SESSION['order'];
$n2="1234";
$conn = oci_connect($username = 'ns3',$password = 'Nnnmmm05',$connection_string = '//oracle.cise.ufl.edu/orcl');
$id=$_GET['c'];
   $stid = oci_parse($conn, 'INSERT INTO cart VALUES (:n1, :n2, :n3)');
   oci_bind_by_name($stid, ':n1',$_SESSION['username']);
   oci_bind_by_name($stid, ':n2', $id);
  oci_bind_by_name($stid, ':n3', $_SESSION['order']);
   $r=oci_execute($stid);
?>