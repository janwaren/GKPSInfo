<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\OrganisasiKepanitiaan */

$this->title = 'Create Organisasi Kepanitiaan';
$this->params['breadcrumbs'][] = ['label' => 'Organisasi Kepanitiaans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="organisasi-kepanitiaan-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
