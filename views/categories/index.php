<?php
use yii\widgets\LinkPager;
?>
<div class="wrapper menu-header">
    <h1>
      <strong>
        Товары по категориям(<?= $count_categories?>)
        <a href="<?=Yii::$app->urlManager->createUrl(['subcategories'])?>">Выбрать подкатегорию</a>
      </strong>
    </h1>
</div>
<div class="filter__products filter__container " id="filter__container">
    <div class="wrapper" id="swiper-filter_wrapper">
       <div class="filter-row filter_part-categories">
           <div class="row">
                <?php foreach($categories as $key => $category) { ?>
                <div class="col-xs-12 col-sm-6 col-lg-4 filter-col">
                    <div id="filter-row-<?=$key?>" class="filter-row filter_part-subcategories">
                       <div class="row">
                           <div class="col-xs-12">
                               <a class="type-name ajax-filter-link active shortened" href="<?=Yii::$app->urlManager->createUrl(['categories/'. $category->category_id])?>" style="white-space: nowrap">
                                    <?=$category->category_name;?>
                               </a>
                           </div>
                           <?php foreach($subcategories as $subcategory) { if ($subcategory->category_parent == $category->category_id) { ?>
                            <div class="col-xs-12 hidden-sm">
                               <a class="type-name ajax-filter-link shortened" href="<?=Yii::$app->urlManager->createUrl(['subcategories/' . $subcategory->category_id])?>" style="white-space: nowrap">
                                   <span class="red"><?=$subcategory->category_name;?></span>
                               </a>
                           </div>
                            <?php }} ?>
                       </div>
                    </div>
                </div>
                <?php } ?>
           </div>
       </div>
        
        <div class="wrapper region-change">
            <a href="<?=Yii::$app->urlManager->createUrl(['search'])?>">Поиск</a>
        </div>
   </div>
</div>


    