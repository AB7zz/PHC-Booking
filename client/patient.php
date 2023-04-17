<?php 

include 'global.php'

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Appointment</title>
</head>
<body>
    <form method="POST">
        <input name="name" placeholder="Enter Name..." type="text">
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
        <select name="loc_id" id="">
            <option value="">Selection Location</option>
            <?php
                $select = "select * from `location`";
                $run = mysqli_query($con, $select);
                while($row = mysqli_fetch_array($run)){
                    $loc_id = $row['loc_id'];
                    $name = $row['name'];
                    echo "<option value='$loc_id'>$name</option>";
                }
            ?>
        </select>
        <label for="">Time</label>
        <input type="time" name='at'>
        <button type='submit' name="show" id="show">Show available doctors</button>
    </form>
    <form action="<?php echo $url ?>/book" method="POST">
        <?php
        
            if(isset($_POST['show'])){
                $name = $_POST['name'];
                $at = $_POST['at'];
                $dept_id = $_POST['dept_id'];
                $loc_id = $_POST['loc_id'];
                echo "
                <div style='display: none;'>
                    <input type='text' name='name' value='$name'>
                    <input type='text' name='dept_id' value='$dept_id'>
                    <input type='time' name='time' value='$at'>
                </div>
                <label>Select Doctor</label>
                    <select name='doc'>
                        <option>Select a doctor</option>"
                ;

                $selectD = "select * from doctor where da_id in (select da_id from da where starttime <= '$at' and endtime >= '$at') and dept_id = '$dept_id' and phc_id in (select phc_id from phc where loc_id = '$loc_id')";
                $runD = mysqli_query($con, $selectD);
                
                while($rowD = mysqli_fetch_array($runD)){
                    $name = $rowD['name'];
                    $doc_id = $rowD['doc_id'];
                    echo "<option value='$doc_id'>$name</option>";
                }
                
                echo "<input type='submit' name='book' value='book'>";
            }
            
        ?>
        </select>
    </form>
</body>
</html>
