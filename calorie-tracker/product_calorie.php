<?php require 'includes/header.php';?>

<main>
    <h2>Please select the items to calculate total calorie...</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col">FRUITS</th>
                <th scope="col">VEGGIES</th>
                <th scope="col">BREADS</th>
                <th scope="col">LENTILS</th>
                <th scope="col">SAUCES</th>
                <th scope="col">DESERTS</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Apple(1-medium sized)</td>
                <td>Cabbage(100-gms)</td>
                <td>Whole-Wheat(2-slices)</td>
                <td>Chickpeas(100-gms)</td>
                <td>Tomato Ketchup(10-ml)</td>
                <td>Vanilla icecream(2-teaspoons)</td>
            </tr>
            <tr>
                <td>Banana(1-medium sized)</td>
                <td>Capsicum(100-gms)</td>
                <td>Brown(2-slices)</td>
                <td>Bean(100-gms)</td>
                <td>Mayonnaise(10-ml)</td>
                <td>Chocolate(2-teaspoons)</td>
            </tr>
        </tbody>
    </table>
    <div id="total_calories">
        <button type="submit" class="btn btn-primary">TOTAL CALORIES</button><span> = </span><button type="submit" class="btn btn-primary" id="total">2000</button>
    </div>
</main>

<?php require 'includes/footer.php';?>
