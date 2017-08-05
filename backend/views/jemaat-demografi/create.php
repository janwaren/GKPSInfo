<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\JemaatDemografi */

$this->title = 'Tambah Demografi';
$this->params['breadcrumbs'][] = ['label' => 'Demografi Jemaat', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jemaat-demografi-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
