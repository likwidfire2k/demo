$(document).ready(function(){
//  load_data();


$('#data_table').bootstrapTable({
  url: '../contact-list/php/table.php',
  pagination: true,
  search: true,

  columns: [{
    field: 'contact_id',
    title: 'contact ID',
		visible: false,
  }, {
    field: 'mfr_name',
    title: 'Manufacturer'
  }, {
    field: 'first_name',
    title: 'First Name',
		pk: 'contact_id',
		editable: {
			 url:'../contact-list/php/live_edit.php',
			 onblur:'submit',
			 type: 'text',
			 title: 'First Name'
		 }

  },  {
    field: 'last_name',
    title: 'Last Name',
    pk: 'contact_id',
    editable:{
      url:'../contact-list/php/live_edit.php',
      onblur:'submit',
      type:'text',
      title:'Last Name'
    }
  },  {
    field: 'role',
    title: 'Role',
    pk: 'contact_id',
    editable:{
      url:'../contact-list/php/live_edit.php',
      onblur:'submit',
      type:'text',
      title:'Role'
    }
  },  {
    field: 'email_address',
    title: 'Email',
    pk: 'contact_id',
    editable:{
      url:'../contact-list/php/live_edit.php',
      onblur:'submit',
      type:'text',
      title:'Email'
    }

  },  {
    field: 'phone_number',
    title: 'Phone Number',
    pk: 'contact_id',
    editable:{
      url:'../contact-list/php/live_edit.php',
      onblur:'submit',
      type:'text',
      title:'Phone Number'
    }
  },  {
    field: 'phone_number_ext',
    title: 'Extension',
    pk: 'contact_id',
    editable:{
      url:'../contact-list/php/live_edit.php',
      onblur:'submit',
      type:'text',
      title:'Extension'
    }
  },  {
    field: 'alt_phone_number',
    title: 'Alt. Phone Number',
    pk: 'contact_id',
    editable:{
      url:'../contact-list/php/live_edit.php',
      onblur:'submit',
      type:'text',
      title:'Alt. Phone Number'
    }
  },  {
    field: 'alt_phone_number_ext',
    title: 'Alt. Phone Extension',
    pk: 'contact_id',
    editable:{
      url:'../contact-list/php/live_edit.php',
      onblur:'submit',
      type:'text',
      title:'Alt. Phone Extension'
    }
  },  {
    field: 'mfr_address',
    title: 'Address',
    pk: 'contact_id',
    editable:{
      url:'../contact-list/php/live_edit.php',
      onblur:'submit',
      type:'text',
      title:'address'
    }
  },  {
    field: 'comment',
    title: 'Comment',
    editable:{
      url:'../contact-list/php/live_edit.php',
      onblur:'submit',
      type:'text',
      title:'Comment'
    }
  }, ]
})
$('#data_table').on('editable-save.bs.table', function (e, field, row, oldValue) {
//	console.log(field);
  //console.log(row);
  //console.log(oldValue);
	//console.log(e);
	$.ajax({
	type: "POST",
	url: "../contact-list/php/live_edit.php",
	data:{field:field, row:row, oldValue:oldValue},
	cache: false,
	success: function(result){
		//alert(result);
 //$('input[type=text], textarea').val('');

   }
 });
});

$('#myModal').modal('show');

 $("#submit").click(function(){

 var first_name = $("#first_name").val();
 var last_name = $("#last_name").val();
 var email = $("#email").val();
 var phone = $("#phone").val();
 var ext = $("#ext").val();
 var alt_phone = $("#alt_phone").val();
 var alt_ext = $("#alt_ext").val();
 var address = $("#address").val();
  var role =$("#role").val();
 var comment =$("#comment").val();
 var mfr = $('.selectpicker option:selected').val();

 // Returns successful data submission message when the entered information is stored in database.
 var dataString = '&first_name1='+ first_name + '&last_name1=' + last_name +'&email1='+ email + '&phone1='+ phone +'&ext1='+ ext +
 '&address1='+ address + '&alt_phone1=' + alt_phone + '&alt_ext1='+ alt_ext + '&mfr1='+ mfr + '&role1=' + role +'&comment1=' + comment;
 if(last_name=='' & role=='')
 {
 alert("Please enter last name and role");
 }
 else
 {
 // AJAX Code To Submit Form.
 $.ajax({
 type: "POST",
 url: "../contact-list/php/submit.php",
 data: dataString,
 cache: false,
 success: function(result){
 alert(result);
 $('input[type=text], textarea').val('');
 }
 });
 }
 return false;
 });
});

$("#login").click(function(){
  var username = $("#userName").val();
  var password = $("#password").val();
  if(username=='' || password =='')
  {
    alert("Please enter user name and password");
  }
  else
  {
      $.ajax({
        type:"POST",
        url: "../contact-list/php/login.php",
        data: {username: username, password: password},
        cache: false,
        success:function(result){
          alert(result);
          $('#myModal').modal('hide');
        }
        /*error:function(result){
              alert(result);
              $('#myModal').modal('show');
            }*/
      });
        return false;
      };
    });
