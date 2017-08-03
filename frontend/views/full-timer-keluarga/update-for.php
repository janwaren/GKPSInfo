<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\FullTimerKeluarga */

$this->title = 'Update Keluarga: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Keluarga', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="full-timer-keluarga-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form-for', [
        'model' => $model,
    ]) ?>

</div>
