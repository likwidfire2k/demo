<?php
$path = $_SERVER['DOCUMENT_ROOT'];
$path .= "/contact-list/php/connect.php";
include($path);
$row = $_POST['row'];
$field = $_POST['field'];
$oldValue = $_POST['oldValue'];
$pk = $row['contact_id'];
$value = $row[$field];
//print_r($_POST);
//print_r($value);
if ($field =='first_name'|| $field=='last_name'||$field=='role'||$field=='comment'){
  $query = $link->prepare("UPDATE mfr_contact SET $field = :value WHERE contact_id = $pk;");
 // $query->bindParam(':field', $field, PDO::PARAM_STR);
  $query->bindParam(':value', $value, PDO::PARAM_STR);
  //$query->bindParam(':pk', $pk, PDO::PARAM_INT);
  $query->execute();
} else if ($field=='email_address'){
$query = $link->prepare("UPDATE mfr_email SET $field = :value WHERE contact_id = $pk;");
$query->bindParam(':value', $value, PDO::PARAM_STR);
$query->execute();
} else if ($field=='phone_number'||$field=='alt_phone_number'||$field=='phone_number_ext'||$field=='alt_phone_number_ext'){
$query = $link->prepare("UPDATE mfr_phone SET $field = :value WHERE phone_id = $pk;");
$query->bindParam(':value', $value, PDO::PARAM_STR);
$query->execute();
} else if ($field=='mfr_address'){
$query = $link->prepare("UPDATE mfr_address SET $field = :value WHERE mfr_address_id = $pk;");
$query->bindParam(':value', $value, PDO::PARAM_STR);
$query->execute();
};
  
?>
