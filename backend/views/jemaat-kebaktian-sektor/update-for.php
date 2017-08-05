<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\JemaatKebaktianSektor */

$this->title = 'Update Kebaktian Sektor: ' . $model->jemaat->namaFull;
$this->params['breadcrumbs'][] = ['label' => 'Kebaktian Sektor', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="jemaat-kebaktian-sektor-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form-for', [
        'model' => $model,
    ]) ?>

</div>
