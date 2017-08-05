<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\FullTimerPelayanan */

$this->title = 'Update Pelayanan: ' . $model->fullTimer->nama;
$this->params['breadcrumbs'][] = ['label' => 'Pelayanan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="full-timer-pelayanan-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form-for', [
        'model' => $model,
    ]) ?>

</div>
