<?php
function changePassword($curr_password,$new_password,$username) {
require './config/db_connect.php';
$query ="SELECT password FROM user_details WHERE password='{$curr_password}'";
$result=mysqli_query($conn,$query);
$posts = mysqli_fetch_all($result,MYSQLI_ASSOC);
// echo print_r($posts);
if(isset($posts[0]['password'])) {
    $query ="UPDATE user_details SET password='{$new_password}' WHERE password='{$curr_password}' AND username='{$username}' ";
    $result=mysqli_query($conn,$query);
    // $posts = mysqli_fetch_all($result,MYSQLI_ASSOC);
    return '<div class="alert alert-success col-md-6 text-center font-weight-bold mx-auto mt-5 mb-0" role="alert">
    <h4>Successfully changed Password!</h4>
   </div>';
    
}
return '<div class="alert alert-danger col-md-6 text-center font-weight-bold mx-auto mt-5 mb-0" role="alert">
<h4>Incorrect password!</h4>
</div>';
}
