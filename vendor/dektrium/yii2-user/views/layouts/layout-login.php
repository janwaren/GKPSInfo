<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\DashboardAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;

DashboardAsset::register($this);
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
<body class="hold-transition login-page">
<?php $this->beginBody() ?>
<div class="row">
    <div class="login-box">
      <div class="login-logo">
        <img class="img-circle" src="img/logo_gkps_160_160_transparent.png" alt="Logo GKPS">
        <br>
        <a href="index.php"><b>GKPS</b>Info</a>
      </div>
      <!-- /.login-logo -->
      <div class="login-box-body">
        <p class="login-box-msg">Sign in to start your session</p>

        <!-- Content Wrapper. Contains page content -->
        <div class="login-box-body ">
            <!-- Main content -->
                <?= $content ?>
        </div>

      </div>
      <!-- /.login-box-body -->
    </div>
</div>    
<!-- /.login-box -->
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
