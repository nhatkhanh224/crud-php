<?php
 require 'dbConn.php';
 if (isset($_GET['edit'])) {
    $id=$_GET['edit'];
    $sql="SELECT * FROM student where id=$id";
    $data=mysqli_query($connect,$sql);
    $row=$data->fetch_array();
    $name=$row['name'];
    $age=$row['age'];

 }

?>