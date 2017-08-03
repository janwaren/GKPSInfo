<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\EtcPendidikan */

$this->title = 'Update Pendidikan: ' . $model->jenjang_pendidikan;
$this->params['breadcrumbs'][] = ['label' => 'Pendidikan', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->jenjang_pendidikan, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="etc-pendidikan-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
