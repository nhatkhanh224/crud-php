<?php
require "dbConn.php";
if (isset($_GET['edit'])) {
    $id=$_GET['edit'];
    $sql = "SELECT * from player where id=$id";
    $data=mysqli_query($connect,$sql);
    $row=$data->fetch_array();
    $name=$row['name'];
    $ovr=$row['ovr'];
    }
?>