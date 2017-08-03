<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\FullTimer */

$this->title = 'Update Full Timer: ' . $model->nama;
$this->params['breadcrumbs'][] = ['label' => 'Full Timer', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->nama, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="full-timer-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
