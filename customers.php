<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer list</title>
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
  <br>
      <h1 class="text-dark">Our Customers</h1>
    <?php
    $con=mysqli_connect("localhost","root","","ngbank");

    $sqlget="SELECT * FROM customer ORDER BY Customer_id";
    $result=$con->query($sqlget);
  
    echo "<table>";
    echo "<tr><th>Name</th><th>Customer_id</th><th>Email</th><th>Balance</th></tr>";
    while($row=$result->fetch_assoc()){
        echo "<tr>";
        echo "<td><a href= indi_customer.php?Customer_id=\"".$row["Customer_id"]."\">".$row["Name"]."</a></td>";
        echo "<td>".$row["Customer_id"]."</td>";
        echo "<td>".$row["Email"]."</td>";
        echo "<td>".$row["Balance"]."</td>";

        echo "</tr>";
    }
    echo "</table>";
    ?>
    <div class="container">
      <div class="center">
      
       <a href="transfer.php"><button class="btn btn-dark btn-lg">Transfer money</button></a>
      </div>
    </div>

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

