<?php
$options = $this->getTableRow()->getOptions();
?>

<form action="<?php echo $this->getUrl()->getUrl('add', 'admin\attribute\option'); ?>" method="POST">

    <div class="col-12 mb-3">
        <button type="submit" class="btn btn-primary">Update</button>
        <a class="btn btn-success" onclick="addNew();">Add</a>
    </div>

    <div id="old" class="row g-3 d-flex align-items-center ">
        <?php if ($options) : ?>
            <?php foreach ($options as $option) : ?>

                <div id="oldDiv" class="border border-secondary">
                    <div class="col-md-4 m-2">
                        <input type="text" placeholder="Name" name="exist[<?= $option->optionId ?>][name]" value="<?= $option->name ?>" class="form-control">
                    </div>

                    <div class="col-md-4 m-2">
                        <input type="text" placeholder="sort Order" name="exist[<?= $option->optionId ?>][sortOrder]" value="<?= $option->sortOrder ?>" class="form-control">
                    </div>

                    <div class="col-md-4 m-2">
                        <a class="btn btn-danger" onclick="removeOld(this)">Remove</a>
                    </div>
                </div>

            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</form>

<div id="new" style="display: none;">

    <div id="newDiv" class="border border-secondary">
        <div class="col-md-4 m-2">
            <input type="text" placeholder="Name" name="new[name][]" class="form-control">
        </div>

        <div class="col-md-4 m-2">
            <input type="text" placeholder="sort Order" name="new[sortOrder][]" class="form-control">
        </div>

        <div class="col-md-4 m-2">
            <a class="btn btn-danger" onclick="removeOld(this)">Remove</a>
        </div>
    </div>

</div>



<script>
    function addNew() {
        el = $("#new > #newDiv").clone();
        $('#old').append(el)
    }

    function removeOld(button) {
        button.parentElement.parentElement.remove();
    }
</script>