<?php include_once("templates/heading.php");
require_once("includes/db2_connect.php");
?>

<body style="background-color:  rgb(230, 210, 220);">
  <?php include_once("templates/nav.php"); ?>
  
  <h1 style="background-color: azure;">Contact Us</h1>
  <div class="container">
    <div class="image">
      <img src="https://www.searchenginejournal.com/wp-content/uploads/2022/08/contact-us-2-62fa2cc2edbaf-sej.png" width="50%" ;>
    </div>
    <style>
      img {
        float: right;
        border: 1px dotted black;
        margin: 0px 0px 15px 20px;
      }
    </style>
    <?php
    if (isset($_POST["send_message"])) {
      $fn = mysqli_real_escape_string($conn, $_POST["fullname"]);
      $email = mysqli_real_escape_string($conn, $_POST["email"]);
      $subject = mysqli_real_escape_string($conn, $_POST["subject"]);
      $message = mysqli_real_escape_string($conn, $_POST["message"]);
      $insert_message = "INSERT INTO hire(fullname, email, subject, message) VALUES ('$fn', '$email', '$subject', '$message')";

      if ($conn->query($insert_message) === TRUE) {
        header("Location: view_messages.php");
        exit();
      } else {
        echo "Error: " . $insert_message . "<br>" . $conn->error;
      }
    }
    ?>


    <div class="row">
      <div class="content">
        <div class="side-bar">
          <h1>Talk to Us</h1>
          <form action="<?php print htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" class="contacts_form">
            <label for="fn">Fullname:</label><br>
            <input type="text" id="fn" placeholder="fullname" name="fullname" required><br><br>

            <label for="em">Email Address:</label><br>
            <input type="email" id="em" placeholder="Email Address" name="email" required><br><br>

            <label for="sb">Subject:</label><br>
            <select name="subject" id="sb" required>
              <option value="">--Select Subject--</option>
              <option value="Car hiring">Car hiring</option>
              <option value="car purchase">car purchase</option>
              <option value="Bamma tours">bamma tours</option>
            </select><br><br>

            <label for="sb">Message:</label><br>
            <textarea name="message" id="" cols="30" rows="5" required></textarea><br><br>

            <input type="submit" name="send_message" value="Send Message">
          </form>
        </div>
        <h1 style="background-color: azure;">social media link</h1>
      </div>
      <a href="https://twitter.com/hashtag/twitter">Twitter</a><br>
      <a href="https://twitter.com/hashtag/twitter" target="_blank "><img src="img/twitter.png " alt="" height="40" width="40"></a><br><br>

      <a href="https://www.instagram.com/">Instagram</a><br>
      <a href="https://www.instagram.com/" target="_blank"><img src="img/gram.jpeg " alt="" height="40" width="40"></a><br>

      <a href="https://www.google.com/gmail/about/">Gmail</a><br>
      <a href="https://www.google.com/gmail/about/" target="_blank"><img src="img/gmail.png " alt="" height="40" width="40"></a>
      <br>

      <a href="https://www.facebook.com/">Facebook</a><br>
      <a href="https://www.facebook.com/" target="_blank "><img src="img/facebook.png " alt="" height="30" width="30"></a><br>

      <a href="https://www.youtube.com/">Youtube</a><br>
      <a href="https://www.youtube.com/" target="_blank"> <img src="img/youtube.png
" alt="" height="90" width="40"></a> <br><br><br><br><br><br>


      <pr style="text-align: left;">
        We are always available. <br>
        Incase of any emergency or any concern <br>
        please contact us directly using our official number which we will <br>
        provide below or you can visit our
        nearest branches across the country.
      </pr>
      <ol>
        <td>
          call:+254757888000 <br>
          call:+2547809007000
        </td>
      </ol>

</body>
<?php include_once("templates/marquee.php"); ?>
<?php include_once("templates/footer.php"); ?>