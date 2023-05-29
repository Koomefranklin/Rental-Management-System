<!DOCTYPE html>
<html>
    <head>
        <title>Password Reset</title>
        <style>
            .reset-form {
                max-width: 300px;
                margin: 100px;
                align-content: center;
                background: none;
            }
        </style>
    </head>
    <body>
        <div class="overlay">
            <div class="reset-form">
                <form action="#" method="post">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" required>
                    <label for="password">New Password</label>
                    <input id="password" type="password" name="password" required>
                    <label for="confirm-password">Confirm Password</label>
                    <input id="confirm-password" type="password" name="confirm-password" required>
                    <button type="submit" name="reset" id="reset">Reset</button>
                </form>
                <?php
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    require "include/reset_password.inc";
                }?>
            </div>
        </div>
    </body>
</html>