<?php
error_reporting(0);
session_start();

$conn = oci_connect($username = 'ns3',$password = 'Nnnmmm05',$connection_string = '//oracle.cise.ufl.edu/orcl');
$nam=$_POST['name'];
$quant=$_POST['quantity'];
$sell=$_POST['sell'];
$t=$_SESSION['username'];
$sql6 = "select seller_id from seller where seller='$t'";
 $stid6 = oci_parse($conn, $sql6);
        oci_execute($stid6);
        oci_fetch($stid6);
        $q=oci_result($stid6, 'SELLER_ID');
$date = date('d-m-y');
$n="Technology";
$n1="Office";
echo $nam.$quant.$sell.$t.$date.$n.$n1;
$sql="insert into credible_items values((select max(item_id) from credible_items)+1, :n1, :n2, :n6, :n7, :n3, to_date(:n4, 'DD-MM-YYYY'), :n5)";
$stid1 = oci_parse($conn, $sql);

oci_bind_by_name($stid1, ':n1',$sell);
oci_bind_by_name($stid1, ':n2', $quant);
oci_bind_by_name($stid1, ':n3',$nam);
oci_bind_by_name($stid1, ':n4', $date);
oci_bind_by_name($stid1, ':n5', $q);
oci_bind_by_name($stid1, ':n7', $n1);
oci_bind_by_name($stid1, ':n6', $n);
oci_execute($stid1);

header('Location: /sell.html');

?>