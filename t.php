<?php

// Before running, create the table:
//   CREATE TABLE MYTABLE (col1 NUMBER);
$userna='bnn12';
$FNam='prashant';
$LNam='dewan';
$emai='prasha.com';
$ph='231232412';
$adres='efwefwef';
$cit='noia';
$stat='upd';
$zi='12324';
$pass='fg';
$conn = oci_connect($username = 'ns3',
                          $password = 'Nnnmmm05',
                          $connection_string = '//oracle.cise.ufl.edu/orcl');

$qry = oci_parse($conn, 'INSERT INTO login (username, password) VALUES (:u1, :p1)');
   oci_bind_by_name($qry, ':u1', $userna);
   oci_bind_by_name($qry, ':p1', $pass);
   //$r=
   oci_execute($qry);


  /*if (!$r) {
    $e = oci_error($qry);  // For oci_execute errors pass the statement handle
    print htmlentities($e['message']);
    print "\n<pre>\n";
    print htmlentities($e['sqltext']);
    printf("\n%".($e['offset']+1)."s", "^");
    print  "\n</pre>\n";
}*/

/*$stid = oci_parse($conn, 'INSERT INTO signup1 (username, first_name, last_name, email, phone) VALUES (:u2, :fname, :lname, :email, :phn)');
 oci_bind_by_name($stid, ':u2', $userna);
   oci_bind_by_name($stid, ':fname', $FNam);
   oci_bind_by_name($stid, ':lname', $LNam);
   oci_bind_by_name($stid, ':email', $emai);
   oci_bind_by_name($stid, ':phn', $ph);
   oci_execute($stid);

   //$r1=oci_execute($stid);

  /*if (!$r1) {
    $e = oci_error($stid);  // For oci_execute errors pass the statement handle
    print htmlentities($e['message']);
    print "\n<pre>\n";
    print htmlentities($e['sqltext']);
    printf("\n%".($e['offset']+1)."s", "^");
    print  "\n</pre>\n";
}*/

/*$stid1 = oci_parse($conn, 'INSERT INTO signup (username, street, city, state, zip) VALUES (:u3, :street, :city, :state, :zip)');
   oci_bind_by_name($stid1, ':u3', $userna);
   oci_bind_by_name($stid1, ':street', $adres);
   oci_bind_by_name($stid1, ':city', $cit);
   oci_bind_by_name($stid1, ':state', $stat);
   oci_bind_by_name($stid1, ':zip', $zi);
   oci_execute($stid1);

   //$r2=oci_execute($stid1);

  /*if (!$r2) {
    $e = oci_error($stid1);  // For oci_execute errors pass the statement handle
    print htmlentities($e['message']);
    print "\n<pre>\n";
    print htmlentities($e['sqltext']);
    printf("\n%".($e['offset']+1)."s", "^");
    print  "\n</pre>\n";
}*/
//oci_execute($stid); // The row is committed and immediately visible to other users  :fname, :lname, :email, :phn  , first_name, last_name, email, phone

?>