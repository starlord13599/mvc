<?php
$attribute = $this->getTableRow();
$entityType = $attribute->getEntityTypes();
$inputType = $attribute->getInputTypeOptions();
$backendType = $attribute->getBackendTypeOptions();
?>
<form class="row g-3" action="<?php echo $this->getUrl()->getUrl('add'); ?>" method="POST">

    <h1 class="display-6"> <?php echo $this->getTitle();  ?></h1>

    <div class="col-md-4">
        <label for="entityTypeId" class="form-label">Entity Type</label>
        <select id="entityTypeId" name="attribute[entityTypeId]" class="form-select">
            <?php foreach ($entityType as $key => $value) : ?>
                <option value="<?= $key ?>" <?php if ($attribute->entityTypeId == $key) : ?> selected <?php endif ?>> <?= $value ?> </option>
            <?php endforeach ?>
        </select>
    </div>

    <div class="col-md-6">
        <label for="name" class="form-label">Name</label>
        <input type="text" name="attribute[name]" value="<?= $attribute->name   ?>" class="form-control" id="description">
    </div>

    <div class="col-md-6">
        <label for="code" class="form-label">Code</label>
        <input type="text" name="attribute[code]" value="<?= $attribute->code  ?>" class="form-control">
    </div>

    <div class="col-md-4">
        <label for="inputType" class="form-label">Input Type</label>
        <select id="inputType" name="attribute[inputType]" class="form-select">
            <?php foreach ($inputType as $key => $value) : ?>
                <option value="<?= $key ?>" <?php if ($attribute->inputType == $key) : ?> selected <?php endif ?>> <?= $value ?> </option>
            <?php endforeach ?>
        </select>
    </div>

    <div class="col-md-4">
        <label for="backendType" class="form-label">Backend Type</label>
        <select id="backendType" name="attribute[backendType]" class="form-select">
            <?php foreach ($backendType as $key => $value) : ?>
                <option value="<?= $key ?>" <?php if ($attribute->backendType == $key) : ?> selected <?php endif ?>> <?= $value ?> </option>
            <?php endforeach ?>
        </select>
    </div>

    <div class="col-md-6">
        <label for="sortOrder" class="form-label">Sort Order</label>
        <input type="text" name="attribute[sortOrder]" value="<?= $attribute->sortOrder  ?>" class="form-control">
    </div>

    <div class="col-md-6">
        <label for="backendModel" class="form-label">Back End Model</label>
        <input type="text" name="attribute[backendModel]" value="<?= $attribute->backendModel  ?>" class="form-control">
    </div>

    <div class="col-12">
        <button type="submit" class="btn btn-primary">Add</button>
    </div>
</form>