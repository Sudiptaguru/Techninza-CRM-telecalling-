<?php

// error_reporting(1);

require('db.php');

include("auth.php"); //include auth.php file on all secure pages ?>
<?php include('header.php') ?>
<?php include('headercdn.php') ?>
<?php include('leadscategory_query.php') ?>
<link rel="stylesheet" type="text/css" href="css/header.css">
<link rel="stylesheet" type="text/css" href="css/status.css">
<script type="text/javascript" src="js/header.js"></script>

  <div class="row number-stats" >

    <div class="col-md-12 col-sm-12 col-xs-12" style="border:none !important">

      <?php if(isset($_REQUEST['msg'])){ if($_REQUEST['flg']!='1'){ echo '<div class="alert alert-success" id="alert_msg">'; }else{ echo '<div class="alert alert-reception" id="alert_msg">';}}?>                    

            <button class="close" data-close="alert"></button>

            <span><?php if(isset($_REQUEST['msg'])){ echo $_REQUEST['msg'];}?> </span>

    </div>

  </div>
    <div class="container-lg">
    <!-- <div class="table-responsive"> -->
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-8"><h2>Category <b>Details</b></h2></div>
                    <div class="col-sm-4">
                        <button href="#draggable" id="add_new" type="button" class="btn btn-info add-new" data-toggle="modal" title="ADD NEW"><i class="fa fa-plus"></i> Add New</button>
                    </div>
                </div>
            </div>
            <table id="example" class="display" style="width:100%">

                <!-- <p style="text-align:right">Search By Name</p> -->

                <thead>

                  <tr>

                    <th>Sl. No</th>

                    <th>Category Name</th>

                    <th>Status</th>                    

                    <th>Action</th>

                  </tr>

                </thead>

                <tbody>

                  <?php 

                  

          $sql=mysqli_query($conn,"SELECT * FROM leads_category");

         //  $result3=$conn->query($sql3) ;

          $id=1;

         while ($row3=mysqli_fetch_array($sql,MYSQLI_ASSOC))

         {

           ?>                 

                   <tr >

                    <td> <?php echo $id; ?></td>

                    <td> <?php echo $row3['category_name']; ?></td>

                    <td>

                      <label class="switch">

                        <input type="checkbox" id="<?=$row3['id']?>"  name="onoffswitch" value="<?=$row3['status']?>" class="js-switch" <?=$row3['status'] == '1' ? 'checked' : '' ;?>>

                        <span class="slider round"></span>

                      </label>

                    </td>                 

                    <td> <a onClick="check('<?php echo $row3['id']; ?>')"  href="javascript:void(0);" ><i class="material-icons">&#xE254;</i> </a> | <a onClick="if(confirm('Are you sure to delete?')) return true; else return false;" href="?delete=<?php echo $row3['id'];  ?>"><i class="material-icons">&#xE872;</i> </a></td>                   

                  </tr>

                  <?php 

          $id++; }

          ?>

                 

                </tbody>

              </table>

              <!--Modal-->

                  <div class="modal fade draggable-modal" id="draggable" tabindex="-1" role="basic" aria-hidden="true">

                    <div class="modal-dialog" id="model_header">

                      <div class="modal-content"> 

                        <div class="modal-header">

                          <h5 class="modal-title" id="exampleModalLabel">Members</h5>

                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                            <span aria-hidden="true">&times;</span>

                          </button>

                        </div>

                        <div class="modal-body">

                              <form name="myForm" action="" method="post" class="form-horizontal" onsubmit="return validateForm()">

                                <div class="form-group">

                                  <label for="recipient-name" class="col-form-label">Category Name:</label>

                                  <input type="text" name="category_name" id="category_name" class="form-control" placeholder="Enter text"/>

                                  <input type="hidden" name="id" id="id" class="form-control" placeholder="Enter id" />

                                </div>

                                <div class="form-actions top">

                                  <div class="row">

                                    <div class="col-md-offset-4 col-md-8">

                                      <button type="submit" name="submit" id="submit" class="btn btn-primary">Submit</button>

                                      <!--<button type="button" class="btn default">Cancel</button>-->

                                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                                    </div>

                                  </div>

                                </div>

                              </form>

                              <!-- END FORM--> 

                        </div>

                            

                       

                      </div>

                      <!-- /.modal-content --> 

                    </div>

                    <!-- /.modal-dialog --> 

                  </div>

              

              <!--Modal End-->
        </div>
    <!-- </div> -->
</div>  

  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->

<script type="text/javascript"> 

$(document).ready( function() {
  setTimeout('$("#alert_msg").hide()',3000);
});

function check(id){



try{

    //alert(id);

    $.ajax({

            type : "POST",

            url : "<?php echo ADMIN_URL; ?>ajax/leadscategory_ajax.php",

            dataType : "json", 

            data : "id="+id,

            success : function(data) {            

              //alert(data.flag);

              try{

                

                 $('#draggable').modal('show');                 

                 $("#category_name").val(data.category_name);

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

  let category_name = document.forms["myForm"]["category_name"].value;

  if (category_name == "") {

    alert("Category Name must be filled out");

    return false;

  }

}

$('input[name=onoffswitch]').click(function(){

var id=$(this).attr('id');

var status = $(this).val();

if(status == 1) {

    status = 0; 

} else {

    status = 1; 

}

//alert(id);

$.ajax({

        type:'POST',

        url:'leadscategory_status.php',

        data:'id= ' + id + '&status='+status

    });

});    

</script>
<?php include "footer.php" ?>
