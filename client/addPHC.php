<?php 

include 'global.php'

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add PHC</title>
</head>
<body>
    <form action="<?php echo $url ?>/phc" method="POST">
        <input name="phc" placeholder="Enter PHC..." type="text">
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
        <input type="submit" name="submit" value="Submit">
    </form>
</body>
</html>