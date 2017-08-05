<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\JemaatAsetTanah */

$this->title = 'Tambah Aset Tanah';
$this->params['breadcrumbs'][] = ['label' => 'Aset Tanah', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jemaat-aset-tanah-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
		'modelsJemaatAsetSuratTanah' => $modelsJemaatAsetSuratTanah,
    ]) ?>

</div>
