<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\KarirKepanitiaan */

$this->title = 'Tugas Kepanitiaan: ' . $model->fullTimer->nama;
$this->params['breadcrumbs'][] = ['label' => 'Karir Kepanitiaan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="karir-kepanitiaan-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form-for', [
        'model' => $model,
    ]) ?>

</div>
