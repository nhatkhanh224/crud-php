<?php
require "dbConn.php";
if (isset($_POST['update'])) {
    $id=$_POST['id'];
    $name=$_POST['name'];
    $ovr=$_POST['ovr'];
    $sql = "UPDATE player set name='$name',ovr='$ovr' WHERE id=$id";
    $data=mysqli_query($connect,$sql);
    }
?>