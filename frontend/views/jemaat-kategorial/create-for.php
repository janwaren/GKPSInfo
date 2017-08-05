<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\JemaatKategorial */

$this->title = 'Tambah Kegiatan';
$this->params['breadcrumbs'][] = ['label' => 'Kegiatan Jemaat', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jemaat-kategorial-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form-for', [
        'model' => $model,
    ]) ?>

</div>