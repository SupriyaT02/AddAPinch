<?php
$conn= new mysqli("localhost","root","","data_base");
if($conn->connect_error)
{
    echo "Connection failed";
    die;
}
?>