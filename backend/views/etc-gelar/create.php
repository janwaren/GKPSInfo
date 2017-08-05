<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\EtcGelar */

$this->title = 'Tambah Gelar';
$this->params['breadcrumbs'][] = ['label' => 'Gelar', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="etc-gelar-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
