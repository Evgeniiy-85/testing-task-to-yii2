<?php
use yii\widgets\LinkPager;
?>
<section class="page-products">
  <div class="goods">
	<div class="wrapper">
   
    <div class="wrapper menu-header">
        <h1>
          <strong>
            Товары подкатегории "<?=$subcategory->category_name?>" (<?= $pagination->totalCount?>)
            <a href="<?=Yii::$app->urlManager->createUrl(['subcategories'])?>">Все подкатегории</a>
          </strong>
        </h1>
    </div>
    <div id="extraplace-container">
        <div class="row extraplace-row">
            <?php foreach($products_subcategory as $product_subcategory) { ?>
                <div class="col-xs-6 col-sm-6 col-md-4 col-lg-3">
                <div class="good" itemprop="itemListElement">
                  <div class="preview">
                      <a itemprop="url" href="<?=Yii::$app->urlManager->createUrl(['products/'.$product_subcategory->product_id])?>" class="fnbx-image">
                          <img itemprop="image" src="/images/product.png" alt="<?=$product_subcategory->product_name;?>" title="<?=$product_subcategory->product_name;?>">
                      </a>
                  </div>
                  <h2 class="text-center">
                    <a href="<?=Yii::$app->urlManager->createUrl(['products/'.$product_subcategory->product_id])?>" title="Перейти на страницу товара" class="ajax-product-link">
                      <?=$product_subcategory->product_name;?>
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
    <?= LinkPager::widget(['pagination' => $pagination]) ?>
</div>
<div class="search-link"><a href="<?=Yii::$app->urlManager->createUrl(['search'])?>">Поиск</a></div>

</div>
</div>
</section>

