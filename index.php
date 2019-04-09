<!--
    Ellen Goetsch
    April 8, 2019
    index.php
    Landing page for the Cupcake Fundraiser web form
-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cupcake Fundraiser</title>

</head>
<body>
<h1>Cupcake Fundraiser</h1>

<?php
    //functions to validate the ice cream form
    ini_set('display_errors', 1);
    error_reporting(E_ALL);

    //see if the form has been submitted
    if(!empty($_POST))
    {
        //initialize the variables
        $name = "";
        $flavors = "";

        //boolean flag to track validation display_errors
        $isValid = true;

        //validate first name
        if(!empty($_POST['name']))
        {
            $name = $_POST['name'];
        }
        else
{
print "Please enter a first name<br><br>";
$isValid = false;
}

//validate last name
if (!empty($_POST['lname']))
{
$lname = $_POST['lname'];
}
else
{
print "Please enter a last name<br><br>";
$isValid = false;
}

//validate container type
if (!empty($_POST['cones']))
{
$containers = ($_POST['cones']);
}
else
{
print "Please select a cone type or bowl<br><br>";
$isValid = false;
}

//get flavors
if (!empty($_POST['flavors']))
{
$flavors = $_POST['flavors'];
}
else
{
print "Please select at least one flavor<br><br>";
$isValid = false;
}

//get size
if(!empty($_POST['size']))
{
$sizes = $_POST['size'];
}
else
{
print "Please select a number of scoops<br><br>";
$isValid = false;
}

if($isValid) {
//required file to access/interact with database
require('/home/egoetsch/db.php');

$sizes = $_POST['size'];
$sizesString = implode(" ", $sizes);

$containers = $_POST['cones'];
$containersString = implode(", ", $_POST['cones']);

$flavors = $_POST['flavors'];
$flavorsString = implode(", ", $_POST['flavors']);

//Escape the data
$fname = mysqli_real_escape_string($cnxn, $_POST['fname']);
$lname = mysqli_real_escape_string($cnxn, $_POST['lname']);
$sizes = mysqli_real_escape_string($cnxn, $sizesString);
$containers = mysqli_real_escape_string($cnxn, $containersString);
$flavors = mysqli_real_escape_string($cnxn, $flavorsString);

//define the query
$sql = "INSERT INTO icecream (fname, lname, scoops_no, cone_type, flavors)
VALUES ('$fname', '$lname', '$sizes', '$containers', '$flavors')";
$result = @mysqli_query($cnxn, $sql);
if (!$result) {
echo "<p>Error: " . mysqli_error($cnxn) . "</p>";
}

//display summary
echo "Order submitted!<br><br>";
echo "<a href=\"http://egoetsch.greenriverdev.com/305/Assn8a/order_summary.php\" class=\"btn btn-success\" role=\"button\">View Order Summary</a>";
}
}
?>

<form id="cupcakeform" method="post" action="" >
    <fieldset>
        <label>Your Name:
            <input type="text" size="20" maxlength="20"
                   name="name" id="name" placeholder="Please input your name.">
        </label><br>
        <br>
    </fieldset>
    <fieldset>
        <legend>Cupcake Flavors:</legend>
        <label>
            <input type="checkbox" value="grasshopper"
                   name="flavors[]">&nbsp;The Grasshopper
        </label>
        <label><br>
            <input type="checkbox" value="maple"
                   name="flavors[]">&nbsp;Whiskey Maple Bacon
        </label><br>
        <label>
            <input type="checkbox" value="carrot"
                   name="flavors[]">&nbsp;Carrot Walnut
        </label><br>
        <label>
            <input type="checkbox" value="caramel"
                   name="flavors[]"> Salted Caramel Cupcake
        </label><br>
        <label>
            <input type="checkbox" value="velvet"
                   name="flavors[]">&nbsp;Red Velvet
        </label><br>
        <label>
            <input type="checkbox" value="lemon"
                   name="flavors[]">&nbsp;Lemon Drop
        </label><br>
        <label>
            <input type="checkbox" value="tiramisu"
                   name="flavors[]">&nbsp;Tiramisu
        </label><br>
    </fieldset>
    <br>
    <input type="submit" value="Order">
</form>
</body>
</html>