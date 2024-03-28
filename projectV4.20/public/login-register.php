<?php
require_once '../lib/user/admin.php';
require_once '../lib/user/user.php';

$user = new user(); 
$user->userFormHandler();

$admin = new admin();
$admin->handleLogin();
?>

<?php require 'layout/header.php'; ?>
<link rel="stylesheet" href="./style/signin.css">
</head>

<body>
    <div class="container">
        <input type="checkbox" id="check">
        <div class="login form">
            <h1>Login</h1>
            <form action="" method="post" name="Login_Form" class="form-signin">
            <input name="username" type="username" id="username" class="form-control" placeholder="Enter your username" required autofocus>
            <input name="password" type="password" id="password" class="form-control" placeholder="Enter your password" required> 
                <div class="form-group">
                    <label for="loginType">Login as:</label>
                    <select class="form-control" id="loginType" name="loginType">
                        <option value="user">User</option>
                        <option value="admin">Admin</option>
                    </select>
                </div>
                <button name="Submit" value="Login" class="button" type="submit">Sign in</button>
            </form>
            <div class="signup">
                <span class="signup">Don't have an account?
                    <label for="check">Signup</label>
                </span>
            </div>
        </div>
        <div class="registration form">
            <h1>Signup</h1>
            <form action="#" method="post">
                <input type="hidden" name="signup" value="true">
                <input type="text" name="firstname" placeholder="Enter your first name">
                <input type="text" name="lastname" placeholder="Enter your last name">
                <input type="text" name="username" placeholder="Choose a username">
                <input type="email" name="email" placeholder="Enter your email">
                <input type="password" name="password" placeholder="Create a password">
                <input type="text" name="address" placeholder="Enter your address">
                <input type="text" name="phone" placeholder="Enter your phone number">
                <input type="submit" class="button" value="Signup">
            </form>
            <div class="signup">
                <span class="signup">Already have an account?
                    <label for="check">Login</label>
                </span>
            </div>
        </div>
    </div>
</body>

<?php require 'layout/footer.php'; ?>
