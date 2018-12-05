$(document).ready(function(){
//  load_data();

$("#search_text").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#search_me tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
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
 var alt_address = $("#alt_address").val();
 var role =$("#role").val();
 var mfr = $('.selectpicker option:selected').val();

 // Returns successful data submission message when the entered information is stored in database.
 var dataString = '&first_name1='+ first_name + '&last_name1=' + last_name +'&email1='+ email + '&phone1='+ phone +'&ext1='+ ext +
 '&address1='+ address + '&alt_address1=' + alt_address+ '&alt_phone1=' + alt_phone + '&alt_ext1='+ alt_ext + '&mfr1='+mfr + '&role1=' + role;
 if(last_name=='')
 {
 alert("Please enter Last name");
 }
 else
 {
 // AJAX Code To Submit Form.
 $.ajax({
 type: "POST",
 url: "../Magister/php/submit.php",
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
        url: "../Magister/php/login.php",
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

    $('#data_table').Tabledit({
  		deleteButton: false,
  		editButton: false,
  		columns: {
  		  identifier: [0, 'contact_id'],
  		  editable: [[2, 'first_name'], [3, 'last_name'], [4, 'role'],[5, 'email_address'],[6, 'phone_number'],[7, 'phone_number_ext'],
  			[8, 'alt_phone_number'],[9, 'alt_phone_number_ext'],[10, 'mfr_address'],[11, 'mfr_address_alt']]
  		},
  		hideIdentifier: true,
  		url: '../Master/php/live_edit.php'
  	});
