<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\EtcJenisBangunan */

$this->title = 'Update Jenis Bangunan: ' . $model->jenis_bangunan;
$this->params['breadcrumbs'][] = ['label' => 'Jenis Bangunan', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->jenis_bangunan, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="etc-jenis-bangunan-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
