<?php
        session_start();

        include("./connection.php");
        include("./functions.php");

        $user_data = check_login($con);

    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
       $group_name = $_POST['group-name'];
       $end_date = $_POST['end-date'];
       $curdate = date("Y-m-d");

       if(!empty($group_name) && !empty($end_date))
       {
           $query = "SELECT * FROM groups WHERE groups.g_name = '$group_name' LIMIT 1";

           $result = mysqli_query($con, $query);

           $userid = $user_data['users_id'];

            if(mysqli_num_rows($result) > 0)
            {
                echo "group name already exsists";
                die;
            }
            $query = "INSERT INTO groups (g_name, g_start_date, g_end_date, admin_uid) VALUES ('$group_name', '$curdate', '$end_date', '$userid') ";
            
            mysqli_query ($con, $query);

            $query = "SELECT * FROM groups WHERE g_name = '$group_name' ";

            $result = mysqli_query($con, $query);

            $group_data = mysqli_fetch_assoc($result);
            $g_id = $group_data['g_id'];
            

            $query = "INSERT INTO participates_in (u_id, g_id) VALUES ('$userid', '$g_id') ";
            mysqli_query ($con, $query);
       }
        header("Location: index.php");
             die;

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
                    
                    <h3 > Create Group </h3>
                </div>
            </div >

            <div class="card-body"> 


                <form method="POST">
                    <div class="form-group">
                      <label for="group-name">Group Name:</label>
                      <input type="text" class="form-control" name="group-name"  placeholder="Enter Group Name">
                      
                    </div>
                    <div class="form-group">
                      <label for="end-date">End-Date</label>
                      <input type="date" class="form-control" name="end-date" >
                    </div>
                   
                    <button type="submit" class="btn btn-primary w-100">Create Group</button>
                </form>
            </div>
            
        </div>
    </div>
</div>
</body>



</html>