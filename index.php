<?php
include("header.php");
include("auth.php");
?>

<body>
    <div class="form text-center">
        <h1 class="">Hello, <?php echo $_SESSION['email']; ?>!</h1>
        <p class="text-success">You are successfully logged in </p>
        <p><a href="logout.php">Logout</a></>
    </div>
</body>

</html>