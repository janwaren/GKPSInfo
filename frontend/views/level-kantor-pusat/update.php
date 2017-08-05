<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\LevelKantorPusat */

$this->title = 'Update Level Kantor Pusat: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Level Kantor Pusats', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="level-kantor-pusat-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
