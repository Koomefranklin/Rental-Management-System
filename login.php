<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
        <link rel="stylesheet" href="css/base.css">
        <style>
            .overlay {
                margin-left: 0px;
                
            }
            .lower-form {
                font-size: 18px;
                display: flex;
                justify-content: flex-end;
                margin-bottom: 10px;
                margin-top: 10px;
                flex-direction: column;
            }
            a {
                color: white;
                text-decoration: none;
            }
        </style> 
    </head>
    <body>
    <div class="nav-bar">
        Rental House Management
    </div>
        <div class="overlay">
            <div class="login-form">
                <div class="form-header">
                    RMS Login
                </div>
                <form action="#" method="post">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" required autofocus>
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required>
                    <button name="login" type="submit" id="login">Login</button>
                    
                    <div class="lower-form">
                        <a href="resetPassword.php">Forgot password?</a><br>
                        Dont have an account yet?<a href="signup.php">Create account</a>
                    </div>
                </form>
                <div>
                    <?php 
                    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                        require 'include/signin.inc';
                    }?>
                </div>
            </div>
        </div>    
    </body>
</html>
