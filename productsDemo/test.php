<html>
    <head>
        <title>My Product List</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <link rel="stylesheet" href="bootstrap.min.css">
        <script src="jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="bootstrap.min.js"></script>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col">
                    <h2 class="bg-info">JSON Product</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-10">
                    <h3 class="text-info">Welcome to the shopping cart :)</h3>
                    <button class="btn btn-warning btn-sm" data-toggle="collapse" data-target="#demo">Click</button>
                    <div class="collapse" id="demo">
                        You can manage your products here!
                    </div>
                </div>
                <!-- <div class="col-sm-2">
                    <button type="button" class="btn btn-outline-info" data-toggle="modal" data-target="#myAddModal">Add Product</button>
                </div> -->
                
                <div class="dropdown">
                    <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">Dropdown button</button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#myAddModal">Add a Product</a>
                        <a class="dropdown-item" href="#">Link 2</a>
                        <a class="dropdown-item" href="#">Link 3</a>
                    </div>
                </div>
            </div>
            <div class="row" style="margin-top:20px">
                <div class="col">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                            <th>Product ID</th>
                            <th>Product Name</th>
                            <th>Category</th>
                            <th>Description</th>
                            <th>Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                            <td><a href="#" data-toggle="modal" data-target="#editOrDelteModal">1</a></td>
                            <td>Coco Cola</td>
                            <td>Beverage</td>
                            <td>Drink it!</td>
                            <td>10</td>
                            </tr>
                            <tr>
                            <td><a href="#" data-toggle="modal" data-target="#editOrDelteModal">2</a></td>
                            <td>Fanta</td>
                            <td>Beverage</td>
                            <td>Drink it!</td>
                            <td>9</td>
                            </tr>
                        </tbody>
                    </table>
                    <ul class="pagination pagination-sm" style="margin-left:920px;">
                        <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item active"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">Next</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <!--Modal addProduct-->
        <div class="modal" id="myAddModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!--modal header-->
                    <div class="modal-header">
                        <h4>Add a Product</h4>
                        <button type="dismiss" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        Product ID: <input type="text" class="form-control" style="margin-bottom:10px;">
                        Name: <input type="text" class="form-control" style="margin-bottom:10px;">
                        Category: <input type="text" class="form-control" style="margin-bottom:10px;">
                        Description: <textarea type="text" class="form-control" style="margin-bottom:10px;"></textarea>
                        Price: <input type="text" class="form-control">
                    </div>
                    <div class="modal-footer">
                        <div class="row" style="margin-right:4px;">
                            <div>
                                <button type="button" class="btn btn-success">Add</button>
                                <button type="button" class="btn btn-danger">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--Modal EditOrDelteModal-->
        <div class="modal" id="editOrDelteModal">
            <div class="modal-dialog">
                <div class="modal-content">
                <!--modal header-->
                    <div class="modal-header">
                        <h4>Edit or Delete this Product</h4>
                        <button type="dismiss" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        Product ID: <input type="text" class="form-control" style="margin-bottom:10px;">
                        Name: <input type="text" class="form-control" style="margin-bottom:10px;">
                        Category: <input type="text" class="form-control" style="margin-bottom:10px;">
                        Description: <textarea type="text" class="form-control" style="margin-bottom:10px;"></textarea>
                        Price: <input type="text" class="form-control">
                    </div>
                    <div class="modal-footer">
                        <div class="row" style="margin-right:4px;">
                            <div>
                                <button type="button" class="btn btn-success">Update</button>
                                <button type="button" class="btn btn-danger">Delete</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



    </body>
</html>