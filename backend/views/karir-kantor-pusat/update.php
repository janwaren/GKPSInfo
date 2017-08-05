<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\KarirKantorPusat */

$this->title = 'Update Tugas Kantor Pusat: ' . $model->fullTimer->nama;
$this->params['breadcrumbs'][] = ['label' => 'Tugas Kantor Pusat', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="karir-kantor-pusat-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
