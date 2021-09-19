<?php
require('config/config.php');
require('config/db.php');
if(isset($_POST['submit'])){
    $from = $_GET['id'];
    $to= $_POST['to'];
    $amount =$_POST['amount'];

    $sql = "SELECT * FROM user where id='$from'";
    $query= mysqli_query($conn,$sql);
    $sql1 = mysqli_fetch_assoc($query);

    $sql = "SELECT * from user where id=$to";
    $query = mysqli_query($conn,$sql);
    $sql2 = mysqli_fetch_assoc($query);

    if($amount<0){
        echo '<script type="text/javascript">';
        echo 'alert("Negative values")';
        echo '</script>';
    }
    else if($amount > $sql1['Balance']) 
    {
        
        echo '<script type="text/javascript">';
        echo ' alert("Bad Luck! Insufficient Balance")';  // showing an alert box.
        echo '</script>';
    }
    


    // constraint to check zero values
    else if($amount == 0){

         echo "<script type='text/javascript'>";
         echo "alert('Oops! Zero value cannot be transferred')";
         echo "</script>";
     }

     else{
        echo "<script type='text/javascript'>";
        echo "alert('Successfully done')";
        echo "</script>";

        $newbalance = $sql1['Balance'] - $amount;
        $sql = "UPDATE user SET Balance=$newbalance where id=$from";
        mysqli_query($conn,$sql);

        $newbalance = $sql2['Balance'] + $amount;
        $sql = "UPDATE user SET Balance=$newbalance where id=$to";
        mysqli_query($conn,$sql);

        $sender = $sql1['Name'];
        $receiver = $sql2['Name'];
        $sql = "INSERT INTO transaction(sender, receiver, balance) VALUES ('$sender','$receiver','$amount')";
        $query=mysqli_query($conn,$sql);

        if($query){
            echo "<script> alert('Transaction Successful');
                            window.location='index.php';
                </script>";
            
        }

        $newbalance= 0;
        $amount =0;



     }
}



?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="./style.css">
    <style type="text/css">
    	
		button{
			border:none;
			background: #d9d9d9;
		}
	    button:hover{
			background-color:#777E8B;
			transform: scale(1.1);
			color:white;
		}

    </style>
    <title>Transaction</title>
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
    <h2>Transaction</h2>
        <?php
            // require('config/config.php');
            // require('config/db.php');
            $sid = $_GET['id'];
            $sql = "SELECT * FROM user where id=$sid";
            $result = mysqli_query($conn,$sql);
            if(!$result){
                echo mysqli_error($conn);
            }
            $rows = mysqli_fetch_assoc($result);
        ?>

            <form method="post">
            <div>
            <table class="table table-striped table-condensed table-bordered">
                <tr>
                    <th class="text-center">Id</th>
                    <th class="text-center">Name</th>
                    <th class="text-center">Email</th>
                    <th class="text-center">Balance</th>
                </tr>
                <tr>
                    <td ><?php echo $rows['id'] ?></td>
                    <td ><?php echo $rows['Name'] ?></td>
                    <td><?php echo $rows['Email'] ?></td>
                    <td><?php echo $rows['Balance'] ?></td>
                </tr>
            </table>
        </div>
            <br><br>
            <label>Transfer money to: <label>
          <select name="to" class="form-control" required>
                <option value="" selected>Choose </option>
                <?php
             require('config/config.php');
                 require('config/db.php');
                $sid=$_GET['id'];
                $sql = "SELECT * FROM user where id!=$sid";
                $result=mysqli_query($conn,$sql);
                if(!$result)
                {
                    echo "Error ".$sql."<br>".mysqli_error($conn);
                }
                while($rows = mysqli_fetch_assoc($result)) {
            ?>
             <option class="table" value="<?php echo $rows['id'];?>" >
                
                <?php echo $rows['Name'] ;?> (Balance: 
                <?php echo $rows['Balance'] ;?> ) 
           
            </option>
        <?php 
            } 
        ?>


         </select> 
         <br>
        <br>
            <label>Amount:</label>
            <input type="number" class="form-control" name="amount" required>   
            <br><br>
                <div class="text-center" >
            <button class="btn mt-3" name="submit" type="submit" id="myBtn">Transfer</button>
            </div>
            </form>
      

    </div> 
    
</body>
</html>