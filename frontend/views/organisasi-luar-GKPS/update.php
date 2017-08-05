<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\OrganisasiLuarGkps */

$this->title = 'Update Organisasi Luar Gkps: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Organisasi Luar Gkps', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="organisasi-luar-gkps-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
