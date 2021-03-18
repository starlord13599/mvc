<section class="hero">
    <div class="leftbar">
        <div class="leftbar__lists">
            <?php echo $this->getTabHtml(); ?>
        </div>
    </div>
    <div class="rightbar">
        <?php echo $this->createBlock('Block\Core\Layout\Message')->toHtml(); ?>
        <?php echo $this->getTabContents(); ?>
    </div>
</section>