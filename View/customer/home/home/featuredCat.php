<?php $categories = $this->getCategories(); ?>

<section id="aa-promo">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="aa-promo-area">
                    <div class="row">
                        <!-- promo left -->

                        <?php foreach ($categories as $category) : ?>

                            <div class="col-md-6 no-padding">
                                <div class="aa-promo-left">
                                    <div class="aa-promo-banner">
                                        <img src="<?= $category->image ?>" alt="img">
                                        <div class="aa-prom-content">
                                            <span>75% Off</span>
                                            <h4><a href="#"><?= $category->name ?></a></h4>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        <?php endforeach ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>