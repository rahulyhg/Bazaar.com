<?php

// Before running, create the table:
//   CREATE TABLE MYTABLE (col1 NUMBER);
$n1='ertyu';
$n2='56';
$FNam='nikhil';
$LNam='singh';
$emai='sinerttydsgh0520@gml.com';
$ph='231232ed1412';
$adres='efrwefwef';
$cit='noida';
$stat='up';
$zi='1234';
//$pas='123';
$conn = oci_connect($username = 'ns3',
                          $password = 'Nnnmmm05',
                          $connection_string = '//oracle.cise.ufl.edu/orcl');

/*$qry = oci_parse($conn, 'INSERT INTO mytab(col1, nam) VALUES(:n1, :n2)');
oci_bind_by_name($qry, ':n1', $n2);
oci_bind_by_name($qry, ':n2', $n1);
oci_execute($qry);*/

$stid = oci_parse($conn, 'INSERT INTO login (username, password) VALUES (:n1, :n2)');
oci_bind_by_name($stid, ':n1', $n1);
oci_bind_by_name($stid, ':n2', $n2);
oci_execute($stid);

//echo $FName . $LName . $email . $phn ;

$stid1 = oci_parse($conn, 'INSERT INTO signup1 (username, first_name, last_name, email, phone) VALUES (:u2, :fname, :lname, :email, :phn)');
 oci_bind_by_name($stid1, ':u2', $n1);
   oci_bind_by_name($stid1, ':fname', $FNam);
   oci_bind_by_name($stid1, ':lname', $LNam);
   oci_bind_by_name($stid1, ':email', $emai);
   oci_bind_by_name($stid1, ':phn', $ph);
   oci_execute($stid1);
   //$r=oci_execute($stid2);

  /*if (!$r) {
    $e = oci_error($stid2);  // For oci_execute errors pass the statement handle
    print htmlentities($e['message']);
    print "\n<pre>\n";
    print htmlentities($e['sqltext']);
    printf("\n%".($e['offset']+1)."s", "^");
    print  "\n</pre>\n";
}*/


$stid12 = oci_parse($conn, 'INSERT INTO signup (username, street, city, state, zip) VALUES (:u3, :street, :city, :state, :zip)');
   oci_bind_by_name($stid12, ':u3', $n1);
   oci_bind_by_name($stid12, ':street', $adres);
   oci_bind_by_name($stid12, ':city', $cit);
   oci_bind_by_name($stid12, ':state', $stat);
   oci_bind_by_name($stid12, ':zip', $zi);
   oci_execute($stid12);

?>