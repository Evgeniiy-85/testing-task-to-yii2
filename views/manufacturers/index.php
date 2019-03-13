<?php
use yii\widgets\LinkPager;
?>

<section class="page-products">
  <div class="goods">
	<div class="wrapper">
        <div class="wrapper menu-header">
            <h1>
                <strong>
                  Производители (<?= $pagination_manufactures->totalCount?>)
                </strong>
                <a href="<?=Yii::$app->urlManager->createUrl(['navigation'])?>">Выбрать регион или город</a>
            </h1>
        </div>
        <div id="extraplace-container">
            <div class="row extraplace-row">
            <?php foreach($manufacturers as $manufacture) { ?>
        <div class="col-xs-6 col-sm-6 col-md-4 col-lg-3" id="product-118204">
          <div class="good" itemprop="itemListElement">
            <div class="manufacture-title">
              <a data-title="<?=$manufacture->manufacture_name;?>" href="<?=Yii::$app->urlManager->createUrl(['manufacturers/'.$manufacture->manufacture_id])?>">
                <span class="shortened"><?=$manufacture->manufacture_name;?></span>
              </a>
            </div>
          </div>
        </div>
    <?php } ?>
  </div>
    <?= LinkPager::widget(['pagination' => $pagination_manufactures]) ?>
</div>
<div class="wrapper region-change">
    <a href="<?=Yii::$app->urlManager->createUrl(['search'])?>">Поиск</a>
</div>

</div>
</div>
</section>

