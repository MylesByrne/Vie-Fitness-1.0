<?php
  session_start();

    include("connection.php");
    include("functions.php");

    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        //something was posted


        $email = $_POST['Email'];
        $username = $_POST['Username'];
        $pword = $_POST['Pword'];
        $pconfirm = $_POST['Pconfirm'];
        $bdate = $_POST['Bdate'];
        $fname = $_POST['Fname'];
        $lname = $_POST['Lname'];
        $sex = $_POST['Sex'];
        $height = $_POST['Height'];
        $bodyfat_pct = $_POST['Bodyfat_pct'];
        $current_weight = $_POST['Current_Weight'];
        $current_date = date("Y-m-d");

        //echo $current_date, $current_weight, $bodyfat_pct, $height, $sex ,$lname, $fname, $bdate ,$pconfirm ,$pword, $username ,$email;
        //die;


        $query = "SELECT * FROM users WHERE users.username = '$username' LIMIT 1";

        $result = mysqli_query($con,$query);

        if (mysqli_num_rows($result) > 0)
        {
            echo "Username already in Database ";
            die;
        }

        $query = "SELECT * FROM users WHERE users.email = '$email' LIMIT 1";

        $result = mysqli_query($con,$query);

        if (mysqli_num_rows($result) > 0)
        {
            echo "Email already in database ";
            die;
        }

        if (empty($bodyfat_pct)){
            $bodyfat_pct = 20;
        }
        if ($pword != $pconfirm){
            echo "passwords do not match";
            die;
        }

        if (!empty($email) && !empty($pword) && !empty($pconfirm) && !empty($fname) && !empty($lname) && !empty($sex) && !empty($height)  && !empty($current_weight) && !empty($username))
        {
            $point_multiplier = 1;

            if($sex = "F")
            {
                $pointmultiplier = $pointmultiplier + .33;
            }
            

            // save to database
            $query = "INSERT INTO users (fname, lname, username, pword, sex, height, birth_date, bodyfat_pct, last_login, current_weight, email, point_multiplier) 
            VALUES ('$fname', '$lname', '$username', '$pword', '$sex', '$height', '$bdate',  '$bodyfat_pct', '$current_date', '$current_weight', '$email', '$pointmultiplier')";

            mysqli_query($con, $query);
            header("Location: log_in.php");
            die;
        }
        else
        {
            echo "Please enter some valid information!";
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
            .submit-btn{
                width: 80%;
                
            }
            .icon-home{
                color:white;
            }
            body{
                background-color: #063852;
            }
           .card-footer{
               
               height: 50px;
               
           }
           .sex{
               margin-top: 5px;
            
           }
        </style>

    </head>
    
<body>
    <div class ="container h-100">
    <div class="card border-dark  d-flex" style="width: 75rem;">
        <div>
            <div class="card-header row ">
                <div class="col-6 col-md-4">
                    
                    <a href="./index.php" class="btn active" role="button" aria-pressed="true"><i class="icon-home"></i></a>
                </div>
                <div class="col-12 col-md-8">
                    <h3 class="logo">Vie Fitness - Sign Up</h3>
        </div>     
            </div >
<div class="card-body"> 

<form method="POST">
  <div class="form-row">

    <div class="form-group col-md-6">
        <label for="Email">Email address *</label>
        <input type="email" class="form-control"  name="Email" id="Email"  placeholder="Enter email *" required>
    </div>

    <div class="form-group col-md-6">
    <label for="Username">Username</label>
    <input type="text" class="form-control"  name="Username" id="Username"  placeholder="Enter username *" required>
    </div>

    </div>
   <div class="form-row">
  <div class="form-group col-md-6">
    <label for="Pword">Password</label>
    <input type="password" class="form-control" name="Pword" id="Pword" placeholder="Password *" required>
  </div>
  <div class="form-group col-md-6">
    <label for="Pconfirm">Confirm Password</label>
        <input type="password" class="form-control" name="Pconfirm" id="Pconfirm" placeholder="Password *" required>
  </div>
        </div>
  <div class="form-row">
    <div class="form-group col-md-6">
    <label for="Fname">First Name</label>
    <input type="text" class="form-control" name="Fname" id="Fname"placeholder="First Name *" required>
    </div>
    <div class="form-group col-md-6">
    <label for="Lname">Last Name</label>
    <input type="text" class="form-control" name="Lname" id="Lname"placeholder="Last Name *" required>
    </div>
    </div>
    

  <div class="form-row">
    
   

  <div class="form-group col-md-6">
  <label for="Bodyfat_pct">Body fat percentage (optional)</label>
                        <input type="text" class="form-control" name="Bodyfat_pct" id="Bodyfat_pct" placeholder="Body Fat Percentage ">
    </div>

    <div class="form-group col-md-6">
    <label for="Current_Weight">Current Weight</label>
                        <input type="text" class="form-control" name="Current_Weight" id="Current_Weight"placeholder="Current Weight(Lbs) *" required>
    </div>
    </div>


    <div class="form-row">
    <div class="form-group col-md-6 sex">
    <div class="form-check form-check-inline">
  <input
    class="form-check-input"
    type="radio"
    name="Sex"
    id="inlineRadio1"
    value="M"
  />
  <label class="form-check-label" for="inlineRadio1">Male</label>
</div>

<div class="form-check form-check-inline">
  <input
    class="form-check-input"
    type="radio"
    name="Sex"
    id="inlineRadio2"
    value="F"
  />
  <label class="form-check-label" for="inlineRadio2">Female</label>
</div>
    </div>
    </div>
<div class="form-row">
    <div class="form-group col-md-4">
    <label for="Birth Date">Birth Date</label>
                        <input type="Date" class="form-control" name="Bdate" id="Bdate"placeholder="Birth Date" required>
        </div>

    <div class="form-group col-md-4">
        <label for="Height">Height in Inches</label>
        <input type="text" class="form-control" name="Height" id="Height"placeholder="Height In inches *" required>
    </div>
    <div class="form-group col-md-4">
    <label for="Current_Weight">Current Weight</label>
                        <input type="text" class="form-control" name="Current_Weight" id="Current_Weight"placeholder="Current Weight(Lbs) *" required>
 </div>

</div>

<div class="form-row">

 <div class="form-group col-md-12 text-center">
     <button type="submit" class="btn btn-primary submit-btn rounded-pill">Sign Up</button>
        </div>

        </div>

  </form>

        </div>


  

  </div>
 



        <div class="card-footer">
        <div>
            <p style="margin-left: 10px"> already have an account? <a href="./index.php">Log In</a></p>
        </div>
                
            </div>
        </div>
    </div>
</div>
</body>



</html>