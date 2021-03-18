<?php
$cmspages = $this->getCmsPages();
?>
<div class="d-flex justify-content-between align-items-center">
    <h3 class="display-5">CMS Pages List</h3>
    <a class="btn btn-success" href="<?php echo $this->getUrl()->getUrl('form') ?>">Create Payment</a>
</div>
<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Identifier</th>
            <th scope="col">Content</th>
            <th scope="col">Status</th>
            <th scope="col">Created Date</th>
            <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php if ($cmspages) : ?>
            <?php foreach ($cmspages as $cmspage) : ?>
                <tr>
                    <th scope="row"><?= $cmspage->pageId ?></th>
                    <td><?= $cmspage->title ?></td>
                    <td><?= $cmspage->identifier ?></td>
                    <td><?= $cmspage->content ?></td>
                    <td><?= $cmspage->status ?></td>
                    <td><?= $cmspage->createdDate ?></td>
                    <td>
                        <a class="btn btn-primary" href="<?php echo $this->getUrl()->getUrl('form', null, ['id' => $cmspage->pageId]); ?>">Update</a>
                        <a type="button" class="btn btn-danger that" href="<?php echo $this->getUrl()->getUrl('delete', null, ['id' => $cmspage->pageId]); ?>">Delete</a>
                    </td>
                </tr>

            <?php endforeach ?>
        <?php endif ?>

    </tbody>

</table>