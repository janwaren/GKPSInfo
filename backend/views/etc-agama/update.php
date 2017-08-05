<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\EtcAgama */

$this->title = 'Update Agama: ' . $model->nama_agama;
$this->params['breadcrumbs'][] = ['label' => 'Agama', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->nama_agama, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="etc-agama-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
