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

<form id="cupcakeform" method="post" action="" >
    <fieldset>
        <legend>Cupcake Fundraiser</legend>
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