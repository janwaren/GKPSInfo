<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\JemaatAsetElektronik */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Jemaat Aset Elektroniks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

$canCreateUpdate = Yii::$app->user->can('create-update-jemaat');

?>
<div class="jemaat-aset-elektronik-view">

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
            'nama_alat',
            'jumlah_unit',
            'kondisi',
        ],
    ]) ?>

</div>
