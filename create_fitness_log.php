
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
        <link rel="stylesheet" href="./font-awesome/css/font-awesome.min.css">
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
            animation: fadeIn 2s;
            -webkit-animation: fadeIn 2s;
            -moz-animation: fadeIn 2s;
            -o-animation: fadeIn 2s;
            -ms-animation: fadeIn 2s;
            
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
          
          
          
          <div class="index_body">
            <div class="fade-in-image">
          <a class="btn btn-warning" href="./conditioning.php" style="opacity: 100%" role="button">Conditioning Log</a>
          <a class="btn btn-warning" href="./strength.php" style="opacity: 100%" role="button">Strength Log</a>
          <a class="btn btn-warning" href="./weight.php" style="opacity: 100%" role="button">Weight Log</a>
          <a href="./index.php" class="btn btn-warning" role="button" aria-pressed="true"><i class="icon-home"></i></a>
          </div>
          
          <br/>
         
          </div>
    </body>

</html>