<?php
$categories = $this->getCategories();
?>

<div class="d-flex justify-content-between align-items-center">
    <h3 class="display-5">Category List</h3>
    <a class="btn btn-success" href="<?php echo $this->getUrl()->getUrl('form') ?>">Create Category</a>
</div>
<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Parent Id</th>
            <th scope="col">Path Id</th>
            <th scope="col">Status</th>
            <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php if ($categories) : ?>
            <?php foreach ($categories as $category) : ?>
                <tr>
                    <th scope="row"><?= $category->categoryId ?></th>
                    <td><?= $this->getName($category) ?></td>
                    <td><?= $category->parentId ?></td>
                    <td><?= $category->pathId ?></td>
                    <td><?= $category->status ?></td>
                    <td>
                        <a class="btn btn-primary" href="<?php echo $this->getUrl()->getUrl('form', null, ['id' => $category->categoryId], false)  ?>">Update</a>
                        <a type="button" class="btn btn-danger that" href="<?php echo $this->getUrl()->getUrl('delete', null, ['id' => $category->categoryId], false)  ?>">Delete</a>
                    </td>
                </tr>
            <?php endforeach ?>
        <?php endif ?>

    </tbody>

</table>