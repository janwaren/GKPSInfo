<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\OrganisasiLuarGkps */

$this->title = 'Create Organisasi Luar Gkps';
$this->params['breadcrumbs'][] = ['label' => 'Organisasi Luar Gkps', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="organisasi-luar-gkps-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
