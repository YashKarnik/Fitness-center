<?php
if (isset($_POST['submit'])) {
    require './config/db_connect.php';
    $email = $_COOKIE['email'];
    $query = "DELETE FROM premium_membership WHERE email='{$email}'";
    // echo $query;
    if (mysqli_query($conn, $query))    echo 'DONE';
    else     $error2 = mysqli_error($conn);
    session_start();
    header('Location:index.php');
    session_destroy();
}
?>


<!DOCTYPE html>
<html lang="en">
<?php include('./include/header.php') ?>
<title>Cancel Membership</title>

<body>
    <?php include('./include/navbar.php'); ?>
    <div class="container  bg-danger mt-5 p-0 rounded-sm p-4">
        <div class="alert alert-warning col-md-9 text-center font-weight-bold mx-auto mt-5 mb-0" role="alert">
            <h1>Are You Sure?? You will not be refunded</h1>
        </div>
        <form class='text-center mt-4' action='<?php echo $_SERVER['PHP_SELF']; ?>' method="post">
            <button id="deactivate-btn" name='submit' type="submit" class="btn btn-lg btn-warning mx-auto">
                Deactivate
            </button>
        </form>
    </div>
</body>

</html>