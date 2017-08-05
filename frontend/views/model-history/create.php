<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\ModelHistory */

$this->title = 'Create Model History';
$this->params['breadcrumbs'][] = ['label' => 'Model Histories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="model-history-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
