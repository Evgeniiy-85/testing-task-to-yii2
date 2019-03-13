<?php
use yii\widgets\LinkPager;
?>
<section class="page-products">
  <div class="goods">
	<div class="wrapper">
    
<div class="wrapper menu-header">
    <h1>
      <strong>
        Товары категории "<?=$category->category_name?>" (<?= $pagination_products_category->totalCount?>)
        <a href="<?=Yii::$app->urlManager->createUrl(['categories'])?>">Вcсе категории</a>
      </strong>
    </h1>
</div>
<div id="extraplace-container">
    <div class="row extraplace-row">
    <?php foreach($products_category as $product_category) { ?>
<div class="col-xs-6 col-sm-6 col-md-4 col-lg-3" id="product-118204">
  <div class="good" itemprop="itemListElement">
    <div class="preview">
        <a itemprop="url" href="<?=Yii::$app->urlManager->createUrl(['products/'.$product_category->product_id])?>">
            <img itemprop="image" src="/images/product.png" alt="<?=$product_category->product_name;?>" title="<?=$product_category->product_name;?>">
        </a>
    </div>
    <h2 class="text-center">
      <a href="<?=Yii::$app->urlManager->createUrl(['products/'.$product_category->product_id])?>" title="Перейти на страницу товара" class="ajax-product-link">
        <?=$product_category->product_name;?>
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
    <?= LinkPager::widget(['pagination' => $pagination_products_category]) ?>
</div>
<div class="search-link"><a href="<?=Yii::$app->urlManager->createUrl(['search'])?>">Поиск</a></div>

</div>
</div>
</section>