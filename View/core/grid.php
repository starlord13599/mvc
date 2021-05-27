<?php
$products = $this->getCollection();
if ($products) {
    $products = $products->getData();
}
$columns = $this->getColumns();
$actions = $this->getActions();
$buttons = $this->getButtons();
?>

<div class="d-flex justify-content-between align-items-center">
    <h3 class="display-5"> <?= $this->getTitle() ?> </h3>
    <?php if ($buttons) : ?>
        <?php foreach ($buttons as $key => $button) :  ?>
            <a class="btn btn-success" href="<?= $this->getMethodUrl(null, $button['method']); ?>"><?= $button['label'] ?></a>
        <?php endforeach  ?>
    <?php endif ?>
</div>

<form action="<?= $this->getUrl()->getUrl('test', null); ?>" method="post">

    <button type="submit">filter</button>

    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <?php if ($columns) : ?>
                    <?php foreach ($columns as $key => $column) :  ?>
                        <th scope="col"> <?= $column['label'] ?> </th>
                        <input type="<?= $column['type'] ?>" placeholder="Filter by <?= $column['label'] ?>" name="filter[<?= $key ?>]">
                    <?php endforeach  ?>
                <?php endif ?>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($products) : ?>
                <?php foreach ($products as $product) : ?>
                    <tr>
                        <?php if ($columns) : ?>
                            <?php foreach ($columns as $key => $column) : ?>
                                <?php if ($column['type'] == 'image') :  ?>
                                    <td> <img height="100px" width="100px" src="<?= $this->getFieldValue($product, $column['field']); ?>" alt=""></td>
                                <?php else : ?>
                                    <td><?= $this->getFieldValue($product, $column['field']); ?></td>
                                <?php endif  ?>
                            <?php endforeach  ?>
                        <?php endif ?>
                        <td>
                            <?php if ($actions) : ?>
                                <?php foreach ($actions as $key => $action) : ?>
                                    <a class="<?= $action['class'] ?>" href="<?= $this->getMethodUrl($product, $action['method']); ?>"><?= $action['label'] ?></a>
                                <?php endforeach ?>
                            <?php endif ?>
                        </td>
                    </tr>
                <?php endforeach ?>
            <?php endif ?>

        </tbody>

    </table>

</form>