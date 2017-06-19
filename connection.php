<?php

// Before running, create the table:
//   CREATE TABLE MYTABLE (col1 NUMBER);
$name='qw';
$in='23';
$conn = oci_connect($username = 'ns3',
                          $password = 'Nnnmmm05',
                          $connection_string = '//oracle.cise.ufl.edu/orcl');

$stid = oci_parse($conn, 'INSERT INTO mytab (col1, nam) VALUES (:name, :id)');
oci_bind_by_name($stid, ':name', $name);
oci_bind_by_name($stid, ':id', $in);
oci_execute($stid); // The row is committed and immediately visible to other users

?>