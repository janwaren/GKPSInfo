<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\EtcBudaya */

$this->title = $model->nama_budaya;
$this->params['breadcrumbs'][] = ['label' => 'Budaya', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="etc-budaya-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Anda yakin akan menghapus item budaya ini?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'nama_budaya',
        ],
    ]) ?>

</div>
