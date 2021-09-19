<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="./style.css">
    <title>View Users</title>
</head>
<body>
<header>
    <div class="container">
        <div id="branding">
            <h1>Banking System</h1>
        </div>
        <nav>
            <ul>
                <li ><a href="index.php">Home</a></li>
                <li class="current"><a href="viewusers.php">Users</a></li>
                <li><a href="about.php">About</a></li>
            </ul>
        </nav>
    </div>
</header>

<div class="container">
<?php
 require('config/config.php');
 require('config/db.php');
 $sql = 'SELECT * FROM user';
 $result = mysqli_query($conn, $sql);

?>
<br><br>
<div class="container">
    <h2> All Users </h2>
    <div class="row">
        <table class="table table-hover table-sm table-striped table-condensed table-bordered">
        <thead>
            <tr>
            <th scope="col" class="text-center py-2">Id</th>
            <th scope="col" class="text-center py-2">Name</th>
            <th scope="col" class="text-center py-2">E-Mail</th>
            <th scope="col" class="text-center py-2">Balance</th>
            
            </tr>
        </thead>


       

    </div>
    <tbody>

    <?php
         while($rows=mysqli_fetch_assoc($result)){

    ?>
        <tr>
            <td><?php echo $rows['id'] ?></td>
            <td><?php echo $rows['Name'] ?></td>
            <td><?php echo $rows['Email'] ?></td>
            <td><?php echo $rows['Balance'] ?></td>
            

        </tr>

    <?php
         }
    ?>
    </tbody>
     </table>

</div>
</body>
</html>