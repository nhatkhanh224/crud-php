<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php require 'studentDelete.php' ?>
    <table class="table table-light">
    <th>ID</th>
    <th>NAME</th>
    <th>AGE</th>
    <th>Option</th>
        <tbody>
        <?php
            require "dbConn.php";
            $sql="SELECT * from student";
            $data=mysqli_query($connect,$sql);
            while($row=mysqli_fetch_assoc($data)):
        ?>
            <tr>
                <td><?php echo $row['id'] ?></td>
                <td><?php echo $row['name'] ?></td>
                <td><?php echo $row['age'] ?></td>
                <td><a href="studentEdit.php?edit=<?php echo $row['id']; ?>">Edit</a> <a href="studentDelete.php?delete=<?php echo $row['id']; ?>">Delete</a></td>
            </tr>
        </tbody>
            <?php endwhile; ?>
    </table>
</body>
</html>