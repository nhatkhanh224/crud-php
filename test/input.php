<?php
require_once "dbConn.php";
if (isset($_POST['save'])) {
    $name=$_POST['name'];
    $age=$_POST['age'];
    $sql="INSERT INTO student(`id`,`name`,`age`) value(null,'$name','$age')";
    $data=mysqli_query($connect,$sql);
}
 ?>