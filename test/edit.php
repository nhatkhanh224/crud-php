<?php
require 'dbConn.php';
if (isset($_POST['edit'])) {
    $id=$_POST['id'];
    $name=$_POST['name'];
    $age=$_POST['age'];
    $sql="UPDATE student set name='$name',age='$age' where id=$id";
    $data=mysqli_query($connect,$sql);
}
 ?>