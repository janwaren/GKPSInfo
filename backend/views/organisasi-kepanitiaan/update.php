<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\OrganisasiKepanitiaan */

$this->title = 'Update Organisasi Kepanitiaan: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Organisasi Kepanitiaans', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="organisasi-kepanitiaan-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
