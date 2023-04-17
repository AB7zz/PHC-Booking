<?php 

include 'global.php'

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Doctor</title>
</head>
<body>
    <form action="<?php echo $url ?>/doctor" method="POST">
        <input type="text" name="name" id="" placeholder="Enter name...">
        
        <select name="dept_id" id="">
            <option value="">Selection Department</option>
            <?php
                $select = "select * from `department`";
                $run = mysqli_query($con, $select);
                while($row = mysqli_fetch_array($run)){
                    $dept_id = $row['dept_id'];
                    $name = $row['name'];
                    echo "<option value='$dept_id'>$name</option>";
                }
            ?>
        </select>
        <select name="phc_id" id="">
            <option value="">Selection PHC</option>
            <?php
                $select = "select * from `phc`";
                $run = mysqli_query($con, $select);
                while($row = mysqli_fetch_array($run)){
                    $phc_id = $row['phc_id'];
                    $name = $row['name'];
                    echo "<option value='$phc_id'>$name</option>";
                }
            ?>
        </select>
        <select name="da_id" id="">
            <option value="">Selection DA</option>
            <?php
                $select = "select * from `da`";
                $run = mysqli_query($con, $select);
                while($row = mysqli_fetch_array($run)){
                    $da_id = $row['da_id'];
                    $st = $row['starttime'];
                    $et = $row['endtime'];
                    echo "<option value='$da_id'>$st - $et</option>";
                }
            ?>
        </select>
        <input type="submit" name="submit" value="Submit">
    </form>
</body>
</html>