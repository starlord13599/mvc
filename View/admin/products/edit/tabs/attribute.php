<?php
$product = $this->getTablerow();

$attributes =  $this->getAttributes();
?>

<form class="row g-3" action="<?php echo $this->getUrl()->getUrl('add', 'Admin\Product\Attribute'); ?>" method="POST">


    <?php if ($attributes) : ?>
        <?php foreach ($attributes as $attribute) : ?>
            <?php $name = $attribute->name ?>
            <?php if ($attribute->inputType == 'select') : ?>

                <div class="col-md-12">
                    <label for="status" class="form-label"><?= $attribute->name ?></label>
                    <select id="status" name="product[<?= $attribute->name ?>]" class="form-select">
                        <?php foreach ($attribute->getOptions() as  $option) : ?>
                            <option <?php if ($option->name == $product->$name) :  ?> selected <?php endif; ?>value="<?= $option->name ?>"> <?= $option->name ?> </option>
                        <?php endforeach ?>
                    </select>
                </div>
            <?php else : ?>
                <div class="col-md-12">
                    <label for="name" class="form-label"><?= $attribute->name ?></label>
                    <input value="<?= $product->$name ?>" type="<?= $attribute->inputType ?>" name="product[<?= $attribute->name ?>]" class="form-control">
                </div>
            <?php endif ?>

        <?php endforeach ?>
    <?php endif ?>

    <div class="col-12">
        <button type="submit" class="btn btn-primary">
            Add
        </button>
    </div>

</form>