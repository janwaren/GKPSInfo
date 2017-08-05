<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\EtcStrata */

$this->title = $model->nama;
$this->params['breadcrumbs'][] = ['label' => 'Strata', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="etc-strata-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Anda yakin ingin menghapus strata ini?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'nama',
        ],
    ]) ?>

</div>
