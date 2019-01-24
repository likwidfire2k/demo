<?php
header('Content-Type: application/json');
include('connect.php');
$query = "SELECT mfc.contact_id, mfc.comment, mfr.mfr_name, mfa.mfr_address, mfc.first_name, mfc.last_name, mfc.role, mfe.email_address,  mfp.phone_number, mfp.phone_number_ext, mfp.alt_phone_number, mfp.alt_phone_number_ext
      FROM mfr_contact_junct mfcj
      LEFT JOIN mfr_contact mfc ON mfcj.contact_id = mfc.contact_id
      LEFT JOIN contact_address_junct mcaj ON mfc.contact_id = mcaj.contact_id
      LEFT JOIN manufacturer mfr ON mfr.mfr_id = mfcj.mfr_id
      LEFT JOIN mfr_address mfa ON mcaj.mfr_address_id = mfa.mfr_address_id
      LEFT JOIN mfr_email mfe ON mfe.email_id = mfc.contact_id
      LEFT JOIN mfr_phone mfp ON mfp.phone_id = mfc.contact_id

";
$resultset = $link->prepare($query);
$resultset->execute();
$data = array();
while($row = $resultset->fetch(PDO::FETCH_ASSOC)) {
$temp=array();
   $temp['contact_id'] = $row['contact_id'];
   $temp['mfr_name'] = $row['mfr_name'];
   $temp['first_name'] = $row['first_name'];
   $temp['last_name'] = $row['last_name'];
   $temp['role']= $row['role'];
   $temp['email_address'] = $row['email_address'];
   $temp['phone_number'] = $row['phone_number'];
   $temp['phone_number_ext'] = $row['phone_number_ext'];
   $temp['alt_phone_number'] = $row['alt_phone_number'];
   $temp['alt_phone_number_ext'] = $row['alt_phone_number_ext'];
   $temp['mfr_address'] = $row['mfr_address'];
   $temp['comment'] = $row['comment'];
   


   $data[] = $temp;
}
echo json_encode($data);
?>
