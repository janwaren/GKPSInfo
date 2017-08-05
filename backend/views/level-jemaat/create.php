<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\LevelJemaat */

$this->title = 'Create Level Jemaat';
$this->params['breadcrumbs'][] = ['label' => 'Level Jemaats', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="level-jemaat-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
