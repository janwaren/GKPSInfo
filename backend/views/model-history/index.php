<?php

use yii\helpers\Html;
use yii\widgets\ListView;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\ModelHistorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Model Histories';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="model-history-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Model History', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'date:date',
            'date:time',
            //'table',
            //'model_name',
            'model_label',
            //'field_name',
            'field_id',
            'fieldCaption',
            'field_label',
            // 'old_value:ntext',
            // 'new_value:ntext',
            'type',
            'user.username',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?>

</div>
