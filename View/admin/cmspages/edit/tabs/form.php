<?php
$cmspage = $this->getTableRow();
?>
<form class="row g-3" action="<?php echo $this->getUrl()->getUrl('add'); ?>" method="POST">

    <h1 class="display-6"> <?php echo $this->getTitle();  ?></h1>

    <div class="col-md-6">
        <label for="name" class="form-label">Title</label>
        <input type="text" name="cmspage[title]" value="<?= $cmspage->title  ?>" class="form-control">
    </div>
    <div class="col-md-6">
        <label for="code" class="form-label">Identifier</label>
        <input type="text" name="cmspage[identifier]" value="<?= $cmspage->identifier  ?>" class="form-control">
    </div>
    <div class="col-md-12">
        <label for="description" class="form-label">Content</label>
        <div class="form-group">
            <textarea id="editor" name="cmspage[content]"><?= $cmspage->content ?></textarea>
        </div>
    </div>
    <div class="col-md-4">
        <label for="status" class="form-label">Status</label>
        <select id="status" name="cmspage[status]" class="form-select">
            <?php foreach ($cmspage->getStatusOptions() as $key => $value) : ?>
                <option value="<?= $key ?>" <?php if ($cmspage->status == $key) : ?> selected <?php endif ?>> <?= $value ?> </option>
            <?php endforeach ?>
        </select>
    </div>

    <div class="col-12">
        <button type="submit" class="btn btn-primary">Add</button>
    </div>
</form>