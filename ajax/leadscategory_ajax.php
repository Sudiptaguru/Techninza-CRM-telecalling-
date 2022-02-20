<?php
include '../db.php';
$id=$_POST["id"];
$sql="SELECT `id`, `category_name` FROM `leads_category` WHERE `id`='".$id."'";
$result=$conn->query($sql) ;
$count=$result->num_rows;
$row = $result->fetch_assoc();
if($count>0)
{
$id=$row['id'];
$category_name=$row['category_name'];
$arr=array("id" => $id,"category_name" => $category_name);
echo json_encode($arr);
}

?> 

