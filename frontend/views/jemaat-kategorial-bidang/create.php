<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\JemaatKategorialBidang */

$this->title = 'Create Jemaat Kategorial Bidang';
$this->params['breadcrumbs'][] = ['label' => 'Jemaat Kategorial Bidangs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jemaat-kategorial-bidang-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
