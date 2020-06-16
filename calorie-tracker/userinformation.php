<?php
require 'includes/header.php';
require 'includes/Database.php';
require 'User.php';
$ageErr = "";
$heightErr = "";
$weightErr = "";
$gender_err = "";
if(isset($_POST['submit']))
{
    $age = $_POST['age'];
    $height = $_POST['height'];
    $weight = $_POST['weight'];
    $exercise =  $_POST['exercise'];
    $gender = $_POST['gender'];
    if($age == "")
    {
        $ageErr = "Please enter age";
    }
    if($height == "")
    {
        $heightErr = "Please enter height";
    }
    if($weight == "")
    {
        $weightErr = "Please enter weight";
    }
    if(empty($gender))
    {
        $gender_err ="Please select gender";
    }
    if($age != "" && $height != "" && $weight != "" && $gender != "") {

        $db = Database::getDatabase();
        $s = new User();
        $BMRmale = 66 + (6.3 * $weight) + (12.9 * $height) - (6.8 * $age);
        $BMRfemale = 665 + (4.3 * $weight) + (4.7 * $height) - (4.7 * $age);
        if ($exercise == "sedentary" && $gender == "male") {
            $calories = $BMRmale * 1.2;
            ?>
            <html>
                <div id="calorie_result" style="
        width:500px;
        height:100px;
        margin-left: 700px;
        margin-top: 100px;
        position:absolute;"><?php
                    echo "Your BMR Value is: " . $BMRmale . "<br/>";
                    echo "You require " . $calories . " calories per day to maintain weight";
                    ?></div>
            </html>
            <?php

        } else if ($exercise == "sedentary" && $gender == "female") {
            $calories = $BMRfemale * 1.2;
            ?>
            <html>
            <div id="calorie_result" style="
        width:500px;
        height:100px;
        margin-left: 700px;
        margin-top: 100px;
        position:absolute;"><?php
                echo "Your BMR Value is: " . $BMRfemale . "<br/>";
                echo "You require " . $calories . " calories per day to maintain weight";
                ?></div>
            </html>
            <?php
        } else if ($exercise == "moderate" && $gender == "male") {
            $calories = $BMRmale * 1.55;
            ?>
            <html>
            <div id="calorie_result" style="
        width:500px;
        height:100px;
        margin-left: 700px;
        margin-top: 100px;
        position:absolute;"><?php
                echo "Your BMR Value is: " . $BMRmale . "<br/>";
                echo "You require " . $calories . " calories per day to maintain weight";
                ?></div>
            </html>
            <?php
        } else if ($exercise == "moderate" && $gender == "female") {
            $calories = $BMRfemale * 1.55;
            ?>
            <html>
            <div id="calorie_result" style="
        width:500px;
        height:100px;
        margin-left: 700px;
        margin-top: 100px;
        position:absolute;"><?php
                echo "Your BMR Value is: " . $BMRfemale . "<br/>";
                echo "You require " . $calories . " calories per day to maintain weight";
                ?></div>
            </html>
            <?php
        } else if ($exercise == "extra" && $gender == "male") {
            $calories = $BMRmale * 1.9;
            ?>
            <html>
            <div id="calorie_result" style="
        width:500px;
        height:100px;
        margin-left: 700px;
        margin-top: 100px;
        position:absolute;"><?php
                echo "Your BMR Value is: " . $BMRfemale . "<br/>";
                echo "You require " . $calories . " calories per day to maintain weight";
                ?></div>
            </html>
            <?php
        } else if ($exercise == "extra" && $gender == "female") {
            $calories = $BMRfemale * 1.9;
            ?>
            <html>
            <div id="calorie_result" style="
        width:500px;
        height:100px;
        margin-left: 700px;
        margin-top: 100px;
        position:absolute;"><?php
                echo "Your BMR Value is: " . $BMRfemale . "<br/>";
                echo "You require " . $calories . " calories per day to maintain your weight";
                ?></div>
            </html>
            <?php
        }
        $count = $s->addUser($age, $gender, $height, $weight, $exercise, $db);
    }
}
?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>User Information Form</title>
        <!--<link rel="stylesheet"  href='..styles/userinformation.css'>-->
    </head>
    <body>
    <form id="calorie_form" method="post" action="#">
        <h3>Calorie Calculator</h3>
        <p>
            <label for="age">Age</label>
            <input type="text" id="age" name="age" placeholder="Enter Age" value="<?php
            if(isset($age))
            {
                echo $age;
            }?>">
            <label>ages 15-80</label>
            <span id="ageErr" style="color:red;"><?php echo $ageErr; ?></span>
        </p>
        <p>
            <label>Gender</label>
            <input type="radio" name="gender" value="male"
                <?php
                if(isset($_POST['gender']) && $_POST['gender']=="male")
                {
                    echo "checked";
                }
                ?>>Male
            <input type="radio" name="gender" value="female"
                <?php
                if(isset($_POST['gender']) && $_POST['gender']=="female")
                {
                    echo "checked";
                }
                ?>
            >Female
            <span id="gender_err" style="color:red"><?php echo $gender_err; ?></span>
        </p>
        <p>
            <label for="height">Height</label>
            <input type="text" id="height" name="height" placeholder="Enter Height in inches" value="<?php
            if(isset($height))
            {
                echo $height;
            }?>">
            <span id="heightErr" style="color:red;"><?php echo $heightErr; ?></span>
        </p>

        <p>
            <label for="weight">Weight</label>
            <input type="text" id="weight" name="weight" placeholder="Enter weight in Kg" value="<?php
            if(isset($weight))
            {
                echo $weight;
            }?>">
            <span id="weightErr" style="color:red;"><?php echo $weightErr; ?></span>
        </p>
        <p>
            <label>Activity</label>
            <select name="exercise">
                <option value="sedentary" <?php
                if(isset($_POST['exercise']) && $_POST['exercise']=="sedentary")
                {
                    echo 'selected="selected"';
                }
                ?>
                >Sedentary:little or no exercise</option>

                <option value="moderate" <?php
                if(isset($_POST['exercise']) && $_POST['exercise']=="moderate")
                {
                    echo 'selected="selected"';
                }
                ?>
                >Moderate:exercise 4-5 times/week</option>

                <option value="extra" <?php
                if(isset($_POST['exercise']) && $_POST['exercise']=="extra")
                {
                    echo 'selected="selected"';
                }
                ?>
                >Extra Active:exercise daily or physical job</option>
            </select>
        </p>
        <p>
            <input type="submit" value="Calculate Calorie" name="submit" id="calculate calorie">
        </p>
    </form>

    </body>
    </html>
<?php require 'includes/footer.php' ?>