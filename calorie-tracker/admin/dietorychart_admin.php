<?php require '../includes/admin_header.php' ?>
    <main>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="btn-sucess">Registered user's details in Admin side</h2> <br>
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search">
                    <div class="input-group-btn">
                        <button class="btn btn-default" type="submit">
                            <i class="fa fa-search"></i>
                        </button>
                    </div>
                </div><br/>

                <div class="table-responsive">
                    <table id="mytable" class="table table-bordered table-striped table-hover tbl">
                        <thead>
                        <th>Id</th>
                        <th>User Name</th>
                        <th>Breakfast</th>
                        <th>Lunch</th>
                        <th>Dinner</th>
                        <th>Extra meal</th>
                       <th>consumed calorie</th>
                        </thead>

                        <tr>
                            <td>1</td>
                            <td><a href="#">Krina Patel</a></td>
                            <td>sandwiche</td>
                            <td>fruite salad</td>
                            <td>Rice-Dal</td>
                            <td>chips,coldrinks</td>
                            <td>1,000</td>

                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
        </main>
<?php require '../includes/footer.php' ?>