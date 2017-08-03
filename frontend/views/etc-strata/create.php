<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\EtcStrata */

$this->title = 'Tambah Strata';
$this->params['breadcrumbs'][] = ['label' => 'Strata', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="etc-strata-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
