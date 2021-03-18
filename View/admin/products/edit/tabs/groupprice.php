<?php
$groups = $this->getCustomerGroup();
// echo "<pre>";
// print_r($groups);

?>

<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Group Name</th>
            <th scope="col">Price</th>
            <th scope="col">Group Price</th>
        </tr>
    </thead>
    <tbody>
        <form action=" <?= $this->getUrl()->getUrl('save', 'admin\product\GroupPrice'); ?> " method="POST">
            <button class="btn btn-primary" type="submit">Update</button>
            <?php if ($groups) : ?>
                <?php foreach ($groups as $group) : ?>
                    <tr>
                        <?php $status = ($group->entityId) ? 'Old' : 'New';  ?>

                        <th scope="row"><?= $group->groupId ?></th>
                        <td><?= $group->name ?></td>
                        <td><?= $group->price ?></td>
                        <td>
                            <input class="form-control" type="text" value="<?= $group->groupPrice ?>" name="groupPrice[<?= $status ?>][<?= $group->groupId ?>]">
                        </td>

                    </tr>

                <?php endforeach ?>
            <?php endif ?>
        </form>
    </tbody>

</table>