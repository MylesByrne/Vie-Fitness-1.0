<?php
  session_start();

    include("connection.php");
    include("functions.php");
    $user_data = check_login($con);

    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
       $value = $_POST['value'];
       $e_name = $_POST['e_name'];
       $reps = $_POST['reps'];
       $curdate = date("Y-m-d");
       $userid = $user_data['users_id'];

       if(!empty($value) && !empty($e_name))
       {
           $query = "INSERT INTO strength_logs (s_date, e_name, s_value, reps, uid_s) VALUES ('$curdate', '$e_name', '$value', '$reps', '$userid')";
           mysqli_query($con, $query);

           $query = "SELECT * FROM strength_logs WHERE strength_logs.uid_s = '$userid' ORDER BY s_date LIMIT 2";
           $result = mysqli_query($con, $query);
           
           $log_data = mysqli_fetch_assoc($result);

           $current_value = $log_data['s_value'];
        
           $log_data1 = mysqli_fetch_assoc($result);

           $next_value =  $log_data1['s_value'];

           $temp = $current_value - $next_value; 

           $log_data = mysqli_fetch_assoc($result);

           $current_value = $log_data['reps'];
        
           $log_data1 = mysqli_fetch_assoc($result);

           $next_value =  $log_data1['reps'];

           $temp = $temp + ($current_value - $next_value); 

           $temp = $temp * 5;

           $temp = $temp * $user_data['point_multiplier'];

           $temp = $temp + $user_data['current_points'];

           $query = "UPDATE users
                     SET current_points = '$temp'
                     WHERE users.users_id = '$userid'";
        
        mysqli_query($con, $query);
                
        header("Location: index.php");
        die;
            
           
        
           
            

       
        
           
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
                    
                    <h3 > Strength </h3>
                </div>
            </div >

            <div class="card-body"> 


                <form method="POST">
                    <div class="form-group">
                      <label for="e_name">Excercise Name</label>
                      <input type="text" class="form-control" name="e_name" aria-describedby="emailHelp" placeholder="Enter Excercise Name">
                      
                    </div>
                    <div class="form-group">
                      <label for="value">Value(Lbs)</label>
                      <input type="number" class="form-control" name="value" placeholder="100">
                    </div>
                    <div class="form-group">
                      <label for="reps">Reps</label>
                      <input type="number" class="form-control" name="reps" placeholder="5">
                    </div>
                   
                    <button type="submit" class="btn btn-primary w-100">Submit Log</button>
                </form>
            </div>
            
        </div>
    </div>
</div>
</body>



</html>