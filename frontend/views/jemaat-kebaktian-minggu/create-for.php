<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\JemaatKebaktianMinggu */

$this->title = 'Tambah Kebaktian Minggu';
$this->params['breadcrumbs'][] = ['label' => 'Kebaktian Minggu', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jemaat-kebaktian-minggu-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form-for', [
        'model' => $model,
    ]) ?>

</div>
