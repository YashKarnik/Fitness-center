<?php

function getUsername()
{
    require './config/db_connect.php';
    $username = '';
    if (isset($_COOKIE['email'])) {
        $email = $_COOKIE['email'];
        // echo $email;
        $query = "SELECT username FROM user_details WHERE email='{$email}'";
        $result = mysqli_query($conn, $query);
        // echo print_r($result);
        $posts = mysqli_fetch_all($result, MYSQLI_ASSOC);
        if (count($posts) > 0) $username = $posts[0]['username'];
    }
    return $username;
}
