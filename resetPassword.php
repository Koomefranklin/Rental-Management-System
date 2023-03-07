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
        <?php require 'include/menu.inc';?>
        <div class="overlay">
            <div class="reset-form">
                <form action="#" method="post">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" required>
                    <button type="submit" name="reset" id="reset">Reset</button>
                </form>
            </div>
        </div>
    </body>
</html>