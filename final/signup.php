<?php

$uname=$_POST['uname'];
$mail=$_POST['mail'];
$pass1=$_POST['upass1'];
$pass2=$_POST['upass2'];

if($pass1!=$pass2)
{
    echo "Password mismatch";
    die;
}
//$conn= new mysqli("localhost","root","","data_base");
include_once("connection.php");
$cmd="select * from user where username='$uname'";
$sql_result=mysqli_query($conn,$cmd);

$total_row_count=mysqli_num_rows($sql_result);
if($total_row_count>0)
{
    echo "Username already exists";
    die;
}
$hash=md5($pass1);


$cmd="insert into user(username,email,password) values('$uname','$mail','$hash')";

$sql_status=mysqli_query($conn,$cmd);
if($sql_status)
{
    echo "Successful Signup";
    header('location:login.html');
}
else{
    echo "Signup failed";
    echo mysqli_error($conn);
}


?>