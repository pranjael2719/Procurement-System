<html>
    <head>
        <title> RFP Form</title>
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="form.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    </head>
    <body>
        <div class="container">
            <div class="form-style-2">
                <form action="../../../backend-code/form_submit.php" method="post">
                    <label for="field1"><span>Cost per unit <span class="required">*</span></span><input type="number" class="input-field" name="field1" value="" /></label>
                    <label for="field2"><span>Agreement start date <span class="required">*</span></span><input type="date" class="input-field" name="field2" value="" /></label>
                    <label for="field3"><span>Agreement end date </span><input type="date" class="input-field" name="field3" value="" /></label>
                    <label for="field4"><span>Delivery Mode <span class="required">*</span></span><select name="field4" class="select-field">
                        <option value="Vendor">Vendor</option>
                        <option value="Manufacturer">Manufacturer</option>
                        </select></label>
                    
                    <label><span> </span><input type="submit" value="Submit" /></label>
                </form>
            </div>
        </div>   
    </body>
</html>