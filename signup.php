
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Sign Up</title>
        <script src="signup_validate.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
              integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">    
    </head>

    <body>
        <div style="margin : 100px auto; width: 50%;">
            <h1 style="text-align: center;">Welcome to Student Registration Form</h1>
            <h4 style="text-align: center; margin-top: 20px;">This is the Home page where you can signup/login.</h4>

            <?php
                include("server.php");

                if(isset($_POST['submit'])) {
                    $name = $_POST['name'];
                    $email = $_POST['email'];
                    $user = $_POST['username'];
                    $pass = $_POST['password1'];

                    if($user == "" || $pass == "" || $name == "" || $email == "") {
                        echo "All fields should be filled. Either one or many fields are empty.";
                        echo "<br/>";
                        echo "<a href='index.php'>Go back</a>";
                    } else {
                        mysqli_query($db, "INSERT INTO register(name, email, username, password1) 
                                           VALUES ('$name', '$email', '$user', '$pass')")
                            or die("Could not execute the insert query.");
                        
                            header('Location: index.php');

                        // echo "Registration successfully";
                        // echo "<br/>";
                        // echo "<a href='login.php'>Login</a>";
                    }
                } else {
            ?>

            <div style=" width: 50%; margin: 50px auto;">    
                <form name="form1" class="row g-3 needs-validation" novalidate method="post">
                    <div class="col-md-10">
                        <label for="validationCustom01" class="form-label" >Name</label>
                        <input type="text" class="form-control" id="validationCustom01" name="name" required>
                        <div class="valid-feedback">
                        Looks good!
                        </div>
                    </div>
                    <div class="mb-2">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-md-10">
                            <input type="email" name="email" class="form-control" id="inputEmail4">
                        </div>
                    </div>
                    <div class="mb-2 col-md-10">
                        <label for="validationCustomUsername" class="form-label">Username</label>
                        <div class="input-group has-validation">
                        <span class="input-group-text" id="inputGroupPrepend">@</span>
                        <input type="text" name="username" class="form-control" id="validationCustomUsername" 
                               aria-describedby="inputGroupPrepend" required>
                        <div class="invalid-feedback">
                            Please choose a username.
                        </div>
                        </div>
                    </div>
                    <div class="mb-4">
                        <label for="inputPassword" class="form-label">Password</label>
                        <div class="col-sm-10">
                            <input type="password" name="password1" class="form-control" id="inputPassword">
                        </div>
                    </div>
                    <div class="col-12">
                        <button onclick="return validateForm()" style="margin-right: 20px" class="btn btn-primary"
                                type="submit" name="submit" value="Submit">SignUp</button>
                        <a class="btn btn-primary" href="index.php">Already signed up?</a>
                    </div>
                </form>
            </div>

            <?php   
            }
            ?>
        </div>
    </body>
</html>