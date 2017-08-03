<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

use frontend\models\FullTimerJabatan;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\FullTimerSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Full Timer';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="full-timer-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Tambah Full Timer', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            //'gelar_depan',
            [
                'attribute' => 'jabatan_id',
                'value' => 'jabatan.nama',
                'format' => 'raw',
                'filter' => ArrayHelper::map(
                                FullTimerJabatan::find()->asArray()->all(), 
                                'id', 'nama')
            ],            
            ['attribute' => 'nama', 'value' => 'namaAndGelar'],
            //'gelar_belakang',
            // 'jenis_kelamin',
            // 'email:email',
            // 'hp',
            // 'alamat_rumah:ntext',
            // 'user_id',
            // 'no_induk',
            // 'photo_file',

            ['class' => 'yii\grid\ActionColumn',
             'template' => '{view}',
            ],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
