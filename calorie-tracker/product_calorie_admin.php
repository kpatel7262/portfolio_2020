<?php require 'includes/header.php';?>

<main>
    <h2>Admin is logged in...</h2>

    <form>
        <div class="form-group col-md-4">
            <label for="category">CATEGORY</label>
            <select id="category" class="form-control">
                <option selected>Fruits</option>
                <option selected>Veggies</option>
            </select>
        </div>
        <div class="form-group col-md-4">
            <label for="category">ITEM NAME</label>
            <input type="email" class="form-control" id="category"/>
        </div>
        <div class="form-group col-md-4">
            <label for="unit">UNIT</label>
            <select id="unit" class="form-control">
                <option selected>grams</option>
                <option selected>kilograms</option>
            </select>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">SUBMIT</button>
        </div>
    </form>
</main>

<?php require 'includes/footer.php';?>
