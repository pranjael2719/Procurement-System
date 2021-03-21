<html>
  <head>
    <title>
      Accepted RFP
    </title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Acme&display=swap" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
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
                <a class="nav-link" href="yetToPublish.php"> Yet to Publish <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="publishedrfp.php"> Published RFP </a>
            </li>
            <li class="nav-item active disabled">
                <a class="nav-link" href="acceptedrfp.php"> Accepted RFP </a>
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
            <th scope="col">Product Name</th>
            <th scope="col">Vendor ID</th>
            <th scope="col">Cost/Unit</th>
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
          $sql = "SELECT * FROM company_rfp WHERE Company_ID='$companyid' AND Deadline != 'NULL'";
          $result = mysqli_query($db,$sql);
          while($row=mysqli_fetch_assoc($result)) {
            $rfp_id=$row['Rfp_ID'];
            $sql2 = "SELECT * FROM vendor_rfp WHERE Rfp_ID='$rfp_id'";
            $result2 = mysqli_query($db,$sql2);
            while($row2=mysqli_fetch_assoc($result2)) {
              $res_id=$row2['Response_ID'];
              $sql3 = "SELECT * FROM status WHERE Response_ID='$res_id'";
              $result3 = mysqli_query($db,$sql3);
              $row3=mysqli_fetch_assoc($result3);
              if($row3['Status']=="Accepted") {
                $sql4 = "SELECT * FROM rfp_status WHERE Response_ID='$res_id'";
                $result4 = mysqli_query($db,$sql4);
                $row4=mysqli_fetch_assoc($result4);
        ?>
          <tr>
            <th scope="row"><?php echo $rfp_id; ?></th>
            <td><?php echo $row['product_name']; ?></td>
            <td><?php $vendorid= $row2['Vendor_ID']; echo $vendorid; ?></td>
            <td><?php echo $row4['Cost']; ?></td>
            <td>
                <div style="text-align: center;">
                  <button type="button" class="btn btn-success btn-sm" onclick="location.href='../../../backend-code/confirm.php?rfp_id=<?php echo $rfp_id; ?>&&vendor_id=<?php echo $vendorid; ?>'" >Confirm</button>
                  <button type="button" class="btn btn-danger btn-sm" onclick="location.href='../../../backend-code/reject.php'" style="margin-left: 20px; ">Reject</button>
                </div>
            </td>
          </tr>
          <?php } } }?>
        </tbody>
      </table>
    </div>
  </body>
</html>