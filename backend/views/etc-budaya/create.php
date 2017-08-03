<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\EtcBudaya */

$this->title = 'Tambah Budaya Baru';
$this->params['breadcrumbs'][] = ['label' => 'Budaya', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="etc-budaya-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
