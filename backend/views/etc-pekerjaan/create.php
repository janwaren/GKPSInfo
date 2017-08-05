<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\EtcPekerjaan */

$this->title = 'Tambah Pekerjaan';
$this->params['breadcrumbs'][] = ['label' => 'Pekerjaan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="etc-pekerjaan-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
