<div class="col-12 col-md-12 mt-2">
    <div class="card">
        <div class="card-header">
            Add Product
        </div>
        <div class="card-body">
            <div class="col-12">
                <form method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input type="text" class="form-control" name="name">
                        <?php if (isset($errors['name'])): ?>
                            <p class="text-danger"><?php echo $errors['name'] ?></p>
                        <?php endif; ?>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="inputGroupSelect01">Type</label>
                        </div>
                        <select class="custom-select" id="inputGroupSelect01" name="type">
                            <?php foreach ($types as $type):?>
                                <option value="<?php echo $type['id']?>"><?php echo $type['name']?></option>
                            <?php endforeach;?>
                        </select>
                        <?php if (isset($errors['type'])): ?>
                            <p class="text-danger"><?php echo $errors['type'] ?></p>
                        <?php endif; ?>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Price</label>
                        <input type="number" step="0.01" class="form-control" name="price">
                        <?php if (isset($errors['price'])): ?>
                            <p class="text-danger"><?php echo $errors['price'] ?></p>
                        <?php endif; ?>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Number</label>
                        <input type="number" class="form-control" name="number">
                        <?php if (isset($errors['number'])): ?>
                            <p class="text-danger"><?php echo $errors['number'] ?></p>
                        <?php endif; ?>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Date Created</label>
                        <input type="date" class="form-control" name="dateCreate">
                        <?php if (isset($errors['dateCreate'])): ?>
                            <p class="text-danger"><?php echo $errors['dateCreate'] ?></p>
                        <?php endif; ?>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <input type="text" class="form-control" name="description">
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                    <a type="button" href="./index.php" class="btn btn-secondary">Back</a>
                </form>
            </div>
        </div>
    </div>
</div>

