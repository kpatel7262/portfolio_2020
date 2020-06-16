<?php require '../html-css/includes/header.php' ?>

<html>
    <head>
        <title>Admin User Registration Form</title>
        <link rel="stylesheet" type="text/css" href="styles/userinformation.css">
    </head>
    <body>

        <h2>User Information Form</h2>
        <p>
            <label for="age">Age</label>
            <input type="text" id="age" name="age" placeholder="Enter Age">
        </p>

        <p>
            <label for="height">Height</label>
            <input type="text" id="height" name="height" placeholder="Enter Height in inches">
        </p>

        <p>
            <label for="weight">Weight</label>
            <input type="text" id="weight" name="weight" placeholder="Enter weight">
        </p>

        <p>
            <input type="submit" value="Calculate Calorie" name="submit" id="calculate calorie">
        </p>

    </body>
</html>
<?php require '../html-css/includes/footer.php' ?>
