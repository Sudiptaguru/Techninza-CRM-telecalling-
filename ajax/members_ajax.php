<?php
include '../db.php';
$id=$_POST["id"];
$sql="SELECT `id`, `name`, `email`, `phone` FROM `members` WHERE `id`='".$id."'";
$result=$conn->query($sql) ;
$count=$result->num_rows;
$row = $result->fetch_assoc();
if($count>0)
{
$id=$row['id'];
$name=$row['name'];
$email=$row['email'];
$phone=$row['phone'];
$arr=array("id" => $id,"name" => $name,"email" => $email,"phone" => $phone);
echo json_encode($arr);
}

?> 

