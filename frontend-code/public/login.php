<!DOCTYPE html>
<html>
<head>
    <title>
        Login Page
    </title>
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
	<script>
	function check(){
    var s=0;
    // Fetching the value of userid and passsword from the form 
    
    var username = document.forms["login"]["email"].value;   //userid 
    var password = document.forms["login"]["password"].value;    //password
    var match="^[a-zA-Z0-9+_.-]+@[a-zA-Z0-9.-]+$"; //regular expression for userid
	if(!match.test(username)){
		document.getElementById('email1').style.borderColor = 'red';
		document.getElementById('inuser').innerHTML = 'Invalid Email';
		document.getElementById('inuser').style.color = 'red';
        return false;
	}
	return true;
	}
	</script>
</head>
<body>
<div class="container-fluid">
    <div class="row no-gutter">
        <div class="col-md-6 d-none d-md-flex bg-image"></div>
        <div class="col-md-6 bg-light">
            <div class="login d-flex align-items-center py-5">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-10 col-xl-7 mx-auto">
                            <div style="text-align: center;">
                                <h3>Login to Continue</h3><br>
                            </div>
                            <form action="../../backend-code/login.php" method="POST" onsubmit="return check()" name='login'>
                                <div class="form-group mb-3">
                                    <label for="email1">Email ID </label>
                                    <input type="text" class="form-control" id="email1" aria-describedby="emailHelp" style="border-radius: 40px" placeholder="Email ID" required name="email">
                                    <p id='inuser'></p>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="pass">Password</label>
                                    <input type="password" class="form-control" id="pass" style="border-radius: 40px" placeholder="Password" required name="password">
									<p id='inpass'></p>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="category">Category</label>
                                    <select id="category" name="category" class="form-control">
                                        <option value="vendor" selected>Vendor</option>
                                        <option value="company">Company</option>
                                    </select>
                                </div>
                                <div class="qq">
                                    <p>Do not have an account? <a href="signup.php"> Sign Up</a> </p>
                                </div>
                                <input type="submit" class="btn btn-primary btn-block text-uppercase mb-2 rounded-pill shadow-sm" value="Sign in">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</html>
</body>