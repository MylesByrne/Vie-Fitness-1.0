<?php
  session_start();

    include("connection.php");
    include("functions.php");

    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
       $email = $_POST['InputEmail1'];
       $password = $_POST['InputPassword1'];

       if(!empty($email) && !empty($password))
       {
           $query = "SELECT * FROM users WHERE users.email = '$email' LIMIT 1";
           $result = mysqli_query($con, $query);

           
            if($result && mysqli_num_rows($result) > 0)
            {
                $user_data = mysqli_fetch_assoc($result);
                $curdate = date("Y-m-d");
                if($user_data['pword'] == $password)
                {
                    $_SESSION['users_id'] = $user_data['users_id'];

                    if($curdate != $user_data['last_login'])
                    {

                        $points = $user_data['current_points'];
                        $points = $points + 10;
                        $userid = $user_data['users_id'];

                        $query = "UPDATE users SET current_points = '$points', last_login = '$curdate' WHERE users_id = '$userid' ";

                        mysqli_query($con, $query);
                    }

                    header("Location: index.php");
                    die;
                }
            }
           
       }

    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="./font-awesome/css/font-awesome.min.css">
        <title>Vie Fitness</title>

        <style>
            @import url('https://fonts.googleapis.com/css2?family=Sora:wght@300&display=swap');
            
            .card {
                margin: 0 auto; 
                float: none; 
                margin-top: 30vh; 
                }   
            .logo{
                color: #063852;
                font-weight: bold;
                font-family: 'Sora', sans-seriff;
               
            }
            .btn{
                background-color:#063852;
            }
            .icon-home{
                color:white;
            }
            body{
                background-color: #063852;
            }
           
        
        </style>

    </head>
    
<body>
    <div class ="container h-100">
    <div class="card border-secondary d-flex" style="width: 30rem;">
        <div>
            <div class="card-header row">
                <div class="col-6 col-md-4">
                    
                    <a href="./index.php" class="btn active" role="button" aria-pressed="true"><i class="icon-home"></i></a>
                </div>
                <div class="col-12 col-md-8">
                    
                    <h3 > Log In </h3>
                </div>
            </div >

            <div class="card-body"> 


                <form method="POST">
                    <div class="form-group">
                      <label for="InputEmail1">Email address</label>
                      <input type="email" class="form-control" name="InputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                      
                    </div>
                    <div class="form-group">
                      <label for="InputPassword1">Password</label>
                      <input type="password" class="form-control" name="InputPassword1" placeholder="Password">
                    </div>
                   
                    <button type="submit" class="btn btn-primary w-100">Log In</button>
                </form>
            </div>
            <div class="card-footer">
                <div class="text-muted">Don't have an account? <a href="./sign_up.php">Sign Up</a></div>
                <a href="#" class="text-center">forgot password?</a>
            </div>
        </div>
    </div>
</div>
</body>



</html>