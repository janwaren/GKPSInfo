<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\KarirExternal */

$this->title = 'Tambah Tugas External: ' . $model->fullTimer->nama;
$this->params['breadcrumbs'][] = ['label' => 'Tugas External', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="karir-external-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form-for', [
        'model' => $model,
    ]) ?>

</div>
