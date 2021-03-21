<html>
  <head>
    <title>
      Published RSP
    </title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Acme&display=swap" rel="stylesheet">
  </head>
  <body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="#"> AutoProc </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item ">
            <a class="nav-link" href="yetToPublish.php"> Yet To Publish <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item active disabled">
            <a class="nav-link" href="publishedrfp.php"> Published RFP </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="acceptedrfp.php"> Accepted RFP </a>
          </li>
          <li class="nav-item">
                <a class="nav-link" href="confirmedrfp.html"> Confirmed RFP </a>
            </li>
  
        </ul>

        <a href="../../../backend-code/signout.php" class="btn btn-outline-danger sign-out"> Sign out </a>
  
      </div>
    </nav>

    <div class="contain">
      <table class="table table-striped">
        <thead class="thead-dark" >
          <tr>
            <th scope="col">Product ID</th>
            <th scope="col">Product_Name</th>
            <th scope="col">Description</th>
            <th scope="col">Expiry date</th>
            <th scope="col">Deadline date</th>
            <th scope="col"></th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody>
          <?php
            require_once "../../../backend-code/config.php";
            session_start();
            $currentuser = $_SESSION['login_user'];
            $sql1 = "SELECT ID FROM company WHERE Username='$currentuser'";
            $result1 = mysqli_query($db,$sql1);
            $row1 = mysqli_fetch_assoc($result1);
            $companyid = $row1['ID'];
            $sql = "SELECT * FROM company_rfp WHERE Company_ID='$companyid' and Deadline != 'NULL'";
            $result = mysqli_query($db,$sql);
            while($row=mysqli_fetch_assoc($result)){
          ?>
          <tr>
            <th scope="row"><?php echo $row['Rfp_ID'];?></th>
            <td><?php echo $row['product_name'];?></td>
            <td><?php echo $row['Description'];?></td>
            <td><?php echo $row['end_date'];?></td>
            <td><?php echo $row['Deadline'];?></td>
            <td><a href="statusrfp.php?rfp_id=<?php echo $row['Rfp_ID'];?>" class="btn btn-info btn-sm" style="width: 100px;">Status</a></td>
            <td><a href="editrfp.php?rfp_id=<?php echo $row['Rfp_ID'];?>" class="btn btn-warning btn-sm" style="width: 100px;">Edit</a></td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </body>
</html>