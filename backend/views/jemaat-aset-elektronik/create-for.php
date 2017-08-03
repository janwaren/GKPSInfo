<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\JemaatAsetElektronik */

$this->title = 'Tambah Aset Elektronik';
$this->params['breadcrumbs'][] = ['label' => 'Aset Elektronik', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jemaat-aset-elektronik-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form-for', [
        'model' => $model,
    ]) ?>

</div>
