<?php
$brand = $this->getTableRow();
?>
<form class="row g-3" action="<?php echo $this->getUrl()->getUrl('add'); ?>" method="POST" enctype="multipart/form-data">

    <h1 class="display-6"> <?php echo $this->getTitle();  ?></h1>

    <div class="col-md-6">
        <label for="name" class="form-label">Name</label>
        <input type="text" name="brand[name]" value="<?= $brand->name  ?>" class="form-control">
    </div>
    <div class="col-md-6">
        <label for="code" class="form-label">Image</label>
        <input type="file" name="brand[brandImage]" value="<?= $brand->brandImage  ?>" class="form-control">
    </div>

    <div class="col-md-4">
        <label for="status" class="form-label">Status</label>
        <select id="status" name="brand[status]" class="form-select">
            <?php foreach ($brand->getStatusOptions() as $key => $value) : ?>
                <option value="<?= $key ?>" <?php if ($brand->status == $key) : ?> selected <?php endif ?>> <?= $value ?> </option>
            <?php endforeach ?>
        </select>
    </div>

    <div class="col-12">
        <button type="submit" class="btn btn-primary">Add</button>
    </div>
</form>