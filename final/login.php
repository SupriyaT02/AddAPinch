<?php
$uname=$_POST['uname'];
$upass=$_POST['upass'];
$input_hash=md5($upass);
include_once("connection.php");
$cmd="select * from user where username='$uname'";
$sql_result=mysqli_query($conn,$cmd);
$row=mysqli_fetch_assoc($sql_result);
if($row['password']==$input_hash)
{
    echo "Login successful!";
    header('location:upload.html');
}
else{
    echo "Login falied";
}

?>