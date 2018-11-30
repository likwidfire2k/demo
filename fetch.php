<?php
//fetch.php
include 'connect.php';

$output = '';
if(isset($_POST["query"]))
{
 $input =($_POST["query"]);
 $search = $link->prepare($_POST["query"]);
 $search->execute();
 $query = "
 SELECT mfr.mfr_name, mfa.mfr_address, mfc.first_name, mfc.last_name, mfc.role, mfe.email_address,  mfp.phone_number, mfp.phone_number_ext, mfp.alt_phone_number, mfp.alt_phone_number_ext
       FROM mfr_contact_junct mfcj
       LEFT JOIN mfr_contact mfc ON mfcj.contact_id = mfc.contact_id
       LEFT JOIN contact_address_junct mcaj ON mfc.contact_id = mcaj.contact_id
       LEFT JOIN manufacturer mfr ON mfr.mfr_id = mfcj.mfr_id
       LEFT JOIN mfr_address mfa ON mcaj.mfr_address_id = mfa.mfr_address_id
       LEFT JOIN mfr_email mfe ON mfe.email_id = mfc.contact_id
       LEFT JOIN mfr_phone mfp ON mfp.phone_id = mfc.contact_id

  WHERE mfr.mfr_name LIKE '%".$input."%'
  OR mfc.first_name LIKE '%".$input."%'
  OR mfc.last_name LIKE '%".$input."%'
  ";
}
else
{
 $query = "
 SELECT mfr.mfr_name, mfa.mfr_address, mfc.first_name, mfc.last_name, mfc.role, mfe.email_address,  mfp.phone_number, mfp.phone_number_ext, mfp.alt_phone_number, mfp.alt_phone_number_ext
       FROM mfr_contact_junct mfcj
       LEFT JOIN mfr_contact mfc ON mfcj.contact_id = mfc.contact_id
       LEFT JOIN contact_address_junct mcaj ON mfc.contact_id = mcaj.contact_id
       LEFT JOIN manufacturer mfr ON mfr.mfr_id = mfcj.mfr_id
       LEFT JOIN mfr_address mfa ON mcaj.mfr_address_id = mfa.mfr_address_id
       LEFT JOIN mfr_email mfe ON mfe.email_id = mfc.contact_id
       LEFT JOIN mfr_phone mfp ON mfp.phone_id = mfc.contact_id

 ";
}
$result = $link->prepare($query);
$result->execute();
if(count($result) > 0)
{
 $output .= '
  <div class="table-responsive">
   <table class="table table-striped table-hover table-bordered table-dark">
   <thead class="thead-dark">
    <tr>
     <th>First Name</th>
     <th>Last Name</th>
     <th>Role</th>
     <th>Email</th>
     <th>Phone</th>
     <th>Ext.</th>
     <th>Alternate Phone</th>
     <th>Alternate extension</th>
     <th>Manufacturer</th>
     <th>Address</th>
     <th>Alternate Address</th>
    </tr>
    </thead>
 ';
 while($row = $result->fetch(PDO::FETCH_ASSOC))
 {
  $output .= '
   <tr class="active">
    <td class="editable-col" contenteditable="true" col-index='0' oldVal =".$row["first_name"].">'.$row["first_name"].'</td>
    <td class="editable-col" contenteditable="true" col-index='1'>'.$row["last_name"].'</td>
    <td class="editable-col" contenteditable="true" col-index='2'>'.$row["role"].'</td>
    <td class="editable-col" contenteditable="true" col-index='3'>'.$row["email_address"].'</td>
    <td class="editable-col" contenteditable="true" col-index='4'>'.$row["phone_number"].'</td>
    <td class="editable-col" contenteditable="true" col-index='5'>'.$row["phone_number_ext"].'</td>
    <td class="editable-col" contenteditable="true" col-index='6'>'.$row["alt_phone_number"].'</td>
    <td class="editable-col" contenteditable="true" col-index='7'>'.$row["alt_phone_number_ext"].'</td>
    <td>'.$row["mfr_name"].'</td>
    <td class="editable-col" contenteditable="true" col-index='8'>'.$row["mfr_address"].'</td>
    <td class="editable-col" contenteditable="true" col-index='9'>'.$row["mfr_address_alt"].'</td>
   </tr>

  ';
 }
 echo $output;
}
else
{
 echo 'Contact Not Found';
}

?>
