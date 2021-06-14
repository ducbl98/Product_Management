<div class="col-12 col-md-12 mt-2">
    <div class="card">
        <div class="card-header">
            Product List
        </div>
        <div class="card-body">
            <div class="col-12">
                <a class="btn btn-success mb-2" href="./index.php?page=add">Add Product</a>
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>Order</th>
                        <th>Name</th>
                        <th>Type</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($products as $product): ?>
                    <tr>
                        <td><?php echo $product->id ?></td>
                        <td><?php echo $product->name ?></td>
                        <td><?php echo $product->type ?></td>
                        <td>
                            <a href="./index.php?page=delete&id=<?php echo $product->id; ?>"
                               class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</a>
                            <a href="./index.php?page=edit&id=<?php echo $product->id; ?>"
                               class="btn btn-primary btn-sm">Update</a>
                        </td>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>