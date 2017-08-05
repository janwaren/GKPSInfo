<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\JemaatProgramBidang */

$this->title = 'Create Jemaat Program Bidang';
$this->params['breadcrumbs'][] = ['label' => 'Jemaat Program Bidangs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jemaat-program-bidang-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
