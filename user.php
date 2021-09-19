<?php
require('config/config.php');
require('config/db.php');

if(isset($_POST['submit'])){
    $name =mysqli_real_escape_string($conn,$_POST['name']) ;
    $email =mysqli_real_escape_string($conn,$_POST['email']) ;
    $balance =mysqli_real_escape_string($conn,$_POST['balance' ]) ;

$query = "INSERT INTO user (Name, Email, Balance) VALUES ('$name','$email','$balance')";
if(mysqli_query($conn, $query)){
    echo "<script type='text/javascript'>alert('User Created successfully!')</script>";
    
      
    
}
else{
    echo "<script type='text/javascript'>alert('failed!')</script>";
    echo 'error'.mysqli_error($conn);
}

mysqli_close($conn);

}




?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="./style.css">
    <title>Creating User</title>
</head>
<body>
<header>
    <div class="container">
        <div id="branding">
            <h1>Banking System</h1>
        </div>
        <nav>
            <ul>
                <li class="current"><a href="index.php">Home</a></li>
                <li><a href="viewusers.php">Users</a></li>
                <li><a href="about.php">About</a></li>
            </ul>
        </nav>
    </div>
</header>
    <div class="container">
        <h2> Create User </h2>
        <form method="POST" action="<?php $_SERVER['PHP_SELF'];?>">
            <div class="form-group">
                <label>Name </label>
                <input type="text" name="name" class="form-control" required>
            </div>
            <div class="form-group">
                <label> Email </label>
                <input type="text" name="email" class="form-control" required>
            </div>
            <div class="form-group">
                <label> Balance </label>
                <input type="text" name="balance" class="form-control" required>
            </div>
            <div class="form-group">
              <input class="form-button" type="submit" value="CREATE" name="submit"></input>
              <input class="form-button" type="reset" value="RESET" name="reset"></input>

            </div>

        </form>

    </div>
</body>
</html>