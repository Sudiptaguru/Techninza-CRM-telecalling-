<?php 

//Add Code

if(isset($_REQUEST['submit']))

{

  // New Data Add

  if($_REQUEST['id']!=''){  

    $name=$_REQUEST['name'];

    $email=$_REQUEST['email'];

    $phone=$_REQUEST['phone']; 

    $id=$_REQUEST['id'];

    // $conn=mysqli_connect('localhost','root','','register');

    $sql = "UPDATE `members` SET `name`='".$name."', `email`='".$email."', `phone`='".$phone."' WHERE `id`='".$id."'";

    if($conn->query($sql)===TRUE)

    {

    $flg=0;

    $msg= "Record updated successfully";

    $redirectUrl=ADMIN_URL.'members.php?msg='.$msg.'&flg='.$flg;

    echo "<script type=\"text/javascript\">  window.location.href='$redirectUrl'; </script>";

    }

    else

    {

    $flg=1;

    $msg= "Error" . $conn->error;

    $redirectUrl=ADMIN_URL.'members.php?msg='.$msg.'&flg='.$flg;

    echo "<script type=\"text/javascript\">  window.location.href='$redirectUrl'; </script>";

    }

  }

  //Add Data

  else{

    $name=$_REQUEST['name'];

    $email=$_REQUEST['email'];

    $phone=$_REQUEST['phone']; 

    $sql = "INSERT INTO `members`(`name`,`email`,`phone`) VALUES ('".$name."','".$email."','".$phone."')";

    if($conn->query($sql)===TRUE)

    {

    $flg=0;

    $msg= "New record created successfully";

    $redirectUrl=ADMIN_URL.'members.php?msg='.$msg.'&flg='.$flg;

    echo "<script type=\"text/javascript\">  window.location.href='$redirectUrl'; </script>";

    }

    else

    {

    $flg=1;

    $msg= "Error" . $conn->error;

    $redirectUrl=ADMIN_URL.'members.php?msg='.$msg.'&flg='.$flg;

    echo "<script type=\"text/javascript\">  window.location.href='$redirectUrl'; </script>";

    }

  }

} 

//Delete Data

if(isset($_REQUEST['delete']))

{

  $sql = "DELETE FROM `members` WHERE `id`='".$_REQUEST['delete']."'";

  $result=$conn->query($sql);

  if ($conn->query($sql) === TRUE)

  {

  $flg=0;

  $msg= "Record deleted successfully";

  $redirectUrl=ADMIN_URL.'members.php?msg='.$msg.'&flg='.$flg;

  echo "<script type=\"text/javascript\">  window.location.href='$redirectUrl'; </script>";

  }

  else 

  {

  $flg=1;

  $msg= "Error deleting record: " . $conn->error;

  $redirectUrl=ADMIN_URL.'members.php?msg='.$msg.'&flg='.$flg;

  echo "<script type=\"text/javascript\">  window.location.href='$redirectUrl'; </script>";

  }

} 

?> 