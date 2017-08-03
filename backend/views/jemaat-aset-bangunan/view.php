<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\JemaatAsetBangunan */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Jemaat Aset Bangunans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

$canCreateUpdate = Yii::$app->user->can('create-update-jemaat');

?>
<div class="jemaat-aset-bangunan-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php 
    if ($canCreateUpdate) {
    ?>
    }
    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Anda yakin menghapus item ini?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
    <?php 
    } 
    ?>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'jemaat_id',
            'jenis_bangunan_id',
            'luas_bangunan',
            'jumlah_unit',
            'kondisi',
        ],
    ]) ?>

</div>
