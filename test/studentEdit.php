<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php require 'showId.php';
    require 'edit.php' ?>
    <form action="" method='POST'>
    <input type="hidden" name="id" value='<?php echo $id ?>' > 
    <label for="">Name :</label>
    <input type="text" name="name" value="<?php echo $name ?>">
    <label for="">Age :</label>
    <input type="text" name="age" value="<?php echo $age ?>">
    <button name="edit" >Submit</button>
    </form>
</body>
</html>