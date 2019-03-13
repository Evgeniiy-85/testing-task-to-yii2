<?php
use yii\widgets\LinkPager;
?>
<section class="block-navigation">
  <div class="wrapper">
    <h1 class="title-section htabs">
      <span class="htab act" id="htab-products">
        Выберите регион или город,
        <br><small>в котором вы хотите посмотреть список товаров или организаций</small>
      </span>
      <!-- <span class="htab" id="htab-organizations">Организации в регионах</span> -->
    </h1>
    <div class="tabs">
      <div class="row tab" id="tab-organizations">
        
<div class="col-xs-12">
  <div class="navisearch">
    <label>Поиск населенного пункта</label>
    <input id="find-town" type="text" name="find" placeholder="Начните вводить название">
    <div class="ns-list" style="display: none;"></div>
  </div>
</div>

  <div class="col-xs-12">
    <h2 class="country-RU">Россия</h2>
  </div>
  
      <div class="col-xs-12">
        <h3 class="title-town">
            <a href="/regions">Все регионы</a>
        </h3>
        <br>
    </div>
  <?php foreach($regions as $region) { ?>
  <div class="col-xs-12 col-md-20">
        <h3 class="title-town">
            <a href="<?=Yii::$app->urlManager->createUrl(['regions/'. $region->region_id])?>">
            <?=$region->region_name;?></a>
        </h3>
        <ul class="list-towns">
        <?php foreach($towns as $town) { if ($town->town_region == $region->region_id) { ?>
            <li>
                <a href="<?=Yii::$app->urlManager->createUrl(['towns/' . $town->town_id])?>">
                    <?=$town->town_name;?>
                </a>
            </li>
          <?php }} ?>
        </ul>
      </div>
 <?php } ?>
      </div>
  </div>
</div>
</section>