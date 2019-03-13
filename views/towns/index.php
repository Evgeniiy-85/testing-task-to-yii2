<?php
use yii\widgets\LinkPager;
?>

<section class="block-navigation">
  <div class="wrapper">
    <h1 class="title-section htabs">
      <span class="htab act" id="htab-products">
        Выберите город,
        <br><small>в котором вы хотите посмотреть список товаров или организаций</small>
      </span>
      <!-- <span class="htab" id="htab-organizations">Организации в регионах</span> -->
    </h1>
    <div class="tabs">
    <div class="row tab" id="tab-organizations">
        
  <div class="col-xs-12">
    <h2 class="country-RU">Россия</h2>
  </div>
          
  <?php foreach($towns as $town) { ?>
  <div class="col-xs-6 col-sm-6 col-md-4 col-lg-3">
      <h3 class="title-town">
    <a href="<?=Yii::$app->urlManager->createUrl(['towns/' . $town->town_id])?>">
        <?=$town->town_name;?>
    </a>
</h3>
      </div>
   <?php } ?>
      </div>
  </div>
      <?= LinkPager::widget(['pagination' => $pagination]) ?>
</div>
</section>