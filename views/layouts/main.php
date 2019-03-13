<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use yii\widgets\ActiveForm;
use app\models\SearchForm;
$model = new SearchForm();



AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">

<header class="header__fixed">
  <div class="header__navigation wrapper">
    <div class="header__logo">
    <a href="/" title="На главную" class="logo"></a>
    </div>
    <div class="menu__container">
        <ul class="top-menu">
            <li><a href="/categories"><i class="">Выбрать товары по категории</i></a></li>
            <li><a href="/navigation"><i class="">Выбрать товары по региону или городу</i></a></li>
            <li><a href="/manufacturers"><i class="">Выбрать товары по производителю</i></a></li>
           
        </ul>
    </div>
    <div class="city-container">
      <span>
        <a id="current-city" href="/navigation" title="Сменить регион">Сменить регион</a>
        <i></i>
      </span>
    </div>
    <a class="c__button button-search" href="/search" title="Поиск товаров и организаций"></a>
  </div>
</header>
    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?php $form = ActiveForm::begin(); ?>
<!--        <table>
            <tr>
                <td>
                    <?= $form->field($model, 'q')->textInput(['class' => 'input'])->label('') ?>
                </td>
                <td>
                    <input type="hidden" name="func" value="search" />
                    <button title="Найти" class="btn-search">Поиск</button>
                </td>
            </tr>
        </table>-->
        <?php $form = ActiveForm::end(); ?>
    </div>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
