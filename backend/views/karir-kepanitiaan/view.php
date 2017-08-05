<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\KarirKepanitiaan */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Karir Kepanitiaans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="karir-kepanitiaan-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'full_timer_id',
            'posisi_id',
            'kepanitiaan_id',
            'tahun',
            'keterangan:ntext',                        
        ],
    ]) ?>

</div>
