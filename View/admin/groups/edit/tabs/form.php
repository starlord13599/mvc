<?php
$group = $this->getTableRow();
?>

<form class="row g-3" action="<?php echo $this->getUrl()->getUrl('add', 'admin\groups'); ?>" method="POST">

    <h1 class="display-6"> <?php echo $this->getTitle();  ?> </h1>


    <div class="col-md-6">
        <label for="price" class="form-label">Name</label>
        <input type="text" name="groups[name]" value="<?= $group->name  ?>" class="form-control">
    </div>
    <div class="col-6">
        <label for="value" class="form-label">Value</label>
        <input type="text" name="groups[value]" value="<?= $group->value   ?>" class="form-control" id="discount">
    </div>

    <div class="col-12">
        <button type="submit" class="btn btn-primary">Add</button>
    </div>
</form>