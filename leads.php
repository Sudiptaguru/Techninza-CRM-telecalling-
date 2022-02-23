<?php
namespace Phppot;

// use Phppot\CountryState;
require_once __DIR__ . '/Model/CountryStateCity.php';
$countryStateCity = new CountryStateCity();
$countryResult = $countryStateCity->getAllCountry();
?>
<?php

// error_reporting(1);

require('db.php');

include("auth.php"); //include auth.php file on all secure pages ?>
<?php include('header.php'); ?>
<?php include('headercdn.php'); ?>
<?php 

//Add Code

if(isset($_REQUEST['submit']))

{

  // New Data Add

  if($_REQUEST['lead_id']!=''){  

    $leads_category=$_REQUEST['leads_category'];

    $source=$_REQUEST['source'];

    $name=$_REQUEST['name']; 

    $email=$_REQUEST['email'];

    $country=$_REQUEST['country'];

    $state=$_REQUEST['state'];

    $leads_type=$_REQUEST['leads_type'];

    $lead_id=$_REQUEST['lead_id'];

    // $conn=mysqli_connect('localhost','root','','register');

    $sql = "UPDATE `leads` SET `leads_category`='".$leads_category."', `source`='".$source."', `name`='".$name."', `email`='".$email."', `country`='".$country."', `state`='".$state."', `leads_type`='".$leads_type."' WHERE `lead_id`='".$lead_id."'";

    if($conn->query($sql)===TRUE)

    {

    $flg=0;

    $msg= "Record updated successfully";

    $redirectUrl=ADMIN_URL.'leads.php?msg='.$msg.'&flg='.$flg;

    echo "<script type=\"text/javascript\">  window.location.href='$redirectUrl'; </script>";

    }

    else

    {

    $flg=1;

    $msg= "Error" . $conn->error;

    $redirectUrl=ADMIN_URL.'leads.php?msg='.$msg.'&flg='.$flg;

    echo "<script type=\"text/javascript\">  window.location.href='$redirectUrl'; </script>";

    }

  }

  //Add Data

  else{

    $leads_category=$_REQUEST['leads_category'];

    $source=$_REQUEST['source'];

    $name=$_REQUEST['name']; 

    $email=$_REQUEST['email'];

    $country=$_REQUEST['country'];

    $state=$_REQUEST['state'];

    $leads_type=$_REQUEST['leads_type'];

    $sql = "INSERT INTO `leads`(`leads_category`,`source`,`name`,`email`,`country`,`state`,`leads_type`) VALUES ('".$leads_category."','".$source."','".$name."','".$email."','".$country."','".$state."','".$leads_type."')";

    if($conn->query($sql)===TRUE)

    {

    $flg=0;

    $msg= "New record created successfully";

    $redirectUrl=ADMIN_URL.'leads.php?msg='.$msg.'&flg='.$flg;

    echo "<script type=\"text/javascript\">  window.location.href='$redirectUrl'; </script>";

    }

    else

    {

    $flg=1;

    $msg= "Error" . $conn->error;

    $redirectUrl=ADMIN_URL.'leads.php?msg='.$msg.'&flg='.$flg;

    echo "<script type=\"text/javascript\">  window.location.href='$redirectUrl'; </script>";

    }

  }

} 

//Delete Data

if(isset($_REQUEST['delete']))

{

  $sql = "DELETE FROM `leads` WHERE `lead_id`='".$_REQUEST['delete']."'";

  $result=$conn->query($sql);

  if ($conn->query($sql) === TRUE)

  {

  $flg=0;

  $msg= "Record deleted successfully";

  $redirectUrl=ADMIN_URL.'leads.php?msg='.$msg.'&flg='.$flg;

  echo "<script type=\"text/javascript\">  window.location.href='$redirectUrl'; </script>";

  }

  else 

  {

  $flg=1;

  $msg= "Error deleting record: " . $conn->error;

  $redirectUrl=ADMIN_URL.'leads.php?msg='.$msg.'&flg='.$flg;

  echo "<script type=\"text/javascript\">  window.location.href='$redirectUrl'; </script>";

  }

} 

?> 
<link rel="stylesheet" type="text/css" href="css/header.css">
<!-- <link rel="stylesheet" type="text/css" href="css/members.css"> -->
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
                    <div class="col-sm-8"><h2>Member <b>Details</b></h2></div>
                    <div class="col-sm-4">
                        <button href="#draggable" id="add_new" type="button" class="btn btn-info add-new" data-toggle="modal" title="ADD NEW"><i class="fa fa-plus"></i> Add New</button>
                    </div>
                </div>
            </div>
            <table id="example" class="display table table-bordered">

                <!-- <p style="text-align:right">Search By Name</p> -->

                <thead>

                  <tr>

                    <th>Sl. No</th>

                    <th>Leads Category</th>

                    <th>Source</th>

                    <th>Name</th>

                    <th>Email</th>

                    <th>Country</th>

                    <th>State</th>

                    <th>Leads Type</th>                    

                    <th>Action</th>

                  </tr>

                </thead>

                <tbody>

                  <?php 

                  

          $sql=mysqli_query($conn,"SELECT * FROM leads");

         //  $result3=$conn->query($sql3) ;

          $lead_id=1;

         while ($row3=mysqli_fetch_array($sql,MYSQLI_ASSOC))

         {

           ?>                 

                   <tr >

                    <td> <?php echo $lead_id; ?></td>

                    <td> <?php echo $row3['leads_category']; ?></td>

                    <td> <?php echo $row3['source']; ?></td>

                    <td> <?php echo $row3['name']; ?></td>

                    <td> <?php echo $row3['email']; ?></td>

                    <td><?php echo $row3['country']; ?></td>

                    <td> <?php echo $row3['state']; ?></td>

                    <td> <?php echo $row3['leads_type']; ?></td>                

                    <td> <a onClick="check('<?php echo $row3['lead_id']; ?>')"  href="javascript:void(0);" ><i class="material-icons">&#xE254;</i> </a> | <a onClick="if(confirm('Are you sure to delete?')) return true; else return false;" href="?delete=<?php echo $row3['lead_id'];  ?>"><i class="material-icons">&#xE872;</i> </a></td>                   

                  </tr>

                  <?php 

          $lead_id++; }

          ?>

                 

                </tbody>

              </table>

              <!--Modal-->

                  <div class="modal fade draggable-modal" id="draggable" tabindex="-1" role="basic" aria-hidden="true">

                    <div class="modal-dialog" id="model_header">

                      <div class="modal-content"> 

                        <div class="modal-header">

                          <h5 class="modal-title" id="exampleModalLabel">Leads</h5>

                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                            <span aria-hidden="true">&times;</span>

                          </button>

                        </div>

                        <div class="modal-body">

                              <form name="myForm" id="signupForm" action="#" method="post" class="form-horizontal">

                                <div class="form-group">

                                  <label for="leads_category" class="col-form-label">Leads Category:</label>

                                  <select  name="leads_category" id="leads_category" class="form-control">

                                    <option value="">None</option>

                                    <?php 

                                    $sql7="select * from `leads_category` ";

                                    $result7=$conn->query($sql7) ;

                                    while($row7=mysqli_fetch_array($result7,MYSQLI_ASSOC)){

                                      echo '<option value="'.$row7['category_name'].'" '; if($row3['leads_category']==$row7['category_name']) echo 'selected'; echo '>'.$row7['category_name'].'</option>';

                                    }

                                    ?>

                                  </select>
                                  <input type="hidden" name="lead_id" id="lead_id" class="form-control" placeholder="Enter lead_id" />

                                </div>

                                <div class="form-group">

                                  <label for="source" class="col-form-label">Source:</label>

                                  <input type="text" name="source" id="source" class="form-control" placeholder="Enter Source"/>

                                </div>

                                <div class="form-group">

                                  <label for="recipient-name" class="col-form-label">Name:</label>

                                  <input type="text" name="name" id="name" class="form-control" placeholder="Enter Name"/>

                                </div>

                                <div class="form-group">

                                  <label for="recipient-name" class="col-form-label">Email:</label>

                                  <input type="text" name="email" id="email" class="form-control" placeholder="Enter Email"/>

                                </div>

                                <div class="form-group">

                                  <label for="country" class="col-form-label">Country:</label>

                                  <select name="country" id="country-list" class="form-control" onChange="getState(this.value);">

                                    <option value disabled selected>Select Country</option>

                                    <?php
                                    foreach ($countryResult as $country) {
                                        ?>
                                    <option value="<?php echo $country["id"]; ?>"><?php echo $country["country_name"]; ?></option>
                                    <?php
                                    }
                                    ?>

                                  </select>

                                </div>


                                <div class="form-group">

                                  <label for="state" class="col-form-label">State:</label>

                                  <select  name="state" id="state-list" class="form-control" onChange="getCity(this.value);">

                                    <option value="">Select State</option>

                                  </select>

                                </div>

                                <div class="form-group">

                                  <label for="leads_type" class="col-form-label">Leads Type:</label>

                                  <select name="leads_type" id="leads_type" class="form-control">

                                    <option value="">None</option>

                                    <?php 

                                    $sql7="select * from `leads_remarks`";

                                    $result7=$conn->query($sql7) ;

                                    while($row7=mysqli_fetch_array($result7,MYSQLI_ASSOC)){

                                      echo '<option value="'.$row7['remarks'].'" '; if($row3['leads_category']==$row7['remarks']) echo 'selected'; echo '>'.$row7['remarks'].'</option>';

                                    }

                                    ?>

                                  </select>

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

function check(lead_id){



try{

    //alert(lead_id);

    $.ajax({

            type : "POST",

            url : "<?php echo ADMIN_URL; ?>ajax/leads_ajax.php",

            dataType : "json", 

            data : "lead_id="+lead_id,

            success : function(data) {            

              //alert(data.flag);

              try{

                

                 $('#draggable').modal('show');                 

                 $("#leads_category").val(data.leads_category);

                 $("#source").val(data.source);

                 $("#name").val(data.name);

                 $("#email").val(data.email);

                 $("#country-list").val(data.country);

                 $("#state-list").val(data.state);

                 $("#leads_type").val(data.leads_type);

                 $("#lead_id").val(data.lead_id);               

                

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

</script>
<link href="./assets/css/style.css" rel="stylesheet" type="text/css" />
<script src="./assets/js/ajax-handler.js" type="text/javascript"></script>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
<script>
$().ready(function(){
 
$("#signupForm").validate({
  // in 'rules' user have to specify all the constraints for respective fields
rules : {
leads_category : "required",
source : "required",
name : "required",
country : "required",
state : "required",
leads_type : "required",
email : {
required : true,
email : true
},
},
    // in 'messages' user have to specify message as per rules
messages : {
leads_category : "Please enter your Leads Category",
name : "Please enter your Name",
source : "Please enter your Source",
country : "Please enter your Country",
state : "Please enter your State",
leads_type : "Please enter Leads Type",
}
});
});
 
</script>
<?php include "footer.php" ?>
