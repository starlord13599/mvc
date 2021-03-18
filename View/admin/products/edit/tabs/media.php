<?php
$medias = $this->getMedias();
?>
<style>
    img {
        height: 100px;
        width: 100px;
    }
</style>

<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">image</th>
            <th scope="col">label</th>
            <th scope="col">small</th>
            <th scope="col">thumb</th>
            <th scope="col">base</th>
            <th scope="col">gallery</th>
            <th scope="col">remove</th>
        </tr>
    </thead>
    <tbody>
        <form action=" <?php echo $this->getUrl()->getUrl('update', 'Admin\Product\Media') ?>" method="post">
            <button class="btn btn-success" type="submit">Update</button>
            <button class="btn btn-danger" id="delete_btn">Remove</button>
            <?php if ($medias) : ?>
                <?php foreach ($medias as $media) : ?>
                    <tr>

                        <th scope="row"><?= $media->mediaId ?></th>
                        <td><img src="<?= $media->image ?>"></td>
                        <td><input type="input" name="<?= $media->mediaId  ?>[label]" value="<?= $media->label ?>"></td>

                        <td><input class="small" value=1 type="radio" name="<?= $media->mediaId ?>[small]" <?php if ($media->small) : ?>checked<?php endif ?>></td>

                        <td><input class="thumb" value=1 type="radio" name="<?= $media->mediaId ?>[thumb]" <?php if ($media->thumb) : ?>checked<?php endif ?>></td>

                        <td><input class="base" value=1 type="radio" name="<?= $media->mediaId ?>[base]" <?php if ($media->base) : ?>checked<?php endif ?>></td>

                        <input hidden value=0 type="checkbox" name="<?= $media->mediaId ?>[gallery]" checked>
                        <td><input value=1 type="checkbox" name="<?= $media->mediaId  ?>[gallery]" <?php if ($media->gallery) : ?>checked<?php endif ?>></td>

                        <input hidden value=0 type="checkbox" name="<?= $media->mediaId ?>[remove]" checked>
                        <td><input class="remove" value=1 type="checkbox" name="<?= $media->mediaId  ?>[remove]" data="<?= $media->mediaId ?>"></td>

                    </tr>
                <?php endforeach ?>
            <?php endif ?>
        </form>
    </tbody>

</table>

<form class="row row-cols-lg-auto g-3 align-items-center" action="<?php echo $this->getUrl()->getUrl('add', 'Admin\Product\Media', ['id' => $this->getRequest()->getGet('id')]); ?>" method="POST" enctype="multipart/form-data">
    <div class="col-md-6">
        <input class="form-control form-control-lg" id="formFileLg" name="image" type="file">
    </div>
    <div class="col-auto">
        <button class="btn btn-primary btn-large" type="submit">Upload</button>
    </div>
</form>


<script src="./skin/Admin/js/main.js"></script>