<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Jemaat */

$this->title = 'Create Jemaat';
$this->params['breadcrumbs'][] = ['label' => 'Jemaats', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jemaat-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
