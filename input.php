<?php
require "dbConn.php";
if (isset($_POST['save'])) {
    $name=$_POST['name'];
    $ovr=$_POST['ovr'];
    $sql = "INSERT INTO player(`id`, `name`, `ovr`) VALUES (null, '$name','$ovr')";
    $data=mysqli_query($connect,$sql);
}
?>