<?php
use yii\widgets\LinkPager;
?>


<section class="page-products">
  <div class="goods">
	<div class="wrapper">
        <div class="wrapper menu-header">
            <h1>
                <strong>
                  Товары производителя(<?= $pagination_products->totalCount?>)
                </strong>
                <a href="<?=Yii::$app->urlManager->createUrl(['manufacturers'])?>">Выбрать производителя</a>
            </h1>
        </div>
        <div id="extraplace-container">
            <div class="row extraplace-row">
            <?php foreach($products as $product) { ?>
        <div class="col-xs-6 col-sm-6 col-md-4 col-lg-3" id="product-118204">
          <div class="good" itemprop="itemListElement">
            <div class="preview">
                <a itemprop="url" href="<?=Yii::$app->urlManager->createUrl(['products/'. $product->product_id])?>">
                    <img itemprop="image" src="/images/product.png" alt="<?=$product->product_name;?>" title="<?=$product->product_name;?>">
                </a>
            </div>
            <h2 class="text-center">
              <a href="<?=Yii::$app->urlManager->createUrl(['products/'. $product->product_id])?>" title="Перейти на страницу товара" class="ajax-product-link">
                <?=$product->product_name;?>
              </a>
            </h2>
            <div class="manufacture-title">
              <a data-title="Аврора" href="#">
                <span class="shortened"><!--Фабрика--></span>
              </a>
            </div>
          </div>
        </div>
            <?php } ?>
          </div>
            <?= LinkPager::widget(['pagination' => $pagination_products]) ?>
        </div>
        <div class="wrapper region-change">
            <a href="<?=Yii::$app->urlManager->createUrl(['search'])?>">Поиск</a>
        </div>
    </div>
</div>
</section>