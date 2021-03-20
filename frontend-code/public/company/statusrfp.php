<html>
  <head>
    <title>
      RSP Status
    </title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Acme&display=swap" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
  <body>

    <div>
      <a href="publishedrfp.php" class="btn btn-outline-primary" style="margin: 10px 20px;"> 
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-return-left" viewBox="0 0 16 16">
        <path fill-rule="evenodd" d="M14.5 1.5a.5.5 0 0 1 .5.5v4.8a2.5 2.5 0 0 1-2.5 2.5H2.707l3.347 3.346a.5.5 0 0 1-.708.708l-4.2-4.2a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 8.3H12.5A1.5 1.5 0 0 0 14 6.8V2a.5.5 0 0 1 .5-.5z"/>
      </svg> Go back </a>
    </div>
    <?php 
    require '../../../backend-code/config.php';
    $rfp_id=$_GET['rfp_id'];
    $sql="SELECT * from vendor_rfp WHERE Rfp_ID='$rfp_id'";
    $result=mysqli_query($db,$sql);
    ?>

    <div class="contain">
      <table class="table table-striped">
        <thead class="thead-dark" >
          <tr>
            <th scope="col">Vendor ID</th>
            <th scope="col">Vendor Email</th>
            <th scope="col">Start Date</th>
            <th scope="col">End Date</th>
            <th scope="col">Delivery Mode</th>
            <th scope="col">Cost/Unit</th>
            <th scope="col">Previous Negotiated Price</th>
            <th scope="col">Negotiation</th>
          </tr>
        </thead>
        <tbody>
          <?php while($row=mysqli_fetch_assoc($result))
    { $responseid=$row['Response_ID']; 
      $vendorid=$row['Vendor_ID'];
      $sql1="SELECT * from rfp_status WHERE Response_ID='$responseid'";
      $result1=mysqli_query($db,$sql1);
      $row1=mysqli_fetch_assoc($result1);
      $sql2="SELECT * from vendor WHERE ID='$vendorid'";
      $result2=mysqli_query($db,$sql2);
      $row2=mysqli_fetch_assoc($result2);
    ?>
          <tr>
            <th scope="row"><?php echo $vendorid; ?></th>
            <td><?php echo $row2['Username']; ?></td>
            <td><?php echo $row1['Start_date']; ?></td>
            <td><?php echo $row1['End_date']; ?></td>
            <td><?php echo $row1['Del_mode']; ?></td>
            <td><?php echo $row1['Cost']; ?></td>
            <td><?php echo $row1['company_price']; ?></td>
            <td>
              <form action="../../../backend-code/changecompanyprice.php?res_id=<?php echo $responseid;?>&&rfp_id=<?php echo $rfp_id;?>" method="POST">
                <div>
                  <label for="field1"><span>New Price: <span class="required"></span></span><input type="number" class="input-field" name="field1" value="" /></label>
                </div>
                <div style="text-align: center;">
                  <button type="submit" class="btn btn-warning btn-sm" >Negotiate</button>
                </div>
              </form>
            </td>
          </tr>
          <?php } ?>
          
        </tbody>
      </table>
    </div>


  </body>
</html>