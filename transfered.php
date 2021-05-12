<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transfer money</title>

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>

      <nav class="navbar navbar-expand-lg navbar-dark bg-dark " style="margin-bottom: -26px;">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">NG Banks</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent" style="margin-left:65%;" >
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="index.php">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="customers.php">View Customer</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="transfer.php">Transfer Money</a>
              </li>
              
            </ul>
            
          </div>
        </div>
      </nav>


      <?php

 $conn=mysqli_connect("localhost","root","","ngbank");

 $sqlget1="SELECT * FROM customer";
 $sqlget2="SELECT * FROM transfer";
 

 $senderquery="SELECT * FROM customer WHERE email='$_POST[from]'";
 $senderdata=mysqli_query($conn,$senderquery);
 $arrdata=mysqli_fetch_array($senderdata);
 $amount=$_POST['amount'];

 if($arrdata['Balance'] >= $amount)
 {
    $sql1 = "UPDATE transfer SET Balance=(Balance+$amount) WHERE Email='$_POST[to]'";
    $sql2 = "UPDATE transfer SET Balance=(Balance-$amount) WHERE Email='$_POST[from]'";
    $sql3 = "UPDATE customer SET Balance=(Balance+$amount) WHERE Email='$_POST[to]'";
    $sql4 = "UPDATE customer SET Balance=(Balance-$amount) WHERE Email='$_POST[from]'";
   
   $conn->query($sql2);
   $conn->query($sql3);
   $conn->query($sql4);
    if ($conn->query($sql1) === TRUE) {
       echo "<br><h1>Transaction Successfull!!</h1>";
       echo '
       <div class="w-25  m-auto">
       </div>
       </div>
       </div>
       <br>
        <div class="container">
        <div class="center">
        <a href="customers.php"><button class="btn btn-dark btn-lg">View Updated records</button></a>
        </div>
        </div>';
     } else { 
       echo "<br><br><h1>Transaction Failed<h1> " ;
       echo '<br><div class="container">
       <div class="center">
       <a href="customers.php"><button class="btn btn-dark btn-lg">View Customers</button></a>
       <br>
       <a href="transfer.php"><button class="btn btn-dark btn-lg">Transfer Money</button></a>
       </div> 
       <br><br><br>
       </div>';
    
     }
 }
 else
 {
    echo '<br><div ><h1 class="failed">Transaction failed!!</h1></div>';
    echo '<div class="container">
          <div class="center">
          <a href="customers.php" class="btn btn-dark btn-lg" role="button" data-bs-toggle="button">View Customers</a>
          <br><br><br>
          <a href="transfer.php" class="btn btn-dark btn-lg" role="button" data-bs-toggle="button">Transfer Money</a>
          </div>';
 }
 $conn->close();
 ?>

<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<footer class="footer text-center pb-0 mb-0">
      <br>
      <p class="foot-text">Made by Nikhil Gupta</p>
      <p class="foot-text m-2" style="font-size: 0.7rem;">Copyright&copy;GRIP-NG:Banks<br>
      <br>
      <br>
      
    </footer>


     <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>    
</body>
</html>