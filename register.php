<?php
include('header.php');
include('function.php');
?>

<body>
    <?php
    $email = $password = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = sanitizeInput($_POST["email"]);
        $password = sanitizeInput($_POST["password"]);

        if (!empty($email) && !empty($password)) {
            $_SESSION['email'] = $email;
            $_SESSION['password'] = $password;

            header("Location: index.php");
        } else {
            echo "<div class='form text-center'>
                  <h3 class='text-red'>Required fields are missing.</h3><br/>
                  <p>Click here to <a href='register.php'>register</a> again.</p>
                  </div>";
        }
    } else {
    ?>
        <div class="form text-center">
            <h1>Registration</h1>
            <form class="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

                <div class="separator">
                    <input type="text" name="email" placeholder="Email Address">
                </div>

                <div class="separator">
                    <input type="password" name="password" placeholder="Password">
                </div>

                <input type="submit" name="submit" value="Register">

                <p>Already have an account? <a href="login.php">Login here</a></p>
            </form>
        </div>

    <?php
    }
    ?>
</body>

</html>