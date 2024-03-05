<?php
require 'lib/functions.php';
    userFormHandler();
?>

<?php
require 'layout/header.php';
?>
<link rel="stylesheet" type="text/css" href="../css/signin.css">
    <title>Register</title>
</head>


<body>
<div class="container">
    <form action="" method="post" name="Register_Form" class="form-signup">
        <h2 class="form-signin-heading">Please register</h2>

        <label for="name" >Name</label>
        <input name="name" type="name" id="name" class="form-control" placeholder="John" required autofocus>

        <label for="username" >Username</label>
        <input name="username" type="username" id="username" class="form-control" placeholder="Username" required autofocus>

        <label for="email">Email</label>
        <input name="email" type="email" id="email" class="form-control" placeholder="john@gmail.com" required>

        <label for="password">Password</label>
        <input name="password" type="password" id="password" class="form-control" placeholder="Password" required>

        <div class="checkbox">
        <label for="address">Address</label>
        <input name="address" type="address" id="address" class="form-control" placeholder="123 Main St" required>

        <div class="checkbox">
        <label for="number">Number</label>
        <input name="number" type="phone" id="number" class="form-control" placeholder="123-456-789" required>

        <div class="checkbox">
            <label>
                <input type="checkbox" value="remember-me"> Remember me
            </label>
        </div>
        <button name="Submit" value="Login" class="button" type="submit">Sign up</button>

    </form>
</div>
<?php
require 'layout/footer.php';
?>
