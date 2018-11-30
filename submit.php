<?php

include 'connect.php';

//Fetching Values from URL
$first_name2=$_POST['first_name1'];
$last_name2=$_POST['last_name1'];
$mfr2=$_POST['mfr1'];
$email2=$_POST['email1'];
$phone2=$_POST['phone1'];
$ext2=$_POST['ext1'];
$alt_phone2=$_POST['alt_phone1'];
$alt_ext2=$_POST['alt_ext1'];
$address2=$_POST['address1'];
$alt_address2=$_POST['alt_address1'];
$role2=$_POST['role1'];
$mfrID = $_POST['mfr1'];
$emailID = null;
$contactID = null;
$phoneID = null;
$addressID = null;

//print_r($mfr2);


$query = $link->prepare('SELECT mfr_id FROM manufacturer WHERE mfr_name = :man_name;');
$query->bindParam(':man_name', $mfr2, PDO::PARAM_STR);
$query->execute();

$mfrID = $query -> fetch(PDO::FETCH_NUM);
$mfrhold = $mfrID[0];
//print_r($mfrhold);
/*if (empty($mfrID)){
  $query = $link->prepare('INSERT INTO manufacturer(mfr_name) VALUES (:man_name);');
  $query->bindParam(':man_name', $mfr2, PDO::PARAM_STR);
  $query->execute();
  $query = $link->prepare('SELECT TOP 1 mfr_id from manufacturer ORDER BY mfr_id DESC');
  $query->execute();
  $mfrID = $query->fetch(PDO::FETCH_NUM);
  $mfrhold = $mfrID[0];
}*/



  $query = $link->prepare('INSERT INTO mfr_email(email_address) VALUES (:email);');
  $query->bindParam(':email', $email2, PDO::PARAM_STR);
  $query->execute();
  $query = $link->prepare('SELECT email_id FROM mfr_email WHERE email_address = :email;');
  $query->bindParam(':email', $email2, PDO::PARAM_STR);
  $query->execute();
  $emailID = $query->fetch(PDO::FETCH_NUM);
  $emailhold = $emailID[0];


  $query = $link2->prepare('INSERT INTO mfr_contact(first_name, last_name, role) VALUES (:firstname,:lastname,:role)');
  $query->bindParam(':firstname', $first_name2, PDO::PARAM_STR);
  $query->bindParam(':lastname', $last_name2, PDO::PARAM_STR);
  $query->bindParam(':role', $role2, PDO::PARAM_STR);
  $query->execute();
  $query = $link2->prepare('SELECT TOP 1 contact_id FROM mfr_contact ORDER BY contact_id DESC');
  $query->execute();
  $contactID = $query->fetch(PDO::FETCH_NUM);
  $contacthold = $contactID[0];


  $query = $link->prepare('INSERT INTO mfr_phone(phone_number, phone_number_ext, alt_phone_number, alt_phone_number_ext) VALUES (:phone,:ext,:altphone,:altext)');
  $query->bindParam(':phone',$phone2, PDO::PARAM_STR);
  $query->bindParam(':ext',$ext2, PDO::PARAM_STR);
  $query->bindParam(':altphone',$alt_phone2, PDO::PARAM_STR);
  $query->bindParam(':altext',$alt_ext2, PDO::PARAM_STR);
  $query->execute();
  $query = $link->prepare('SELECT phone_id FROM mfr_phone WHERE phone_number = :phone');
  $query->bindParam(':phone',$phone2, PDO::PARAM_STR);
  $query->execute();
  $phoneID = $query->fetch(PDO::FETCH_NUM);
  $phonehold = $phoneID[0];

  $query = $link->prepare('INSERT INTO mfr_address(mfr_address,mfr_address_alt) VALUES (:address,:altaddress)');
  $query->bindParam(':address',$address2, PDO::PARAM_STR);
  $query->bindParam(':altaddress',$alt_address2, PDO::PARAM_STR);
  $query->execute();
  $query = $link->prepare('SELECT mfr_address_id FROM mfr_address WHERE mfr_address = :address');
  $query->bindParam(':address',$address2, PDO::PARAM_STR);
  $query->execute();
  $addressID = $query->fetch(PDO::FETCH_NUM);
  $addresshold = $addressID[0];


  $query = $link->prepare('INSERT INTO mfr_contact_junct(mfr_id, contact_id) VALUES (:mfrhold, :contacthold)');
  $query->bindParam(':mfrhold', $mfrhold, PDO::PARAM_INT);
  $query->bindParam(':contacthold', $contacthold, PDO::PARAM_INT);
  $query->execute();

  $query = $link->prepare('INSERT INTO mfr_address_junct(mfr_id, mfr_address_id) VALUES (:mfrhold, :addresshold)');
  $query->bindParam(':mfrhold', $mfrhold, PDO::PARAM_INT);
  $query->bindParam(':addresshold', $addresshold, PDO::PARAM_INT);
  $query->execute();

  $query = $link->prepare('INSERT INTO mfr_contact_phone_junct(contact_id, phone_id) VALUES (:contacthold, :phonehold)');
  $query->bindParam(':contacthold', $contacthold, PDO::PARAM_INT);
  $query->bindParam(':phonehold', $phonehold, PDO::PARAM_INT);
  $query->execute();

  $query2 = $link3->prepare('INSERT INTO contact_address_junct(contact_id, mfr_address_id) VALUES (:contacthold, :addresshold)');
  $query2->bindParam(':contacthold', $contacthold, PDO::PARAM_INT);
  $query2->bindParam(':addresshold', $addresshold, PDO::PARAM_INT);
  $query2->execute();

if ($query->execute()) {
  echo("Updated");
} else {
  echo("Error!");print_r($query->errorInfo());
}




?>
