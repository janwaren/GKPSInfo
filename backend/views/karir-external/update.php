<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\KarirExternal */

$this->title = 'Update Karir External: ' . $model->fullTimer->nama;
$this->params['breadcrumbs'][] = ['label' => 'Karir External', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="karir-external-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
