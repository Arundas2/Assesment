<?php
$con=mysqli_connect("localhost","root","ceymox123","test");
if(!$con){
    die("Connection failed".mysqli_connect_error());
}
$username = $_POST['username'];
$password=$_POST['password'];
$role=$_POST['role'];
if ($usename != "" || $password != ""){
$sql1="insert into user(username,password,role)values('$username','$password','$role')";
mysqli_query($con,$sql1);
}
?>