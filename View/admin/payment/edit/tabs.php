<?php
$tabs = $this->getTabs();
?>

<?php foreach ($tabs as $key => $tab) : ?>
    <a href="<?php echo $this->getUrl()->getUrl(null, null, ['tabs' => $key]); ?>"><?= $tab['label'] ?></a>
<?php endforeach  ?>