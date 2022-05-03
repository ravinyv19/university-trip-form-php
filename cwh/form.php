<?php
     if(isset($_POST['name']))
     {
		
        $server ="localhost";
        $username ="root";
        $password ="";

        $con = mysqli_connect($server, $username, $password);

        if(!$con)
            {
                die("connection to this database is to be fialed due to the " . mysqli_connect_error());
            }

        //  echo "sucessfully conneted to database". '<img src="giphy.gif">';
        $name = $_POST['name'];
        $gender = $_POST['gender'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $desc = $_POST['desc'];

        $sql= "INSERT INTO more.trip (`name`, `gender`, `email`, `phone`, `other`, `dt`) VALUES ('$name', '$gender', '$email', '$phone', '$desc', CURRENT_TIMESTAMP());";
         //echo $sql;
        if($con->query($sql) == true){
            // echo "successfully Connected";
            $insert=true;
        }
            else{
            echo "ERROR: $sql <br> $con->error";
        }
        $con->close();
    
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to the Travel Form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <img class="bg" src="bg.png" alt="Punjabi university Patiala"
    <div class ="container">
    <h1>Welcome to the Punjabi University Patiala for trip </h1>
    <p>
        Enter yout details and submit this form to confirm your patricipation in this trip
    </p>
	<?php
            if ($insert == true){
            echo "<p class='submitMsg'>Thanks for submitting your form. We are happy to see you joining us for the US trip</p>";
            }
        ?>
    <form action="form.php" method="post">
        <input type="text" name="name" id="name" placeholder="Enter your name">
        <input type="text" name="gender" id="gender" placeholder="Enter your gender">
        <input type="email" name="email" id="email" placeholder="Enter your email">
        <input type="phone" name="phone" id="phone" placeholder="Enter your phone">
        <textarea name="desc" id ="desc" cols="30" rows="10" placeholder="Enter any other information here"></textarea>
        <button class="btn">Submit</button>
    </form>
    <!-- <button class="btn">Reset</button> -->
    
    </div>

    <script src="trav.js"></script>
    <!-- INSERT INTO `trip` (`serial`, `name`, `gender`, `email`, `phone`, `other`, `mytimestampcol`) VALUES ('1', 'Ravi Kumar', 'male', 'Ravinyv19@gmail.com', '8146635882', 'this is awesome', current_timestamp()); -->
</body>
</html>