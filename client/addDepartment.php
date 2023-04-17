<?php 

include 'global.php'

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Department</title>
</head>
<body>
    <form action="<?php echo $url ?>/department" method="POST">
        <input name="dept" placeholder="Enter Department..." type="text">
        <input type="submit" name="submit" value="Submit">
    </form>
</body>
</html>