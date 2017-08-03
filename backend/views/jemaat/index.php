<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

use execut\widget\TreeView;
use yii\web\JsExpression;
use wbraganca\fancytree\FancytreeWidget;

use backend\models\Jemaat;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\JemaatSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Daftar Jemaat';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jemaat-index">

  <h1><?= Html::encode($this->title) ?></h1>
  <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

  <p>
      <?= Html::a('Tambahkan Jemaat', ['create'], ['class' => 'btn btn-success']) ?>
  </p>

  <div class="row">
    <div class="col-md-4">
      <?php
        $dataTree = [];
        $distriks = Jemaat::find()->where(['level_jemaat_id' => 1])->all();         
        
        // walk through distrik
        foreach($distriks as $distrik)
        {    
          // find resort under distrik
          $resorts = Jemaat::find()->where(['super_id' => $distrik->id])->all();
     
          // create empty resort node
          $resortNodes = [];
     
          // fill in resort node with array of resort
          foreach ($resorts as $resort)
          {
            // create empty jemaat node
            $jemaatNodes = [];
            // find jemaat under resort
            $jemaats = Jemaat::find()->where(['super_id' => $resort->id])->all();
     
            // create an array jemaatNodes
            foreach ($jemaats as $jemaat)
            {
              $jemaatNode = array('id' => $jemaat->id, 'text' => $jemaat->namaFull);
              array_push($jemaatNodes, $jemaatNode);
            }
     
            // push the resort to resortNodes
            $resortNode = array('id' => $resort->id, 'text' => $resort->namaFull, 'nodes' => $jemaatNodes);
            array_push($resortNodes, $resortNode);
          }
     
          // create a distrik node contains nodes of resort
          $distrikNode = array('id' => $distrik->id, 'text' => $distrik->namaFull, 'nodes' => $resortNodes);
          // push the distrikNode to main data tree
          array_push($dataTree, $distrikNode);
        }

$onSelect = new JsExpression(<<<JS
function (undefined, item) {
    console.log(item);
}
JS
);

        $groupsContent = TreeView::widget([
            'data' => $dataTree,
            'size' => TreeView::SIZE_SMALL,
            'header' => 'Struktur Jemaat',
            'searchOptions' => [
                'inputOptions' => [
                    'placeholder' => 'Cari jemaat...'
                ],
            ],
            'clientOptions' => [
                // 'onNodeSelected' => $onSelect,
                'selectedBackColor' => 'rgb(40, 153, 57)',
                'borderColor' => '#fff',
            ],
        ]);

        echo $groupsContent;

      ?>
    </div> <!-- col-md-4 -->

    <div class="col-md-8">
      <?php Pjax::begin(); ?>    <?= GridView::widget([
      'dataProvider' => $dataProvider,
      'filterModel' => $searchModel,
      'columns' => [
        ['class' => 'yii\grid\SerialColumn'],
        //'id',
        ['attribute' => 'nama', 'value' => 'namaFull'],
        'superNamaFull',
        'statusJemaatNama',
        ['class' => 'yii\grid\ActionColumn'],
      ],
      ]); ?>
      <?php Pjax::end(); ?>    
    </div> <!-- col-md-8 -->
  </div> <!-- row -->
