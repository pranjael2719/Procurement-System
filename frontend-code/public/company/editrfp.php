<html>
    <head>
        <title> Edit RSP</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="editrfp.css">

    </head>
    <body>
        <?php 
            require_once "../../../backend-code/config.php";
            $id = $_GET['rfp_id'];
            $sql = "SELECT * FROM company_rfp WHERE Rfp_ID='$id'";
            $result=mysqli_query($db,$sql);
            $row=mysqli_fetch_assoc($result);
        ?>
        <div class="form-design">
            <h1>Editing Product Information</h1>
            <form action="../../../backend-code/setDeadline.php?rfp_id=<?php echo $id; ?>" method="POST">
                <div class="box">
                <label for="field2"><span>Product Name </span><input type="text" class="input-field" name="field2" placeholder="<?php echo $row['product_name'];?>" disabled/></label>
                <label for="field3"><span>Description </span><textarea name="field3" class="textarea-field" placeholder="<?php echo $row['Description'];?>" disabled></textarea></label>
                <label for="field4"><span>Date of Expiry </span><input type="text" disabled class="input-field" name="field4" placeholder="<?php echo $row['end_date'];?>" disabled/></label>  
                <label for="field1"><span>Date of Deadline </span><input type="date" class="input-field" name="field1" value="<?php echo $row['Deadline'];?>" /></label>              
                </div>
                <input type="submit" value="Update" class="btn-submit"/>
                <a href="publishedrfp.php" class="btn btn-outline-primary" style="margin-top: 10px; width: 100%; height:35px;"> 
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-return-left" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M14.5 1.5a.5.5 0 0 1 .5.5v4.8a2.5 2.5 0 0 1-2.5 2.5H2.707l3.347 3.346a.5.5 0 0 1-.708.708l-4.2-4.2a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 8.3H12.5A1.5 1.5 0 0 0 14 6.8V2a.5.5 0 0 1 .5-.5z"/>
                      </svg>
                      Go Back </a>
            </form>
        </div>   
    </body>
</html>