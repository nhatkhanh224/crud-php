<?php
require "dbConn.php";
if (isset($_GET['delete'])) {
    $id=$_GET['delete'];
    $sql = "DELETE from student WHERE id=$id";
    $data=mysqli_query($connect,$sql);
    }
?>