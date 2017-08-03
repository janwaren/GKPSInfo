<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\KarirJemaat */

$this->title = 'Tambah Tugas Ber-Jemaat';
$this->params['breadcrumbs'][] = ['label' => 'Tugas Ber-Jemaat', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="karir-jemaat-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
