<?php

include("connection.php");

$name = $_POST['name'];
$number = $_POST['number'];
$place = $_POST['place'];
$email = $_POST['email'];
$password = $_POST['password'];
$imageFile = $_POST['image'];


$sql ="INSERT INTO user_tbl (name,number,place,email,password) VALUES ('$name','$number','$place','$email','$password')";

if(mysqli_query($con,$sql)){
	
	$id = mysqli_insert_id($con);
	$fileName = "image".$id.".jpg";
	file_put_contents("../user_tbl/uploads/".$fileName, base64_decode($imageFile));

	$sql = "UPDATE user_tbl SET userimage = '$fileName' WHERE id = '$id'";
	mysqli_query($con,$sql);
	echo "success";
}
else{
	
	echo"failed";
}


?>