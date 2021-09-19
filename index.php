<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="./style.css">
    <title>Banking system</title>
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
<br><br>


    <div class="container" style="text-align:center;">
        <h1> Welcome to our bank </h1>
        <p> Choose our services </p>

    </div>
    <br><br><br>


<section id="boxes">
    <div class="container">
        <div class="box" style="float:left;
width:30%;
text-align:center;
padding:30px;">
        <img src="https://cdn2.vectorstock.com/i/thumb-large/20/01/business-man-icon-vector-27432001.jpg" 
        style=" position: relative;
    display: flex;
    height: 15rem;
    width: 20rem;
    margin-right:10px; !important
    ">
        </br>
        <a href="user.php"><button>Create User </button></a>

        </div>
    
        <div class="box" style="float:left;

width:30%;
text-align:center;
padding:30px;">
        <img src="./img/transaction.jpg" style=" position: relative;
    display: flex;
    height: 15rem;
    width: 20rem;
    margin-left:20px;">
        </br>
        <a href="transfermoney.php" ><button> Transfer Money </button></a>

        </div>
    
        <div class="box" style="float:left;

width:30%;
text-align:center;
padding:30px;
margin-left:40px;">
        <img src="https://cdn3.vectorstock.com/i/thumb-large/86/72/buy-and-sell-transaction-business-idea-vector-24568672.jpg"
        style=" position: relative;
    display: flex;
    height: 15rem;
    width: 20rem;">
        </br>
        <a href="transhistory.php"><button>Transaction History </button></a>

        </div>
    </div>

</section>
</body>
</html>