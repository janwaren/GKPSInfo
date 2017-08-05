<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Distrik */

$this->title = 'Create Distrik';
$this->params['breadcrumbs'][] = ['label' => 'Distriks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="distrik-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
