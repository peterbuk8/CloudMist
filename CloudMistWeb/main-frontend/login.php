<?php
    require_once '../backend/connect.php';
    
    if (session_status() != PHP_SESSION_NONE) {
        session_destroy();
    }
?>


<!DOCTYPE html>
<html>
<head>
    <title>Cloud Mist - Please login</title>
    <link rel="stylesheet" href="../css/stylesheet.css">
    <link href='http://fonts.googleapis.com/css?family=PT+Sans' 
          rel='stylesheet' type='text/css'>
    <script>
        function register_guser() {
            location.href = "register_guser.php";
        }
        function reviewer() {
            location.href= "../reviewer-frontend/reviewer_login.php";
        }
        function company() {
            location.href= "../company-frontend/company_login.php";
        }
    </script>
</head>
     
<body>
    <header>
        <h1 class="logo">Cloud Mist</h1>
    </header>
    
    <div class="mid-content">
        <h1>Log in below.</h1>
        <form method="post" action="home.php">
            <table class="form-field">
                <tr>
                    <td>Username:</td>
                    <td><input class="form-field" type="text" name="g_user"></td>
                </tr>
                <tr>
                    <td>Password:</td>
                    <td><input class="form-field" type="password" name="password"></td>
                </tr>
                <tr>
                    <td></td>
                    <td colspan="2"><input class="form-field" type="submit" value="  Submit  "></td>
                    <td></td>
                    <td></td>
                    <td><input type="button" value="Register" onclick="register_guser()"></td>
                </tr>
            </table>
        </form>
    </div>
</body>

</html>