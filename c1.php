<?php

// Before running, create the table:
//   CREATE TABLE MYTABLE (col1 NUMBER);
$n1='ert';
$n2='56';
$FName='nikhil';
$LName='singh';
$email='singh0520@gml.com';
$phn='2312321412';
//$adress='efrwefwef';
//$city='noida';
//$state='up';
//$zip='1234';
$pas='123';
$conn = oci_connect($username = 'ns3',
                          $password = 'Nnnmmm05',
                          $connection_string = '//oracle.cise.ufl.edu/orcl');

/*$qry = oci_parse($conn, 'INSERT INTO mytab(col1, nam) VALUES(:n1, :n2)');
oci_bind_by_name($qry, ':n1', $n2);
oci_bind_by_name($qry, ':n2', $n1);
oci_execute($qry);*/

/*$stid = oci_parse($conn, 'INSERT INTO login (username, password) VALUES (:n1, :n2)');
oci_bind_by_name($stid, ':n1', $n1);
oci_bind_by_name($stid, ':n2', $n2);
oci_execute($stid);*/

//echo $FName . $LName . $email . $phn ;

$stid2 = oci_parse($conn, 'INSERT INTO login (USERNAME, password) VALUES (:us, :we)');
   oci_bind_by_name($stid2, ':us', $n1);
   oci_bind_by_name($stid2, ':we', $pas);
   //oci_bind_by_name($stid2, ':lname', $LName);
   //oci_bind_by_name($stid2, ':email', $email);
   //oci_bind_by_name($stid2, ':phone', $phn);
   $r=oci_execute($stid2);

  if (!$r) {
    $e = oci_error($stid2);  // For oci_execute errors pass the statement handle
    print htmlentities($e['message']);
    print "\n<pre>\n";
    print htmlentities($e['sqltext']);
    printf("\n%".($e['offset']+1)."s", "^");
    print  "\n</pre>\n";
}


/*$stid1 = oci_parse($conn, 'INSERT INTO signup (username, street, city, state, zip) VALUES (:user, :street, :city, :state, :zip)');
   oci_bind_by_name($stid1, ':user', $n1);
   oci_bind_by_name($stid1, ':street', $adress); //, FIRST_NAME, LAST_NAME, EMAIL, PHONE //, :fname, :lname, :email, :phone)
   oci_bind_by_name($stid1, ':city', $city);
   oci_bind_by_name($stid1, ':state', $state);
   oci_bind_by_name($stid1, ':zip', $zip);
   oci_execute($stid1);*/

?>