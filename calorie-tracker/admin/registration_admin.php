<?php require '../includes/header.php' ?>
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
                <a href="#"><button class="btn btn-primary"> Insert Record</button></a>
                <div class="table-responsive">
                    <table id="mytable" class="table table-bordered table-striped table-hover tbl">
                        <thead>
                        <th>Id</th>
                        <th>User Name</th>
                        <th>Email</th>
                        <th>Contact</th>
                        <th>Address</th>
                        <th>Password</th>
                        <th>Edit</th>
                        <th>Delete</th>
                        </thead>

                        <tr>
                            <td>1</td>
                            <td><a href="#">Krina Patel</a></td>
                            <td>Krina@gmail.com</td>
                            <td>431-654-8765</td>
                            <td>111 yong street</td>
                            <td>************</td>
                            <td><button class="btn btn-primary btn-sm"><span><i class="fa fa-edit"></i> </span></button></a></td>
                            <td><button class="btn btn-danger btn-sm" ><span> <i class="fa fa-trash"></i> </span></button></a></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
        </main>
<?php require '../includes/footer.php' ?>