<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\StatusJemaat */

$this->title = 'Create Status Jemaat';
$this->params['breadcrumbs'][] = ['label' => 'Status Jemaats', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="status-jemaat-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
