$(document).ready( function() {
  setTimeout('$("#alert_msg").hide()',3000);
});

function check(id){



try{

    //alert(id);

    $.ajax({

            type : "POST",

            url : "<?php echo ADMIN_URL; ?>ajax/members_ajax.php",

            dataType : "json", 

            data : "id="+id,

            success : function(data) {            

              //alert(data.flag);

              try{

                

                 $('#draggable').modal('show');                 

                 $("#name").val(data.name);

                 $("#email").val(data.email);

                 $("#phone").val(data.phone);

                 $("#id").val(data.id);               

                

              }

              catch(err){

                alert(err.message);

              }

            

            }

          });

        }catch(err){

          alert(err.message);

        }

setInterval(function(){

   $('#error_msg').html('');

  }, 5000);

 

}

function validateForm() {

  let name = document.forms["myForm"]["name"].value;

  if (name == "") {

    alert("Name must be filled out");

    return false;

  }

  let email = document.forms["myForm"]["email"].value;

  if (email == "") {

    alert("Email must be filled out");

    return false;

  }

  let phone = document.forms["myForm"]["phone"].value;

  if (phone == "") {

    alert("Phone Number must be filled out");

    return false;

  }

}

$('input[name=onoffswitch]').click(function(){

var id=$(this).attr('id');

var crm_access = $(this).val();

if(crm_access == 1) {

    crm_access = 0; 

} else {

    crm_access = 1; 

}

//alert(id);

$.ajax({

        type:'POST',

        url:'active_deactive.php',

        data:'id= ' + id + '&crm_access='+crm_access

    });

}); 