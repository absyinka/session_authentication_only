<?php
include('header.php');
include('function.php');
if (isset($_SESSION['email']) && isset($_SESSION['password'])) {
    header("Location: index.php");
}
?>

<body>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = sanitizeInput($_REQUEST['email']);
        $password = sanitizeInput($_REQUEST['password']);

        /**
         * Check if email and password is set in the session.
         * 
         * If both set in session, it goes further to check if the value corresponds to what user registered
         * with before authenticating user.
         */
        if (isset($_SESSION['email']) && isset($_SESSION['password'])) {
            if ($_SESSION['email'] === $email && $_SESSION['password'] === $password) {
                header("Location: index.php");
            } else {
                echo "<div class='form text-center'>
                  <h3 class='text-red'>Incorrect username/password!</h3><br/>
                  <p>Click here to <a href='login.php'>Login</a> again.</p>
                  </div>";
            }
        } elseif (empty($email) || empty($password)) {
            echo "<div class='form text-center'>
                  <h3 class='text-red '>Email/Password field cannot be empty!</h3><br/>
                  <p>Click here to <a href='login.php'>try</a> again.</p>
                  </div>";
        } else {
            echo "<div class='form text-center'>
                  <h3 class='text-red'>Account not found!</h3><br/>
                  <p>Click here to <a href='register.php'>register</a> an account</p>
                  </div>";
        }
    } else {
    ?>
        <div class="form text-center">
            <form method="post">
                <h1>Login</h1>
                <div class="separator">
                    <input type="text" name="email" placeholder="Email" autofocus="true" />
                </div>

                <div class="separator">
                    <input type="password" name="password" placeholder="Password" />
                </div>

                <input type="submit" value="Login" name="submit" />

                <p>Don't have an account? <a href="register.php">Register here</a></p>
            </form>
        </div>
    <?php
    }
    ?>
</body>

</html>