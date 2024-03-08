<?php
require 'lib/user.php';
    $user = new user();
    $user->userLogin();
?>

<?php
require 'layout/header.php';
?>
<link rel="stylesheet" type="text/css" href="../css/signin.css">
    <title>Sign in</title>
</head>


<body>
<div class="container">
    <form action="" method="post" name="Login_Form" class="form-signin">
        <h2 class="form-signin-heading">Please sign in</h2>

        <label for="username" >Username</label>
        <input name="username" type="username" id="username" class="form-control" placeholder="Username" required autofocus>

        <label for="password">Password</label>
        <input name="password" type="password" id="password" class="form-control" placeholder="Password" required>

        <div class="checkbox">
            <label>
                <input type="checkbox" value="remember-me"> Remember me
            </label>
        </div>
        <button name="Submit" value="Login" class="button" type="submit">Sign in</button>

    </form>
</div>
<?php
require 'layout/footer.php';
?>
