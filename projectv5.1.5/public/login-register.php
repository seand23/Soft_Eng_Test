<?php
require_once '../lib/user/admin.php';
require_once '../lib/user/user.php';

$user = new user();
$user->userFormHandler();

$admin = new admin();
$admin->handleLogin();
?>

<?php require 'layout/header.php'; ?>
<link rel="stylesheet" href="./style/login.css">
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
            <h2>Signup</h2>
            <form action="" method="post" name="Register_Form" class="form-signup">
                <input type="hidden" name="signup" value="true">
                <label for="firstname">First Name</label>
                <input name="firstname" type="firstname" id="firstname" class="form-control" placeholder="John" required autofocus>

                <label for="lastname">Last Name</label>
                <input name="lastname" type="lastname" id="lastname" class="form-control" placeholder="Doe" required autofocus>

                <label for="username">Username</label>
                <input name="username" type="username" id="username" class="form-control" placeholder="Username" required autofocus>

                <label for="email">Email</label>
                <input name="email" type="email" id="email" class="form-control" placeholder="john@gmail.com" required>

                <label for="password">Password</label>
                <input name="password" type="password" id="password" class="form-control" placeholder="Password" required>

                <div class="checkbox">
                    <label for="address">Address</label>
                    <input name="address" type="address" id="address" class="form-control" placeholder="123 Main St" required>

                    <div class="checkbox">
                        <label for="phone">Number</label>
                        <input name="phone" type="phone" id="phone" class="form-control" placeholder="123-456-789" required>
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