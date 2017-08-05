<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\EtcJenisKendaraan */

$this->title = 'Tambah Jenis Kendaraan';
$this->params['breadcrumbs'][] = ['label' => 'Jenis Kendaraan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="etc-jenis-kendaraan-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
