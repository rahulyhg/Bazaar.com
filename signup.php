<?php

// Before running, create the table:
//   CREATE TABLE MYTABLE (col1 NUMBER);
//$name='nikhil';

$conn = oci_connect($username = 'ns3',
                          $password = 'Nnnmmm05',
                          $connection_string = '//oracle.cise.ufl.edu/orcl');

$FNam=$_POST['first_name'];
$LNam=$_POST['last_name'];
$usern=$_POST['UserName'];
$emai=$_POST['email'];
$pass=$_POST['password'];
$pass1=$_POST['pass1'];
$ph=$_POST['PhoneNumber'];
$adres=$_POST['address'];
$cit=$_POST['city'];
$stat=$_POST['state'];
$zi=$_POST['Zip'];
//echo $FName;
//echo $adress;

if($FNam==''|| $LNam=='' || $pass=='' || $emai=='' || $pass1=='' || $usern=='' || $ph=='' || $adres=='' || $cit=='' || $stat=='' || $zi==''){
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
    if($usern=='')
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
  //echo 'dsddef';
   $stid = oci_parse($conn, 'INSERT INTO login (username, password) VALUES (:n1, :n2)');
   oci_bind_by_name($stid, ':n1', $usern);
   oci_bind_by_name($stid, ':n2', $pass);
   $r=oci_execute($stid);

   $stid3 = oci_parse($conn, 'INSERT INTO seller (seller, seller_id) VALUES (:n1, (select max(seller_id) from seller)+1)');
   oci_bind_by_name($stid3, ':n1', $usern);
   // oci_bind_by_name($stid, ':n2', $pass);
   $r4=oci_execute($stid3);


   $stid1 = oci_parse($conn, 'INSERT INTO user1 (username, first_name, last_name, email, phone) VALUES (:u2, :fname, :lname, :email, :phn)');
 oci_bind_by_name($stid1, ':u2', $usern);
   oci_bind_by_name($stid1, ':fname', $FNam);
   oci_bind_by_name($stid1, ':lname', $LNam);
   oci_bind_by_name($stid1, ':email', $emai);
   oci_bind_by_name($stid1, ':phn', $ph);
   $r2=oci_execute($stid1);

   $stid12 = oci_parse($conn, 'INSERT INTO signup (username, street, city, state, zip) VALUES (:u3, :street, :city, :state, :zip)');
   oci_bind_by_name($stid12, ':u3', $usern);
   oci_bind_by_name($stid12, ':street', $adres);
   oci_bind_by_name($stid12, ':city', $cit);
   oci_bind_by_name($stid12, ':state', $stat);
   oci_bind_by_name($stid12, ':zip', $zi);
   $r3=oci_execute($stid12);
   if(!$r || !$r2 || !$r3){
       echo "<br> problem in signup!</br>";
   echo "<br> <a href='signup.html'>Please sign up again!</a></br>";
    exit();

   }
   else{
   echo "<br> congratulations!</br>";
   echo "<br> <a href='login.php'>Please login now!</a></br>";

   }
}
else{

  echo "password do not match";
  echo "<br><a href='signup.html'>go to signup page</a></br>";
}

//$stid = oci_parse($conn, 'INSERT INTO mytab (col1, nam) VALUES (12, :name)');
//oci_bind_by_name($stid, ':name', $name);
//oci_execute($stid); // The row is committed and immediately visible to other users


?>