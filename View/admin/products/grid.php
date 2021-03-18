<div class="d-flex justify-content-between align-items-center">
    <h3 class="display-5">Product List</h3>
    <a class="btn btn-success" href="<?php echo $this->getUrl()->getUrl('form') ?>">Create Product</a>
</div>
<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Price</th>
            <th scope="col">Discount</th>
            <th scope="col">Qunatity</th>
            <th scope="col">Description</th>
            <th scope="col">Created Date</th>
            <th scope="col">Updated Date</th>
            <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php if ($this->getProducts()) : ?>
            <?php foreach ($this->getProducts() as $product) : ?>
                <tr>

                    <th scope="row"><?= $product->productId ?></th>
                    <td><?= $product->name ?></td>
                    <td><?= $product->price ?></td>
                    <td><?= $product->discount ?></td>
                    <td><?= $product->quantity ?></td>
                    <td><?= $product->description ?></td>
                    <td><?= $product->createdDate ?></td>
                    <td><?= $product->updatedDate ?></td>
                    <td>
                        <a class="btn btn-primary" href="<?php echo $this->getUrl()->getUrl('form', null, ['id' => $product->productId]); ?>"><i class="bi bi-pencil"></i></a>
                        <a type="button" class="btn btn-danger" href="<?php echo $this->getUrl()->getUrl('delete', null, ['id' => $product->productId]); ?>"><i class="bi bi-trash-fill"></i></a>
                    </td>
                </tr>

            <?php endforeach ?>
        <?php endif ?>

    </tbody>

</table>