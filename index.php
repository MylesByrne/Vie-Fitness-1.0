
<?php
  session_start();

  include("./connection.php");
  include("./functions.php");

  $user_data = check_login($con)
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <title>Vie Fitness</title>

        <style>
            @import url('https://fonts.googleapis.com/css2?family=Sora:wght@300&display=swap');
            
            .card {
                margin: 0 auto; 
                float: none; 
                margin-top: 30vh; 
                }   
           .index_body {
              text-align: center;
              margin-top: 40vh;
              color: white;
           }
           body{
             background:#063852;
             
           }
          .navbar{
             background: #F28500;
             height: 7vh;

           }
           .btn-danger{
             position: absolute;
             top: 10px;
             right: 10px;

           }
           .btn-d{
             position: absolute;
             top: 10px;
             margin-right: 10px;
             margin-left: 10px;
             background: #F28500

           }
           .fade-in-image {
            animation: fadeIn 5s;
            -webkit-animation: fadeIn 5s;
            -moz-animation: fadeIn 5s;
            -o-animation: fadeIn 5s;
            -ms-animation: fadeIn 5s;
            
              }
              @keyframes fadeIn {
                0% {opacity:0;}
                100% {opacity:1;}
              }

              @-moz-keyframes fadeIn {
                0% {opacity:0;}
                100% {opacity:1;}
              }

              @-webkit-keyframes fadeIn {
                0% {opacity:0;}
                100% {opacity:1;}
              }

              @-o-keyframes fadeIn {
                0% {opacity:0;}
                100% {opacity:1;}
              }

              @-ms-keyframes fadeIn {
                0% {opacity:0;}
                100% {opacity:1;}
              }
            .loc{
            margin-top: 10vh;
            margin-left: 1%;
            height: 50vh;
            position:absolute;
            }
            .btn-warning{
              background: #F28500;
            }
        </style>


    </head>
    
    <body>

          <a class="btn btn-danger" href="./logout.php" style="opacity: 80%" role="button">Log Out</a>
          <a class="btn btn-d" href="./create_fitness_log.php" style="opacity: 100%" role="button">New Fitness Log</a>
          
          <img src="./Vie_svgs/fitness_stats.svg" class=" loc"/> 
          <div class="index_body">
            <div class="fade-in-image">
          <?php 
          echo "<h1> Welcome to Vie Fitness ", $user_data['fname'], "</h1>";
          echo "<h3> You Currently Have ", $user_data['current_points'], " Points</h3>";
          ?>
          </div>
          
          <br/>
          <a class="btn btn-warning" href="./create_group.php" style="opacity: 100%" role="button">Create Group</a>
          <a class="btn btn-warning" href="./view_groups.php" style="opacity: 100%" role="button">View Current Groups</a>
          <a class="btn btn-warning" href="./join_group.php" style="opacity: 100%" role="button">Join Group</a>
          </div>
    </body>

</html>