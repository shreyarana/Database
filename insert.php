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

 if(mysqli_connect_error()){
 	die('Connect Eror('. mysqli_connect_error().')'. mysqli_connect_error());
 } else{
 	$SELECT = "SELECT email From register1 Where email=? Limit=1";
 	$INSERT ="INSERT Into register1 (username,email,password,gender,phone) values(?,?,?,?,?)";

 	$stmt = $conn->prepare($SELECT);
 	$stmt->bind_param("s",$email);
 	$stmt->execute();
 	$stmt->bind_result($email);
 	$stmt->store_result();
 	$rnum = $stmt->num_rows;

 	if($rnum==0){
 		$stmt->close();
 		$stmt= $conn->prepare($INSERT);
 		$stmt->bind_param("ssssi",$username,$email,$password,$gender,$phone);
 		$stmt->execute();
 		echo "New record inserted successfully";

 	} else {
 		echo "Someone already register using this email";
 	}
 	$stmt->close();
 	$conn->close();

 }
  }else{
  	echo "All field are required";
  	die();
  }
