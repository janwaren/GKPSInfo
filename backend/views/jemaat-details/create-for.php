<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\JemaatDetails */

$this->title = 'Tambah Detail: ' . $model->jemaat->namaFull;
$this->params['breadcrumbs'][] = ['label' => 'Detail Jemaat', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jemaat-details-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form-for', [
        'model' => $model,
    ]) ?>

</div>
