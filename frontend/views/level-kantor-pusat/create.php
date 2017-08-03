<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\LevelKantorPusat */

$this->title = 'Create Level Kantor Pusat';
$this->params['breadcrumbs'][] = ['label' => 'Level Kantor Pusats', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="level-kantor-pusat-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
