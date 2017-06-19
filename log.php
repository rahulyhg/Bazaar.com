<?php

// Before running, create the table:
//   CREATE TABLE MYTABLE (col1 NUMBER);
//$name='nikhil';

$conn = oci_connect($username = 'ns3',
                          $password = 'Nnnmmm05',
                          $connection_string = '//oracle.cise.ufl.edu/orcl');

$FName=$_POST['first_name'];
$LName=$_POST['last_name'];
$username=$_POST['UserName'];
$email=$_POST['email'];
$pass=$_POST['password'];
$pass1=$_POST['pass1'];
$phn=$_POST['PhoneNumber'];
$adress=$_POST['address'];
$city=$_POST['city'];
$state=$_POST['state'];
$zip=$_POST['Zip'];

if($FName==''|| $LName=='' || $pass=='' || $email=='' || $pass1=='' || $username=='' || $phn=='' || $adress=='' || $city=='' || $state=='' || $zip==''){
       if($FName=='')
       { echo "<br> First name is missing!</br>";}
    if($LName=='')
       { echo "<br> Last name is missing!</br>";}
    if($pass=='')
       { echo "<br> Password is missing!</br>";}
    if($email=='')
       { echo "<br> Email address is missing!</br>";}
    if($pass1=='')
       { echo "<br> Yoh haven't re-entered your password!</br>";}
    if($username=='')
       { echo "<br> UserName is missing!</br>";}
     if($phn=='')
       { echo "<br> PhoneNumber is missing!</br>";}
     if($adress=='')
       { echo "<br> Address is missing!</br>";}
     if($city=='')
       { echo "<br> city is missing!</br>";}
     if($state=='')
       { echo "<br> State is missing!</br>";}
     if($zip=='')
       { echo "<br> Zip code is missing!</br>";}
     
    

    echo "<br>Please register again!</br>";
    echo "<br><a href='signup.html'>go to signup page</a></br>";
    exit();

}

if($pass == $pass1){
   $stid = oci_parse($conn, 'INSERT INTO signup1 (username, first_name, last_name, email, phone) VALUES (:user, :fname, :lname, :email, :phn)');
   oci_bind_by_name($stid, ':user', $username);
   oci_bind_by_name($stid, ':fname', $FName);
   oci_bind_by_name($stid, ':lname', $LName);
   oci_bind_by_name($stid, ':email', $email);
   oci_bind_by_name($stid, ':phn', $phn);
   oci_execute($stid);

   $stid1 = oci_parse($conn, 'INSERT INTO signup (username, street, city, state, zip) VALUES (:user, :street, :city, :state, :zip)');
   oci_bind_by_name($stid1, ':user', $username);
   oci_bind_by_name($stid1, ':street', $adress);
   oci_bind_by_name($stid1, ':city', $city);
   oci_bind_by_name($stid1, ':state', $state);
   oci_bind_by_name($stid1, ':zip', $zip);
   oci_execute($stid1);
}
else{

  echo "password do not match";
  echo "<br><a href='signup.html'>go to signup page</a></br>";
}

//$stid = oci_parse($conn, 'INSERT INTO mytab (col1, nam) VALUES (12, :name)');
//oci_bind_by_name($stid, ':name', $name);
//oci_execute($stid); // The row is committed and immediately visible to other users
oci_free_statement($stid);
oci_free_statement($stid1);
oci_close($conn);

?>