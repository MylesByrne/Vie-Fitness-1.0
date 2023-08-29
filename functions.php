<?php

function check_login($con)
{
    if(isset($_SESSION['users_id']))
    {
        $id = $_SESSION['users_id'];
        $query = "SELECT * from users where users.users_id = '$id' limit 1";

        $result = mysqli_query($con, $query);
        if($result && mysqli_num_rows($result)> 0)
        {
            $user_data = mysqli_fetch_assoc($result);
            return $user_data;
        }
    }
    
    //redirect to login
    header("Location: log_in.php");
    die();
}