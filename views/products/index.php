<?php
use yii\widgets\LinkPager;
?>


<section id="section-search">
    <div class="wrapper">
    <div class="wrapper menu-header">
        <h1>
          <strong>
            Товары
          </strong>
        </h1>
    </div>
        
    <section class="page-products">
      <div class="wrapper">
        <div class="goods row" id="products">
             <?php if ($products) { ?>
              <?php foreach($products as $product) { ?>
                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3" id="product-148185">
                    <div class="good">
                        <div class="preview">
                          <a href="<?=Yii::$app->urlManager->createUrl(['products/' . $product->product_id])?>" class="ajax-product-link">
                                <img src="/images/product.png" alt="<?=$product->product_name;?>">
                          </a>
                        </div>

                        <h2>
                          <a href="<?=Yii::$app->urlManager->createUrl(['products/' . $product->product_id])?>" title="Перейти на страницу товара" class="ajax-product-link"><?=$product->product_name;?></a>
                        </h2>
                    </div>
                </div>
              <?php } ?>
        </div>
        <?= LinkPager::widget(['pagination' => $pagination_products]) ?>
        <?php } ?>
        </div>
    </section>      
    </div>
</section>

