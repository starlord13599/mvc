<?php
$attributes = $this->getAttributes();
?>
<div class="d-flex justify-content-between align-items-center">
    <h3 class="display-5">Attribute List</h3>
    <a class="btn btn-success" href="<?php echo $this->getUrl()->getUrl('form') ?>">Create Attribute</a>
</div>
<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">entityTypeId</th>
            <th scope="col">name</th>
            <th scope="col">code</th>
            <th scope="col">inputType</th>
            <th scope="col">backendType</th>
            <th scope="col">sortOrder</th>
            <th scope="col">backendModel</th>
            <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php if ($attributes) : ?>
            <?php foreach ($attributes as $attribute) : ?>
                <tr>
                    <th scope="row"><?= $attribute->attributeId ?></th>
                    <td><?= $attribute->entityTypeId ?></td>
                    <td><?= $attribute->name ?></td>
                    <td><?= $attribute->code ?></td>
                    <td><?= $attribute->inputType ?></td>
                    <td><?= $attribute->backendType ?></td>
                    <td><?= $attribute->sortOrder ?></td>
                    <td><?= $attribute->backendModel ?></td>
                    <td>
                        <a class="btn btn-primary" href="<?php echo $this->getUrl()->getUrl('form', null, ['id' => $attribute->attributeId]); ?>">Update</a>
                        <a type="button" class="btn btn-danger that" href="<?php echo $this->getUrl()->getUrl('delete', null, ['id' => $attribute->attributeId]); ?>">Delete</a>
                    </td>
                </tr>

            <?php endforeach ?>
        <?php endif ?>

    </tbody>

</table>