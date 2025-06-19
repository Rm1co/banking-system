<?php 

require_once("includes/db_connect.php");
include_once("templates/heading.php");
include_once("templates/nav.php");

$fn = $_POST["fullname"];
$mail = $_POST["email"];
$password = $_POST["password"];
$con = $_POST["confirm_password"];

$sql = "INSERT INTO users (fullname , email, password, confirm_password) 
 VALUES ('$fn', '$mail', '$password', '$con')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $insert_user . "<br>" . $conn->error;
}

?>
<style>
  body {
    background-color: rgb(230, 210, 220);
  }
</style>
<div class="header">
  <h1>sign up</h1>
</div>

<body>
  <pr>
    You are required to fill in the folling
  </pr>

  <form action="<?php print htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST"><br>

    <label for="fn">fullname</label><br>
    <input type="text" id="fn" placeholder="fullname" name="fullname" required><br><br>

    <label for="email">email</label><br>
    <input type="email" id="email" placeholder="email" name="email_address" required><br><br>

    <label for="password">password</label><br>
    <input type="password" id="password" placeholder="password" name="password" required><br><br>

    <label for="password"> confirm password</label><br>
    <input type="password" id="password" placeholder="confirm password" name="confirm_password" required><br><br>
    <input type="submit" value="Sign Up" name="Sign Up">
  </form>
</body>