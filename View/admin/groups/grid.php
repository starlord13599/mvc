<?php
$groups = $this->getGroups();
?>

<div class="d-flex justify-content-between align-items-center">
    <h3 class="display-5">Group List</h3>
    <a class="btn btn-success" href="<?php echo $this->getUrl()->getUrl('form', 'admin\Groups',) ?>">Create Product</a>
</div>
<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Valu</th>
            <th scope="col">Created Date</th>
            <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php if ($groups) : ?>
            <?php foreach ($groups as $group) : ?>
                <tr>

                    <th scope="row"><?= $group->groupId ?></th>
                    <td><?= $group->name ?></td>
                    <td><?= $group->value ?></td>
                    <td><?= $group->createdDate ?></td>
                    <td>
                        <a class="btn btn-primary" href="<?php echo $this->getUrl()->getUrl('form', null, ['id' => $group->groupId]); ?>"><i class="bi bi-pencil"></i></a>
                        <a type="button" class="btn btn-danger" href="<?php echo $this->getUrl()->getUrl('delete', null, ['id' => $group->groupId]); ?>"><i class="bi bi-trash-fill"></i></a>
                    </td>
                </tr>

            <?php endforeach ?>
        <?php endif ?>

    </tbody>

</table>