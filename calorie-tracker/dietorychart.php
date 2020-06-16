<?php require 'includes/header.php' ?>
<main>
<div class="row">
    <div class="col-lg-5 m-auto">
        <div class="card mt-5 bg-white">
            <h4 class="card-title mt-3 text-center">Dietory chart</h4>
            <div class="card-body">
                <form>
                    <div class="input-group-mb-3">
                        <div class="input-group-prepend">
                            <input type="text" class="form-control" placeholder="breakfast">
                        </div>
                    </div><br/>
                    <div class="input-group-mb-3">
                        <div class="input-group-prepend">
                            <input type="text" class="form-control" placeholder="Lunch">
                        </div>
                    </div><br/>
                    <div class="input-group-mb-3">
                        <div class="input-group-prepend">
                            <input type="text" class="form-control" placeholder="dinner">
                        </div>
                    </div><br/>
                    <div class="input-group-mb-3">
                        <div class="input-group-prepend">
                            <input type="text" class="form-control" placeholder="Extra meal">
                        </div>
                    </div><br/>

                    <button class="btn btn-success btn-block">Submit</button><br/>
                    <div class="input-group-mb-3">
                        <div class="input-group-prepend">
                            <label>Total Consumed  Calories</label>
                            <input type="text" class="form-control" placeholder="breakfast + lunch + dinner + extra meal">
                        </div>
                    </div><br/>
                    <div class="input-group-prepend">
                    <input type="text" class="form-control" placeholder="Need to increase calories">
                    </div>
                    <div class="input-group-prepend">
                        <input type="text" class="form-control" placeholder="Need to decrease calories">
                    </div>
                    <p class="float-left text-black text-center mt-2"><input type="checkbox">Allow alert notifications</p>
                </form>
            </div>
        </div>
    </div>
</div>
    </main>
<?php require 'includes/footer.php' ?>
