<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\FullTimerSekolah */

$this->title = 'Tambah Sekolah';
$this->params['breadcrumbs'][] = ['label' => 'Sekolah', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="full-timer-sekolah-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
