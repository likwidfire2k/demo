$(document).ready(function(){
  load_data();


 function load_data(query)
 {
  $.ajax({
   url: 'fetch.php',
   method:"POST",
   data:{query:query},
   success:function(data)
   {
    $('#result').html(data);
   }
  });
 }
 $('#search_text').keyup(function(){
  var search = $(this).val();
  if(search != '')
  {
   load_data(search);
  }
  else
  {
   load_data();
  }
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
 url: "submit.php",
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
        url: "login.php",
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
