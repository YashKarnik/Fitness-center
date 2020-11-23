<?php
function changeUsername($curr_username,$new_username) {
require './config/db_connect.php';
$query ="SELECT username FROM user_details WHERE username='{$curr_username}'";
$result=mysqli_query($conn,$query);
$posts = mysqli_fetch_all($result,MYSQLI_ASSOC);
// echo print_r($posts);
if(isset($posts[0]['username'])) {
    $query ="UPDATE user_details SET username='{$new_username}' WHERE username='{$curr_username}'";
    $result=mysqli_query($conn,$query);
    // $posts = mysqli_fetch_all($result,MYSQLI_ASSOC);
    if($result)
    {
      
        // $_SESSION['username']=$new_username;
        setcookie('username', $new_username, time() + (86400 * 30), "/");
 
        return '<div class="alert alert-success col-md-6 text-center font-weight-bold mx-auto mt-5 mb-0" role="alert">
        <h4>Successfully changed Username!</h4>
        </div>';
    }
   else return '<div class="alert alert-danger col-md-6 text-center font-weight-bold mx-auto mt-5 mb-0" role="alert">
   <h4>Error! username already exists!</h4>
  </div>';
    
}

}?>