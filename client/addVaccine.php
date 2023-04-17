<?php 

include 'global.php'

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Vaccine</title>
</head>
<body>
    <form action="<?php echo $url ?>/vaccine" method="POST">
        <label for="">Name</label>
        <input name="vacc" placeholder="Enter Vaccine..." type="text">
        <label for="">Available</label>
        <input type="number" name="available">
        <input type="submit" name="submit" value="Submit">
    </form>
</body>
</html>