<?php
print_r($_POST);
echo "<br>";
print_r($_FILES);
$name=$_POST['name'];
$ingredients=$_POST['ingredients'];
$proc=$_POST['proc'];
$actual_name=$_FILES['img']['name'];
$tmp_path=$_FILES['img']['tmp_name'];
$target_path="images//$actual_name";
move_uploaded_file($tmp_path,$target_path);

include_once("connection.php");
$cmd="insert into food(name,ingredients,proc,impath) values('$name','$ingredients','$proc','$tmp_path')";
$sql_status=mysqli_query($conn,$cmd);
if($sql_status)
{
    echo "Food uploaded successfully";
    header('location:home.html');
}
else{
    echo "Upload failed";
    echo mysqli_error($conn);
}

?>
