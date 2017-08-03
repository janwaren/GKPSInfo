<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\EtcBudaya */

$this->title = 'Update Budaya: ' . $model->nama_budaya;
$this->params['breadcrumbs'][] = ['label' => 'Budaya', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->nama_budaya, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="etc-budaya-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
