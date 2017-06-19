<?php
error_reporting(0);
session_start();

$conn = oci_connect($username = 'ns3',$password = 'Nnnmmm05',$connection_string = '//oracle.cise.ufl.edu/orcl');
$id=$_GET['c'];
$t=$_SESSION['admin'];
$stid1 = oci_parse($conn, "select admin_id from admin_login where username='$t'");
oci_execute($stid1);
oci_fetch($stid1);
$n=oci_result($stid1, 'ADMIN_ID');

$sql = "
begin
pro(:n2,:n1);
end;";
   $stid = oci_parse($conn, $sql);
   oci_bind_by_name($stid, ':n1',$n);
   oci_bind_by_name($stid, ':n2', $id);
   $r=oci_execute($stid, OCI_DEFAULT);
?>