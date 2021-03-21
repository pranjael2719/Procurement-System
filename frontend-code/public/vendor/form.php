<?php
$id=  $_GET['rfp_id'];
session_start();
    require '../../../backend-code/config.php';
    $sql = "SELECT * FROM company_rfp WHERE Rfp_ID = '$id'";
    $result =mysqli_query($db,$sql);
    $row = mysqli_fetch_assoc($result);
?>
<html>
    <head>
        <title> RFP Form</title>
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="form.css">
    </head>
    <body>
        <div class="form-design">
            <h1> Proposal Form </h1>
                <form action="../../../backend-code/form_submit.php?rfp_id=<?php echo $id;?>" method="post">
                    <div class="sec"><span>1</span>Product Details</div>
                    <div class="box">
                        <p>Name : <?php echo $row['product_name']; ?></p>
                        <p>Description : <?php echo $row['Description'];?></p>
                        <p>Deadline : <?php echo $row['Deadline'];?></p>
                    </div>
                    <div class="sec"><span>2</span>Fill up</div>
                    <div class="box">
                    <label for="field1"><span>Cost per unit <span class="required">*</span></span><input type="number" class="input-field" name="field1" value="" /></label>
                    <label for="field2"><span>Agreement start date <span class="required">*</span></span><input type="date" class="input-field" name="field2" value="" /></label>
                    <label for="field3"><span>Agreement end date </span><input type="date" class="input-field" name="field3" value="" /></label>
                    <label for="field4"><span>Delivery Mode <span class="required">*</span></span><select name="field4" class="select-field">
                        <option value="Vendor">Vendor</option>
                        <option value="Manufacturer">Manufacturer</option>
                        </select></label>
                    </div>
                    
                    <input type="submit" value="Submit" />
                    <button type="submit" value="goback">Go Back</button>
                </form>
            </div>
        </div>   
    </body>
</html>