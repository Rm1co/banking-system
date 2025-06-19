<?php

date_default_timezone_set("Africa/Nairobi");

echo "This is my first php code"; //Displaying a sentence or a string

print "<br>"; //Using HTML's <br> to break a line

print "Today is <span style='color: #ff4856; text-transform: uppercase;'>Thursday</span>";

print "<br>"; //Using HTML's <br> to break a line

print 1999; //This is an integer or a digit

print "<br>"; //Using HTML's <br> to break a line

print "5475"; //This is a string

print "<br>"; //Using HTML's <br> to break a line

print date('l'); //Diplaying the current day of the week

print "<br>"; //Using HTML's <br> to break a line

print date('l, F jS Y', strtotime('+5 months'));

print "<br>"; //Using HTML's <br> to break a line

print "Today is " . date('l, F jS Y H:i:s');

// Creating (Declaring) a variable

$fname = "Alex Okama"; // Declaration of a vaiable or a string or a group of words.

$yob = 2006; //Declaration of digit or an integer

print "<br>"; //Using HTML's <br> to break a line

print $fname;

print "<br>"; //Using HTML's <br> to break a line

$user_dob = "$yob-08-16";

echo $fname . " was born in " . $yob;

print "<br>"; //Using HTML's <br> to break a line

echo $fname . " was actually born on " . date('l, F jS Y', strtotime($user_dob));

print "<br>"; //Using HTML's <br> to break a line

$current_year = date('Y');

echo $current_year;

print "<br>"; //Using HTML's <br> to break a line

$age = $current_year - $yob; //Using subtraction to find the age.

print "45 + 96";

print "<br>"; //Using HTML's <br> to break a line

print 45 + 69;

print "<br>"; //Using HTML's <br> to break a line

$birthday = new DateTime($user_dob);
$today = new DateTime('today');

$interval = $birthday->diff($today);

echo '<pre>';
print_r($interval);
echo '</pre>';

print "<br>"; //Using HTML's <br> to break a line

print $fname . " is, actually, " . $interval->y . " years " . $interval->m . " months, and " . $interval->d . " days old.";

//The if... else ... statement

print "<br>"; //Using HTML's <br> to break a line

$adult_age = 18;
if($interval->y > $adult_age){
    print $fname . " is an adult"; //event in block to be executed if the condition is true
}else{
    print $fname . " is NOT an adult"; //event in block to be executed if the condition is false
}
print "<br>"; //Using HTML's <br> to break a line
//Variable Characteristics

$last_name = "Okama";

echo "My last name is $last_name";

print "<br>"; //Using HTML's <br> to break a line

echo 'My last name is ' . $last_name;

print "<br>"; //Using HTML's <br> to break a line

echo "Today is " . date('l');

print "<br>"; //Using HTML's <br> to break a line

$call['lname'] = "Okama";
print $call['lname'];

print "<br>"; //Using HTML's <br> to break a line
define('LNAME', 'Okama');
echo LNAME;

?>
<br>
<br>


