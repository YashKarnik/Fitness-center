<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
.succces{
    background_color:green;
    padding:50px;
    width:100%;
    text-align:center;
}
</style>
<body>
    <?php
        $conn = new mysqli('localhost','root','','exercise_center_db') or die('Unable to connect');
        $query=sprintf("INSERT INTO user VALUES ('%s','%s')",$_POST['login'],$_POST['password']);
        mysqli_query($conn,$query);
        echo "<p class='Succes'>Successfully Logged in</p>"
        
    ?>
</body>
</html>