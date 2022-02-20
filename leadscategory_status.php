<?php

include "db.php";

$id=$_REQUEST['id'];

$sql=mysqli_query($conn,"SELECT * FROM leads_category WHERE id=".$id);

$fetch=mysqli_fetch_array($sql);

// print_r($fetch);



if($fetch['status']==1)

{

	$update=mysqli_query($conn,"UPDATE leads_category SET status='0' WHERE id=".$id); 

	if($update)

	{

		header("location:leads_category.php");

	}



}



if($fetch['status']==0)

{

	$update=mysqli_query($conn,"UPDATE leads_category SET status='1' WHERE id=".$id);

	if($update)

	{

		header("location:savedata.php");

	}



}



?>