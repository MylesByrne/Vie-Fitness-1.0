<?php
        session_start();

        include("./connection.php");
        include("./functions.php");

        $user_data = check_login($con);
        $user_id = $user_data['users_id'];

    $query = "SELECT * FROM groups, participates_in WHERE participates_in.u_id = '$user_id' AND groups.g_id = participates_in.g_id";
    $result = mysqli_query($con, $query);
    $group_data = mysqli_fetch_assoc($result);
    
    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        
        $g_id = $_POST['group'];
        
        $query = "SELECT  * FROM users, participates_in WHERE participates_in.g_id = '$g_id' AND participates_in.u_id = users.users_id ORDER BY users.current_points DESC ";
        $result = mysqli_query($con, $query);
        $group_data = mysqli_fetch_assoc($result);

        echo $group_data['username'], "-", $group_data['current_points'], "</br>";
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                print_r($row['username']);
                echo "-";
                print_r($row['current_points']);
                echo "</br>";
            }
            
        }
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

            <div class="display">
        <div>
            <div class="card-header row">
                <div class="col-6 col-md-4">
                    
                    <a href="./index.php" class="btn active" role="button" aria-pressed="true"><i class="icon-home"></i></a>
                </div>
                <div class="col-12 col-md-8">
                    
                    <h3 > Choose Group</h3>
                </div>
            </div >

            <div class="card-body"> 


                <form method="POST">
                    <div class="form-group ">
                    <div class="form-check form-check-inline">
                    <?php
                        $g_name = $group_data['g_name'];
                        $g_id = $group_data['g_id'];
                        echo " <input
                        class='form-check-input'
                        type='radio'
                        name='group'
                        id='inlineRadio1'
                        value = '$g_id'
                      />
                      <label class='form-check-label' for='inlineRadio1'>$g_name</label>";
                        while ($row = mysqli_fetch_assoc($result)) {
                            $g_name = $row['g_name'];
                            $g_id = $row['g_id'];
                            echo " <input
                            class='form-check-input'
                            type='radio'
                            name='group'
                            id='inlineRadio1'
                            value='$g_id'
                          />
                          <label class='form-check-label' for='inlineRadio1'>$g_name</label>";
                        };

                    ?>
                    
                    </div>
                    
                   
                    <button type="submit" class="btn btn-primary w-100">Select Group</button>
                </form>
            </div>
                    </div>
        </div>
    </div>
</div>
</body>



</html>