

<html>
  <head>
    <title>
      Yet to Publish
    </title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="card.css">
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
          <li class="nav-item active disabled">
            <a class="nav-link" href="yetToPublish.html"> Yet to Publish <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="publishedrfp.html"> Published RFP </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="acceptedrfp.html"> Accepted RFP </a>
        </li>
  
        </ul>
  
        <a href="logout.html" class="btn btn-outline-danger sign-out"> Sign out </a>
  
      </div>
    </nav>

    <div class="container">
    <?php
      require_once "../../../backend-code/config.php";
      session_start();
      $currentUser = $_SESSION['login_user'];
      $sql = "SELECT ID FROM company WHERE Username ='$currentUser'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_assoc($result);
      //extracted company id 
      $companyid = $row['ID'];

      $sql1 = "SELECT * FROM company_rfp WHERE Company_ID='$companyid' and DATEDIFF(end_date,NOW())<=15";
      $result1 = mysqli_query($db,$sql1);
      if(mysqli_num_rows($result1)>0){
          while($row1=mysqli_fetch_assoc($result1)){
              if ($row1['Deadline']=='')
              {
    ?>
      <!--card starts here-->
        <div class="card">
            <div class="face face1">
                <div class="content">
                    <div class="icon">
                      <div class="desc">
                        <?php echo $row1['product_name']; ?> 
                      </div>
                      <div class="date"><p>Expiry: <br><?php echo $row1['end_date']; ?> </p></div>
                    </div>
                </div>
            </div>
            <div class="face face2">
                <div class="content">
                    <form action="../../../backend-code/setDeadline.php?rfp_id=<?php echo $row1['Rfp_ID'];?>" method="POST">
                      <label for="field1"> Deadline: <input type="date" name="field1" class="date-field" required></label>
                      <label for="field2"> Description: <textarea name="field2" class="textarea-field" placeholder= "<?php echo $row1['Description']; ?> "required disabled></textarea></label>
                      <button type="submit" class="btn btn-primary btn-sm">Publish</button>
                    </form>
                </div>
            </div>
        </div>
      <!-- car ends here-->
      <!-- new card goes here-->
      <?php } } }?>
    </div>

  </body>
</html>