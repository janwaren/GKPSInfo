<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\KarirEtcJabatan */

$this->title = 'Update Jabatan Karir: ' . $model->posisi;
$this->params['breadcrumbs'][] = ['label' => 'Jabatan Karir', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->posisi, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="karir-etc-jabatan-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
