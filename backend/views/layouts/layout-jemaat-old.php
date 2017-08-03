<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body data-spy="scroll" data-target=".navbar" data-offset="50">
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => 'GKPS.NET',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);

    $menuItemsLeft = [
        ['label' => 'Detail', 'url' => '#sectionDetail'],
        ['label' => 'Sejarah', 'url' => '#sectionSejarah'],
        ['label' => 'Situasi', 'url' => '#sectionSituasi'],
        [
            'label' => 'Kegiatan',
            'items' => [
                 '<li class="divider"></li>',
                 '<li class="dropdown-header">Kebaktian Jemaat</li>',            
                 ['label' => 'Kebaktian Minggu', 'url' => '#'],
                 ['label' => 'Kebaktian Sektoral', 'url' => '#'],
                 '<li class="divider"></li>',
                 '<li class="dropdown-header">Kegiatan Kategorial</li>',
                 ['label' => 'Sekolah Minggu/Remaja', 'url' => '#'],
                 ['label' => 'Pemuda', 'url' => '#'],
                 ['label' => 'Bapa', 'url' => '#'],
                 ['label' => 'Wanita', 'url' => '#'],                 
                 ['label' => 'Usia Indah', 'url' => '#'],
                 ['label' => 'Profesi', 'url' => '#'],                                                   
                 ['label' => 'Majelis Jemaat', 'url' => '#'],                                  
            ],
        ],        
    ];

    $menuItemsRight = [
        ['label' => 'Home', 'url' => ['/site/index']],
    ];



    if (Yii::$app->user->isGuest) {
        $menuItemsRight[] = ['label' => 'Login', 'url' => ['/site/login']];
    } else {
        $menuItemsRight[] = '<li>'
            . Html::beginForm(['/site/logout'], 'post')
            . Html::submitButton(
                'Logout (' . Yii::$app->user->identity->username . ')',
                ['class' => 'btn btn-link']
            )
            . Html::endForm()
            . '</li>';
    }

    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-left'],
        'items' => $menuItemsLeft,
    ]);

    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $menuItemsRight,
    ]);

    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
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
