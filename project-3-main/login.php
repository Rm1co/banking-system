<?php
require_once("includes/db_connect.php");
include_once("templates/heading.php");
include_once("templates/nav.php");

$mail = $_POST["email"];
$password = $_POST["password"];


$sql = "SELECT * FROM users WHERE email='$mail' AND password='$password'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "Login successfully";
} else {
    echo "Error: Login failed" . $conn->error;
}

?>

<style>
    body {
        background-color: rgb(230, 210, 220);
    }
</style>

<body>
    <div class="header">
        <h1>Login</h1>
    </div>
    <pr>Please login </pr><br>
    <form action="<?php print htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="email">email</label><br>
        <input type="email" id="email" name="email" placeholder="email"><br><br>
        <label for="password">password</label><br>
        <input type="password" id="password" name="password" placeholder="password"><br><br>

        <input type="submit" value="login">

    </form>
</body>