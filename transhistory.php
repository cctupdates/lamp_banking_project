<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="./style.css">
    <title>Transaction History</title>
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
        <h2>Transaction history</h2>
        <br>
       <div class="table-responsive-sm">
    <table class="table table-hover table-striped table-condensed table-bordered">
        <thead>
            <tr>
                <th class="text-center">S.No.</th>
                <th class="text-center">Sender</th>
                <th class="text-center">Receiver</th>
                <th class="text-center">Amount</th>
                <th class="text-center">Date & Time</th>
            </tr>
        </thead>

        <tbody>
            <?php
            require('config/config.php');
            require('config/db.php');

            $sql = "SELECT * from transaction";
            $query = mysqli_query($conn, $sql);

            while($rows = mysqli_fetch_assoc($query)){
            ?>
            
            <tr>
                <td><?php echo $rows['sno']; ?></td>
                <td><?php echo $rows['sender']; ?></td>
                <td><?php echo $rows['receiver']; ?></td>
                <td><?php echo $rows['balance']; ?></td>
                <td><?php echo $rows['datetime']; ?></td>

            <?php
            }
            ?>




            

        </tbody>
    </table>

    



    </div>
</body>
</html>