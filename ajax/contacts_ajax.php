<?php
include '../db.php';
$contact_id=$_POST["contact_id"];
$sql="SELECT `contact_id`, `contact_name`, `contact_email`, `contact_mobile`, `assigned_member_id`, `lead_status`, `remarks` FROM `contacts` WHERE `contact_id`='".$contact_id."'";
$result=$conn->query($sql) ;
$count=$result->num_rows;
$row = $result->fetch_assoc();
if($count>0)
{
$contact_id=$row['contact_id'];
$contact_name=$row['contact_name'];
$contact_email=$row['contact_email'];
$contact_mobile=$row['contact_mobile'];
$assigned_member_id=$row['assigned_member_id'];
$lead_status=$row['lead_status'];
$remarks=$row['remarks'];
$arr=array("contact_id" => $contact_id,"contact_name" => $contact_name,"contact_email" => $contact_email,"contact_mobile" => $contact_mobile,"assigned_member_id" => $assigned_member_id,"lead_status" => $lead_status,"remarks" => $remarks);
echo json_encode($arr);
}

?> 

