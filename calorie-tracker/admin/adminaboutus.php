<?php require '../html-css/includes/header.php' ?>
<html>
    <head>
        <title>Admin AboutUs</title>
        <link rel="stylesheet" type="text/css" href="styles/admin_aboutus.css">
    </head>
    <body>
    <h1>AboutUs Form</h1>
        <p>
            <label>Enter Content:</label>
            <input type="text" name="content" placeholder="Enter Content" id="content">
        </p>
        <p>
            <label>Select Image:</label>
            <input type="file" name="imagefile"/>
        </p>
        <p>
            <input type="submit" value="Add Content" id="add_content">
        </p>
    </body>
</html>
<?php require '../html-css/includes/footer.php' ?>
