<?php 

//Add Code

if(isset($_REQUEST['submit']))

{

  // New Data Add

  if($_REQUEST['id']!=''){  

    $category_name=$_REQUEST['category_name']; 

    $id=$_REQUEST['id'];

    // $conn=mysqli_connect('localhost','root','','register');

    $sql = "UPDATE `leads_category` SET `category_name`='".$category_name."' WHERE `id`='".$id."'";

    if($conn->query($sql)===TRUE)

    {

    $flg=0;

    $msg= "Record updated successfully";

    $redirectUrl=ADMIN_URL.'leads_category.php?msg='.$msg.'&flg='.$flg;

    echo "<script type=\"text/javascript\">  window.location.href='$redirectUrl'; </script>";

    }

    else

    {

    $flg=1;

    $msg= "Error" . $conn->error;

    $redirectUrl=ADMIN_URL.'leads_category.php?msg='.$msg.'&flg='.$flg;

    echo "<script type=\"text/javascript\">  window.location.href='$redirectUrl'; </script>";

    }

  }

  //Add Data

  else{

    $category_name=$_REQUEST['category_name']; 

    $sql = "INSERT INTO `leads_category`(`category_name`) VALUES ('".$category_name."')";

    if($conn->query($sql)===TRUE)

    {

    $flg=0;

    $msg= "New record created successfully";

    $redirectUrl=ADMIN_URL.'leads_category.php?msg='.$msg.'&flg='.$flg;

    echo "<script type=\"text/javascript\">  window.location.href='$redirectUrl'; </script>";

    }

    else

    {

    $flg=1;

    $msg= "Error" . $conn->error;

    $redirectUrl=ADMIN_URL.'leads_category.php?msg='.$msg.'&flg='.$flg;

    echo "<script type=\"text/javascript\">  window.location.href='$redirectUrl'; </script>";

    }

  }

} 

//Delete Data

if(isset($_REQUEST['delete']))

{

  $sql = "DELETE FROM `leads_category` WHERE `id`='".$_REQUEST['delete']."'";

  $result=$conn->query($sql);

  if ($conn->query($sql) === TRUE)

  {

  $flg=0;

  $msg= "Record deleted successfully";

  $redirectUrl=ADMIN_URL.'leads_category.php?msg='.$msg.'&flg='.$flg;

  echo "<script type=\"text/javascript\">  window.location.href='$redirectUrl'; </script>";

  }

  else 

  {

  $flg=1;

  $msg= "Error deleting record: " . $conn->error;

  $redirectUrl=ADMIN_URL.'leads_category.php?msg='.$msg.'&flg='.$flg;

  echo "<script type=\"text/javascript\">  window.location.href='$redirectUrl'; </script>";

  }

} 

?> 