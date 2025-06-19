<?php
require_once("includes/db2_connect.php");
include_once("templates/heading.php");
include_once("templates/nav.php");

if (isset($_GET["DelId"])) {
    $DelId = mysqli_real_escape_string($conn, $_GET["DelId"]);

    // sql to delete a record
    $del_mes = "DELETE FROM hire WHERE userid='$DelId' LIMIT 1";

    if ($conn->query($del_mes) === TRUE) {
        header("Location: view_messages.php");
        exit();
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}
?>

<body style="background-color:  rgb(230, 210, 220);">
    <div class="row">
        <div class="content">
            <h1>Messages</h1>
            <style>
                table {
                    border: 1px solid #2e2929;
                    border-collapse: collapse;
                    width: 70%;
                }
            </style>
            <table border="1" ; style="background-color: rgb(209, 144, 144);">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>fullname</th>
                        <th>email</th>
                        <th>Subject</th>
                        <th>Time</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $select_msg = "SELECT * FROM `hire` ORDER BY datecreated DESC";
                    $sel_msg_res = $conn->query($select_msg);
                    $en = 0;
                    if ($sel_msg_res->num_rows > 0) {
                        // output data of each row
                        while ($sel_msg_row = $sel_msg_res->fetch_assoc()) {
                            $en++;
                    ?>
                            <tr>
                                <td><?php print $en; ?>.</td>
                                <td><?php print $sel_msg_row["fullname"]; ?></td>
                                <td><?php print $sel_msg_row["email"]; ?></td>
                                <td><?php print "<strong>" . $sel_msg_row["subject"] . '</strong> - ' . substr($sel_msg_row["message"], 0, 20) . '...'; ?></td>
                                <td><?php print date("d-M-Y H:i", strtotime($sel_msg_row["datecreated"])); ?></td>
                                <td>[ <a href="edit_msg.php?userid=<?php print $sel_msg_row["userid"]; ?>">Edit</a> ] [ <a href="?DelId=<?php print $sel_msg_row["userid"]; ?>" onclick="return confirm('This ation will delete this message permanently.\nAre you sure you want ot proceed?');">Del</a> ]</td>
                            </tr>
                    <?php
                        }
                    } else {
                        echo "0 results";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body