<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tiny.cloud/1/rvxhln7305viuu0rpeyopva5gob87n0v6ocp8w7o5w30hswk/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <script src="./skin/Admin/js/jquery-3.6.0.min.js"></script>
    <script src="./skin/Admin/js/mage.js"></script>
    <script>
        tinymce.init({
            selector: 'textarea#editor',
            skin: 'bootstrap',
            plugins: 'lists, link, image, media',
            toolbar: 'h1 h2 bold italic strikethrough blockquote bullist numlist backcolor | link image media | removeformat help',
            menubar: false
        });
    </script>
    <link rel="stylesheet" href="./skin/Admin/css/style.css">
    <title>Document</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">CRM</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo $this->getUrl()->getUrl('grid', 'admin\product', null, true); ?>">Product</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo $this->getUrl()->getUrl('grid', 'admin\customer', null, true); ?>">Customer</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo $this->getUrl()->getUrl('grid', 'admin\category', null, true); ?>">Category</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo $this->getUrl()->getUrl('grid', 'admin\shipment', null, true); ?>">Shipment</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo $this->getUrl()->getUrl('grid', 'admin\payment', null, true); ?>">Payment </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo $this->getUrl()->getUrl('grid', 'admin\admin', null, true); ?>">Admin </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo $this->getUrl()->getUrl('grid', 'admin\Groups', null, true); ?>">Customer Group </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo $this->getUrl()->getUrl('grid', 'admin\CmsPages', null, true); ?>">CMS Pages </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo $this->getUrl()->getUrl('grid', 'admin\attribute',  null, true); ?>">Attribute</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo $this->getUrl()->getUrl('grid', 'admin\brand',  null, true); ?>">Brand</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>