<?php
  $username=$_POST['username'];
  $email=$_POST['email'];
  $password=$_POST['password'];
  $gender=$_POST['gender'];
  $phone=$_POST['phone'];

  if(!empty($username) || !empty($email) || !empty($password) || !empty($gender) || !empty($phone) ){
  	$host="localhost";
  	$dbUsername="root";
  	$dbPassword='';
  	$dbname="form1";

 $conn=new mysqli($host,$dbUsername,$dbPassword,$dbname);

 if(mysqli_connect_error())
 {
 	die('Connect Eror('. mysqli_connect_error().')'. mysqli_connect_error());
 } 
 else
 {
 	$sql ="INSERT Into register1 (username,email,password,gender,phone) values(?,?,?,?,?)";
 	echo "New record inserted successfully";
 	
 	$conn->close();
 }
}
 else
 {
  	echo "All field are required";
  	die();
  }

