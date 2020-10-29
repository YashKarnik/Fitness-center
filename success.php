<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
.base{
    font-family:sans-serif;
width:100%;
padding:20px;
text-align:center;
opacity:0.8;
border-radius:5px;
}

.error {
    background-color:red;
}
.success {
    background-color:green;
}

</style>
<body>
    <?php
    if(empty($_POST['age']) || empty($_POST['email']) || empty($_POST['password']) || empty($_POST['email'])) {
        echo "<h1 class='error base'>Error....Empty fields disallowed!!</h1>";
    }
    else if(empty(strpos($_POST['password'],'@')))  {
        echo "<h1 class='error base'>Error....Password must have @!!</h1>";
    }
    else{
        $conn = new mysqli('localhost','root','','exercise_center_db') or die('Unable to connect');
        $query=sprintf("INSERT INTO userdetails (age,email,password,username) VALUES ('%u','%s','%s','%s')",$_POST['age'],$_POST['email'],$_POST['password'],$_POST['username']);
        mysqli_query($conn,$query);
        echo "<h1 class='success base'>Successfully registered</h1>";
    }
        
    ?>
</body>
</html>