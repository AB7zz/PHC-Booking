<?php 

include 'global.php'

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Location</title>
</head>
<body>
    <form action="<?php echo $url ?>/location" method="POST">
        <input name="loc" placeholder="Enter location..." type="text">
        <input type="submit" name="submit" value="Submit">
    </form>
</body>
</html>