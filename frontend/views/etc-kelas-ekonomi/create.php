<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\EtcKelasEkonomi */

$this->title = 'Create Etc Kelas Ekonomi';
$this->params['breadcrumbs'][] = ['label' => 'Etc Kelas Ekonomis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="etc-kelas-ekonomi-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
