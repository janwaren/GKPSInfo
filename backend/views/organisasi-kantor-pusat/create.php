<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\OrganisasiKantorPusat */

$this->title = 'Create Organisasi Kantor Pusat';
$this->params['breadcrumbs'][] = ['label' => 'Organisasi Kantor Pusats', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="organisasi-kantor-pusat-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
