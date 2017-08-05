<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\KarirEtcJabatan */

$this->title = 'Tambah Jabatan Karir ';
$this->params['breadcrumbs'][] = ['label' => 'Jabatan Karir', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="karir-etc-jabatan-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
