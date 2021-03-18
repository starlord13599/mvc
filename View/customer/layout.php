<?php echo $this->getChild('header')->toHtml(); ?>

<?php echo $this->createBlock('Block\Customer\Layout\Message')->toHtml(); ?>
<?php echo $this->getChild('content')->toHtml(); ?>

<?php echo $this->getChild('footer')->toHtml(); ?>