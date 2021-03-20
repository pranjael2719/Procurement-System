<html>
  <head>
    <title>
      RFP Status
    </title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Acme&display=swap" rel="stylesheet">
  </head>
  <body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="#"> Website </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">

        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="openrfp.php"> Open RFPs </a>
          </li>
          <li class="nav-item active disabled">
            <a class="nav-link" href="rfpstatus.php"> RFP Status </a>
          </li>
        </ul>

        <a href="../../../backend-code/signout.php" class="btn btn-outline-danger sign-out"> Sign out </a>
      </div>
    </nav>
    <div class="contain">
      <table class="table table-striped">
        <thead class="thead-dark">
          <tr>
            <th scope="col">Company ID</th>
            <th scope="col">Product Name</th>
            <th scope="col">Start Date</th>
            <th scope="col">End Date</th>
            <th scope="col">Delivery Mode</th>
            <th scope="col">Cost/unit</th>
            <th scope="col">Company's Price</th>
            <th scope="col">Negotiate Price</th>
            <th scope="col">Status</th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody>
    <?php
    require '../../../backend-code/config.php';
    session_start();
    $currentuser = $_SESSION['login_user'];
    $sql = "SELECT ID from vendor where Username ='$currentuser'";
    $result = mysqli_query($db,$sql);
    $row = mysqli_fetch_assoc($result);

    $userid = $row['ID'];

    $sql2 ="SELECT Response_ID,Rfp_ID from vendor_rfp where Vendor_ID='$userid'";
    $result2 = mysqli_query($db,$sql2);
    while($row2 = mysqli_fetch_assoc($result2)){

    $responseid = $row2['Response_ID'];
    $rfpid=$row2['Rfp_ID'];

    $sql4= "SELECT product_name,Company_ID FROM company_rfp WHERE Rfp_ID='$rfpid'";
    $result4=mysqli_query($db,$sql4);
    $row4 = mysqli_fetch_assoc($result4);

    $productname = $row4['product_name'];
    $companyid = $row4['Company_ID'];

    $sql3 = "SELECT * FROM rfp_status WHERE Response_ID='$responseid'";
    $result3  = mysqli_query($db,$sql3);

    $sql4 = "SELECT Status FROM status WHERE Response_ID='$responseid'";
    $result4  = mysqli_query($db,$sql4);
    $row4 = mysqli_fetch_assoc($result4);

    while($row3 = mysqli_fetch_assoc($result3)){

    ?>
    
          <tr>
            <th scope="row"><?php echo  $companyid ?></th>
            <td><?php echo  $productname?></td>
            <td><?php echo  $row3['Start_date']; ?></td>
            <td><?php echo  $row3['End_date']; ?></td>
            <td><?php echo  $row3['Del_mode']; ?></td>
            <td><?php echo  $row3['Cost']; ?></td>
            <td><?php echo  $row3['company_price']; ?></td>
            <td>
              <form action="../../../backend-code/changecost.php?res_id=<?php echo $responseid?>" method="POST">
                <input type="number" value="" name="cost">
                <button type="submit" class="btn btn-warning btn-sm" style="margin:  4px auto; ">Negotiate</button>
              </form>
            </td>
            <td><?php echo  $row4['Status']; ?></td>
            <td><button type="button" class="btn btn-danger btn-sm">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-square" viewBox="0 0 16 16">
              <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
              <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
            </svg></button></td>
          </tr>
        
    <?php } } ?>
    </tbody>
      </table>
    </div>
  </body>
</html>