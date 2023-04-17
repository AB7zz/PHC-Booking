<?php 

include 'global.php'

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Doctor Availability</title>
</head>
<body>
    <form action="<?php echo $url ?>/da" method="POST">
        <label for="">Start time</label>
        <input type="time" name="st" id="">
        <label for="">End time</label>
        <input type="time" name="et" id="">
        <input type="submit" name="submit" value="Submit">
    </form>
</body>
</html>