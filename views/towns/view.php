<?php
use yii\widgets\LinkPager;
?>

<section id="section-search">
    <div class="wrapper">
    <div class="wrapper menu-header">
        <h1>
          <strong>
            <?=$town->town_name?>
            <a href="/towns">Изменить город</a>
          </strong>
        </h1>
    </div>
        
    <section class="page-products">
      <div class="wrapper">
        <h2 class="title-section">Товары мебельных организаций в городе "<?=$town->town_name?>"(<?=$pagination_products->totalCount?>)</h2>
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
            
      
    <div class="page-organizations">
      <h2 class="title-section">Мебельные организации в городе "<?=$town->town_name?>"(<?=$pagination_manufacturers->totalCount?>)</h2>
      <div class="factories">
        <div class="row" id="loader-container">
            <?php if ($manufacturers) { ?>
              <?php foreach($manufacturers as $manufacture) { ?>
                <div class="col-xs-12 col-sm-6 col-md-3 animate" id="manufacture-<?=$manufacture->manufacture_id;?>">
                    <div class="factory simple" onclick="Nav.go('/stavropol/mebelnaya-fabrika-severo-kavkazskaya-fabrika-mebeli')">
                        <div class="corner"></div>
                        <a href="<?=Yii::$app->urlManager->createUrl(['manufacturers/' . $manufacture->manufacture_id])?>">
                            <div class="logo">
                                <img src="/images/manufacture.png" alt="<?=$manufacture->manufacture_name;?>">
                            </div>
                        </a>
                        <h3>
                        <a href="<?=Yii::$app->urlManager->createUrl(['manufacturers/' . $manufacture->manufacture_id])?>" target="_blank">
                            <?=$manufacture->manufacture_name;?>
                        </a>
                        </h3>
                    </div>
                </div>
              <?php } ?>
        </div>
        <?= LinkPager::widget(['pagination' => $pagination_manufacturers]) ?>
        <?php } ?>    
      </div>
    </div>
    <div class="ancor" id="search-products">
        <span>Найденные товары (<?= $pagination_products->totalCount?>)</span>
    </div>
    <div class="ancor" id="search-manufacturers">
        <span>Найденные организации (<?= $pagination_manufacturers->totalCount?>)</span>
    </div>
    </div>
</section>

