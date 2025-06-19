<h1>Loops</h1>
<h2>while loops</h2>
<?php
// while loops 
$in = 0;
while($in < 10){

    print $in . "<br>";
    $in++;
}
?>
<h3>do-while loops</h3>
<?php
//do while loops
$s = 5;

do{
    print $s . "<br>";
    $s++;
}while($s < 15);

?>
<h4>for loops</h4>

<?php
for ($f=45; $f<55; $f++ ){
    print $f . "<br>";
}
?>

<h4>for-each</h4>

<?php
$months = ["january","february","march","april","may","june","july","august","september","october","november","december"];

foreach($months AS $months){
    print $months . "<br>";
}
?>

<form action="">
    <select name="" id="">
        <option value="">--Months--</option>
        <?php
        foreach($months AS $months){
            print "<option value=''></option>";
        }
        ?>
    </select>

    <select name="" id="">
        <option value="">--Year--</option>
        <?php
        $y = 2014;
        while($y < 2030){
            print"<option value =''>$y</option>";
            $y++;
        }
        ?>
    </select>
</form>