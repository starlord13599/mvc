<?php
$category = $this->getTableRow();
$categoryOptions = $this->getCategoryOptions();
?>

<form class="row g-3" action="<?php echo $this->getUrl()->getUrl('add'); ?>" method="POST">

    <h1 class="display-6"> Create/Update Category </h1>

    <div class="col-md-12">
        <label for="parent" class="form-label">Parent</label>
        <select name="category[parentId]">
            <?php foreach ($categoryOptions as $categoryId => $name) : ?>
                <option <?php if ($categoryId == $category->parentId) : ?> selected <?php endif  ?> value="<?= $categoryId ?>"><?= $name ?></option>
            <?php endforeach  ?>
        </select>
    </div>

    <div class="col-md-6">
        <label for="name" class="form-label">Name</label>
        <input type="text" name="category[name]" value="<?= $category->name ?>" class="form-control">
    </div>

    <div class="col-md-4">
        <label for="status" class="form-label">Status</label>
        <select id="status" name="category[status]" class="form-select">
            <?php foreach ($category->getStatusOptions() as $key => $value) : ?>
                <option value="<?= $key ?>" <?php if ($category->status == $key) : ?> selected <?php endif ?>> <?= $value ?> </option>
            <?php endforeach ?>
        </select>
    </div>

    <div class="col-12">
        <button type="submit" class="btn btn-primary">Add</button>
    </div>
</form>