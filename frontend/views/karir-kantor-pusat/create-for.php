<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\KarirKantorPusat */

$this->title = 'Tambah Tugas Kantor Pusat';
$this->params['breadcrumbs'][] = ['label' => 'Tugas Kantor Pusat', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="karir-kantor-pusat-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form-for', [
        'model' => $model,
    ]) ?>

</div>
