<?php include('db.php');
    $sql_province=mysqli_query($conn,"SELECT * FROM province ORDER BY id_province ASC");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
        integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous" />

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css"
        integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous" />

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
        integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous">
    </script>
    <title>Document</title>
</head>

<body>
    <div class="container">
        <h1 style="text-align: center">Form thêm thông tin</h1>
        <form action="" method="POST" id="insert_data_student">
            <div class="form-group">
                <label>Name:</label>
                <input type="text" class="form-control" id="name" />
            </div>
            <div class="form-group">
                <label>Age:</label>
                <input type="text" class="form-control" id="age" />
            </div>
            <div class="form-group">
                <label>Address:</label>
                <input type="text" class="form-control" id="address" />
            </div>
            <input type="button" value="Insert" name="insert_data" id="button_insert" class="btn btn-success" />
        </form>
        <h1 style="text-align: center">Load dữ liệu</h1>
        <div id="load_data"></div>
        <div class="form-group">
            <label for="sel1">Select list:</label>
            <select class="form-control" id="province" name="province">
                <option>--Chọn tỉnh--</option>
                <?php
                while($rows_province=mysqli_fetch_array($sql_province))
                {
                    echo '<option value="'.$rows_province['id_province'].'">'.$rows_province['province'].'</option>';
                }
                 ?>
            </select>
        </div>
        <div class="form-group">
            <label for="sel1">Select list:</label>
            <select class="form-control" id="district" name="district">
               
            </select>
        </div>
    </div>
    <script>
    $(document).ready(function() {
        $('#province').change(function(e) {
            var id_province = $(this).val();
            $.ajax({
                url: "ajax_action.php",
                method: "POST",
                data: {
                    id_province: id_province
                },
                success: function(data) {
                    $("#district").html(data);
                }
            });

        });
    });
    </script>
    <script type="text/javascript">
    $(document).ready(function() {
        function fetch_data() {
            $.ajax({
                url: "ajax_action.php",
                method: "POST",
                success: function(data) {
                    $("#load_data").html(data);
                }
            });
        }
        fetch_data();
        //delete data
        $(document).on('click', '.del_data', function() {
            var id_delete = $(this).data('id-delete');
            $.ajax({
                url: "ajax_action.php",
                method: "POST",
                data: {
                    id_delete: id_delete
                },
                success: function(data) {
                    alert("Delete success");
                    fetch_data();
                },
            });
        })
        //edit data
        function edit_data(id_edit, text, column_name) {
            $.ajax({
                url: "ajax_action.php",
                method: "POST",
                data: {
                    id: id_edit,
                    text: text,
                    column_name
                },
                success: function(data) {
                    alert("Edit success");
                    fetch_data();
                },
            });
        }
        $(document).on('blur', '.name', function() {
            var id_edit = $(this).data('id-edit');
            var text = $(this).text();
            edit_data(id_edit, text, "name");
        })
        //insert data
        $("#button_insert").on("click", function() {
            var name = $("#name").val();
            var age = $("#age").val();
            var address = $("#address").val();
            if (name == "" || age == "" || address == "") {
                alert("Not be empty");
            } else {
                $.ajax({
                    url: "ajax_action.php",
                    method: "POST",
                    data: {
                        name: name,
                        age: age,
                        address: address
                    },
                    success: function(data) {
                        alert("Insert success");
                        $("#insert_data_student")[0].reset();
                        fetch_data();
                    },
                });
            }
        });
    });
    </script>
</body>

</html>