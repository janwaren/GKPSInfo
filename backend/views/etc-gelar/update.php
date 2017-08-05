<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\EtcGelar */

$this->title = 'Update Gelar: ' . $model->singkatan;
$this->params['breadcrumbs'][] = ['label' => 'Gelar', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->singkatan, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="etc-gelar-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
