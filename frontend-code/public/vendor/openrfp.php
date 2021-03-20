<html>
  <head>
    <title>
      Open RFPs
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
            <a class="nav-link" href="openrfp.html"> Open RFPs <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="rfpstatus.html"> RFP Status </a>
          </li>
  
        </ul>
  
        <a href="logout.html" class="btn btn-outline-danger sign-out"> Sign out </a>
  
      </div>
    </nav>
    
    <div class="container">
    <?php
    session_start();
    require '../../../backend-code/config.php';
    $sql = "SELECT * FROM company_rfp WHERE Deadline != 'NULL'";
    $result =mysqli_query($db,$sql);
    while($row=mysqli_fetch_assoc($result)){

    ?>
    
   

    
      <!--card starts here-->
        <div class="card">
            <div class="face face1">
                <div class="content">
                    <div class="icon">
                      <div class="desc">
                        <?php echo  $row['product_name']; ?>
                      </div>

                      <div class="date"><p>Deadline:<br> <?php echo $row['Deadline']; ?></p></div>
                    </div>
                </div>
            </div>
            <div class="face face2">
                <div class="content">
                <?php
                    echo "<p>" . $row['Description'] . "</p>";
                  ?>
                  <br>
                  <h3>
                        <a href="form.html" target="_blank">Fill the form</a>
                    </h3>
                </div>
            </div>
        </div>
      <!-- car ends here-->
      <!-- new card goes here-->
  
  <?php } ?>
  </div>
  </body>
</html>