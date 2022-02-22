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