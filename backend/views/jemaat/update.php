<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Jemaat */

$subtitle = $model->levelJemaatNama . ' ' .  $model->nama;
$this->title = 'Update Jemaat: ' . $subtitle;
$this->params['breadcrumbs'][] = ['label' => 'Jemaats', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $subtitle, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="jemaat-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
