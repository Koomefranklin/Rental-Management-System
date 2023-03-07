<!DOCTYPE html>
<html>
    <head>
        <title>Register</title>
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
            }
            a {
                color: white;
                text-decoration: none;
            }
        </style> 
        <script type="text/javascript" src="include/functions.js">
        </script>
    </head>
    <body>
        <div class="nav-bar">
            Rental House Management
        </div>
        <div class="overlay">
            <div class="signup-form">
                <div class="form-header">
                    RMS Sign Up
                </div>
                <form action="#" method="post">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" required autofocus>
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" required>
                    <label for="password">Password</label>
                    <input type = "password" name = "password" id="password" required>
                    <span id="password-pattern" class="password-pattern" hidden="hidden">
                        <row><input type="checkbox" id="upper" disabled readonly>
                            <label for="upper">Contains at least 1 upper-case character</label></row>
                        <row><input type="checkbox" id="lower" disabled readonly>
                            <label for="lower">Contains at least 1 lower-case character</label></row>
                        <row><input type="checkbox" id="special-character" disabled readonly>
                            <label for="special-character" >Contains a special character</label></row>
                        <row><input type="checkbox" id="number" disabled readonly>
                            <label for="number">Contains a number</label></row>
                        <row><input type="checkbox" id="length" disabled readonly>
                            <label for="length">At-least 8 characters long</label></row>
                    </span>
                    <label for="confirm-password">Confirm Password</label>
                    <input type="password" name="confirm-password" id="confirm-password" required disabled>
                    <span id="matching-password" class="matching-password" hidden="hidden">
                        Passwords don't match
                    </span>
                    <button type = "submit" id="register" disabled>Register</button>
                    <script type="text/javascript">check_passwords()</script>
                </form>
                <div class="lower-form">
                    <a href="login.php">Sign In</a>
                </div>
                <div>
                    <?php 
                    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                        require 'include/signup.inc';
                    }?>
                </div>
            </div>
        </div>
    </body>
</html>