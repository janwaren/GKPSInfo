<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\JemaatKebaktianSektor */

$this->title = 'Tambah Kebaktian Sektor';
$this->params['breadcrumbs'][] = ['label' => 'Kebaktian Sektor', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jemaat-kebaktian-sektor-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
