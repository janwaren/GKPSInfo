<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\FullTimerKeluarga */

$this->title = 'Tambah Keluarga';
$this->params['breadcrumbs'][] = ['label' => 'Keluarga', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="full-timer-keluarga-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
