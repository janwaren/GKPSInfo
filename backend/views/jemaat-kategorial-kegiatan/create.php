<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\JemaatKategorialKegiatan */

$this->title = 'Create Jemaat Kategorial Kegiatan';
$this->params['breadcrumbs'][] = ['label' => 'Jemaat Kategorial Kegiatans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jemaat-kategorial-kegiatan-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
