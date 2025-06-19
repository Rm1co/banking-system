<?php
// indexed or numeric arrays / the content is arranged in a numerical order 
$color = ["black" , "green","yellow"];

print_r($color);

?>
<pre>
    <?php print_r ($color);?>
</pre>
<br>

<?php
$user = array ("Alex ","Peter","Ann");
?>
<pre>
    <?php print_r($user);?>
</pre>
<?php
// associative arrays
$user_data = [

    "fullname" => "alex okama",
    "email" => "aokama@yahoo.com",
    "phone" => "+254712345678"
];
print $user_data["email"];
?>
<pre>
    <?php print_r ($user_data);?>
</pre>
<br>
<?php print $user_data["phone"]; ?>

<br>

<?php

$user_details =[
    "Director" => array(
        "fullname" => "alex okama",
        "email" => "aokama@yahoo.com",
        "phone" => [
                "home" => "34567890",
                "work" => "56789089",
                "mobile" => "4567890",
        ] 
        ),
    "Secretary" => array(
        "fullname" => "Clara okemi",
        "email" => "COkemi@yahoo.com",
        "phone" => [
                "home" => "9876543",
                "work" => "76365539",
                "mobile" => "433567768",
        ]
        ),

];
?>
<pre>
    <?php print_r($user_details); ?>
</pre>