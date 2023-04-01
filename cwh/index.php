<?php
$insert = false;
if(isset($_POST['name'])){

    // Set connection variables
    
    $server = "localhost";
    $username = "root";
    $password = "";

    // Create a database connection

    $con = mysqli_connect($server, $username, $password);

    // Check for connection success

    if(!$con){
        die("connection to this database failed due to". mysqli_connect_error());
    }

    // Collect post variables
    
    $name = $_POST['name'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $desc = $_POST['desc'];

    $sql = "INSERT INTO `picnic`.`picnic` (`name`, `age`, `gender`, `email`, `phone`, `desc`, `date`) VALUES ('$name', '$age', '$gender', '$email', '$phone', '$desc', current_timestamp());";
    // echo $sql;

    // Execute the query

    if($con->query($sql) == true){
        // echo "Successfully inserted";

        // Flag for successful insertion
        $insert = true;
    }
    else{
        echo "ERROR: $sql <br> $con->error";
    }

    // Close the database connection
    $con->close();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome To Travel Form</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@300;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="style.css">
</head>
<body>
    <img class="bg" src="bg.jpg" alt="Vidyalankar Polytechnic">
    <div class="container">
        <h1> Welcome To Vidyalankar Polytechnic Picnic Form </h3>
        <p> Enter your details and submit this form to confirm your participation in the trip:</p>
        <?php
        if($insert = true){
        echo "<p class='submitMsg'>Thanks for submitting your form.</p>";
        }
        ?>

        <form action="index.php" method="post">
            <input type="text" name="name" id="name" placeholder="Enter your name">
            <input type="text" name="age" id="age" placeholder="Enter your age">
            <input type="text" name="gender" id="gender" placeholder="Enter your gender">
            <input type="email" name="email" id="email" placeholder="Enter your email">
            <input type="phone" name="phone" id="phone" placeholder="Enter your phone">
            <textarea name="desc" id="desc" cols="30" rows="10" placeholder="Enter any other information here"></textarea>
            <button class="btn">Submit</button>
        </form>

    </div>
    <script src="index.js">

    </script>
</body>
</html>