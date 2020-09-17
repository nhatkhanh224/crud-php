<?php 
    include("db.php");
    //Select data
    if (isset($_POST['id_province'])) {
        $id_province=$_POST['id_province'];
        $sql_district=mysqli_query($conn,"SELECT * FROM district WHERE id_province='$id_province' ");
        $output='';
        $output= '<option>--Select District---</option>';
        while ($rows_district=mysqli_fetch_array($sql_district)) {
            $ouput.= '<option value="'.$rows_district['id_district'].'">'.$rows_district['district'].'</option>';
        }
        echo $ouput;

    }
    //Input data
    if (isset($_POST['name'])) {
        $name=$_POST['name'];
        $age=$_POST['age'];
        $address=$_POST['address'];
        $sql="INSERT INTO `ajax`.`student`(`id`,`name`, `age`, `address`) VALUES (null,'$name', $age, '$address')";
        $result=mysqli_query($conn,$sql);
        
    }
    //delete data
    if (isset($_POST['id_delete'])) {
        $id=$_POST['id_delete'];
        $sql="DELETE FROM student where id='$id'";
        $result=mysqli_query($conn,$sql);
        
    }
    //edit data
    if (isset($_POST['id'])) {
        $id=$_POST['id'];
        $text=$_POST['text'];
        $column_name=$_POST['column_name'];
        $sql="UPDATE student SET $column_name='$text' where id='$id'";
        $result=mysqli_query($conn,$sql);
        
    }
    //get data
    $output='';
    $sql_select=mysqli_query($conn,"SELECT * FROM student ORDER BY id DESC");
    $output.='
        <div class="table table-responsive">
            <table class="table table-bordered">
                <tr>
                    <td>Name</td>
                    <td>Age</td>
                    <td>Address</td>
                    <td>Option</td>
                </tr>
           
    ';
    if (mysqli_num_rows($sql_select)>0) {
        while($rows=mysqli_fetch_array($sql_select))
        {
            $output.='
            <tr>
                    <td class="name" data-id-edit='.$rows['id'].' contenteditable>'.$rows['name'].'</td>
                    <td contenteditable>'.$rows['age'].'</td>
                    <td contenteditable>'.$rows['address'].'</td>
                    <td><button data-id-delete='.$rows['id'].' class="btn btn-sm btn-danger del_data" name="delete_data">Delete</button></td>
            </tr>
            ';
        }
    }
    else
    {
        $output='
        <tr>
            <td colspan="6">Empty data</td>
            
        </tr>';
    }
    $output.=' </table></div>';
    echo $output;
?>