<section class="page-products">
    <div class="goods">
        <div class="wrapper">
            
        <div class="wrapper menu-header">
            <h1>
              <strong>
                Товар "<?=$product->product_name;?>"
              </strong>
                <a href="<?=Yii::$app->urlManager->createUrl(['products'])?>">Все товары</a>
            </h1>
        </div>
        
            <div id="extraplace-container">
                <div class="row extraplace-row">
                    <div class="col-xs-6 col-sm-6 col-md-4 col-lg-3" id="product-118204">
                        <div class="good" itemprop="itemListElement">
                            <div class="preview">
                                <a itemprop="url" href="<?=Yii::$app->urlManager->createUrl(['products/'.$product->product_id])?>">
                                    <img itemprop="image" src="/images/product.png" alt="" title="">
                                </a>
                            </div>
                            <h3 class="text-center">
                                <?=$product->product_name;?>
                            </h3>
                            <h3 class="text-center">
                                Дата создания: <?=date("Y-m-d H:i:s", $product->product_date);?>
                            </h3>
                            <h3 class="text-center">
                                <a href="<?=Yii::$app->urlManager->createUrl(['manufacturers/'.$manufacture->manufacture_id])?>">
                                    Производитель: <?=$manufacture->manufacture_name;?>
                                </a>
                            </h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="search-link"><a href="<?=Yii::$app->urlManager->createUrl(['search'])?>">Поиск</a></div>
        </div>
    </div>
</section>