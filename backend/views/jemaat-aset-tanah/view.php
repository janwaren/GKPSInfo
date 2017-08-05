<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;
use yii\grid\GridView;
use yii\bootstrap\Modal;

/* @var $this yii\web\View */
/* @var $model backend\models\JemaatAsetTanah */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Jemaat Aset Tanahs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jemaat-aset-tanah-view">

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

  <?php
  if (Yii::$app->request->isAjax) {
  ?>
    <script>
      $(function() {
        $('.btn-update-create-ajax').click(function() {
          $('#modalUpdateAjax').modal('show')
            .find('#modalUpdateContentAjax')
            .load($(this).attr('value'));   
        });
      }); 

      $(function() {
        $('.btn-create-ajax').click(function() {
          $('#modalAddAjax').modal('show')
            .find('#modalAddContentAjax')
            .load($(this).attr('value'));     
        });
      }); 
    </script>    
  <?php
  }
  ?>

    <?php
        Modal::begin([
                'header' => '<h4>Update</h4>',
                'id' => 'modalUpdateAjax',
                'size' => 'modal-lg',
                'options' => [
                    'tabindex' => false
                ]
            ]);
        echo "<div id='modalUpdateContentAjax'></div>";
        Modal::end();
    ?>    

    <?php
        Modal::begin([
                'header' => '<h4>View</h4>',
                'id' => 'modalViewAjax',
                'size' => 'modal-lg',
                'options' => [
                    'tabindex' => false
                ]
            ]);
        echo "<div id='modalViewContentAjax'></div>";
        Modal::end();
    ?>     

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'jemaat.namaFull',
            'luas',
            'lokasi',
            'kondisi_pemakaian',
            'asal_perolehan',
            'keterangan:ntext',
        ],
    ]) ?>

    <div id="sectionSuratTanah" class="box box-primary">
      <div class="box-header with-border">                        
            <h4 class="box-title">Surat-Surat Tanah</h4>
            <div class="pull-right">
               <?= Html::button('<i class="glyphicon glyphicon-plus"></i> <b>Tambah</b>',
                 ['value' => Url::to('index.php?r=jemaat-aset-surat-tanah/create-for&asetTanahId=' . $model->id), 
                  'class' => 'btn btn-sm btn-success btn-update-create', 
                  'id' => 'buttonAddSuratTanah']) ?>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="box-body">    
          <?= GridView::widget([
              'dataProvider' => $suratTanahDataProvider,
              'columns' => [
                  ['class' => 'yii\grid\SerialColumn'],

                  'jenisSuratTanah.jenis_surat_tanah',
                  'lokasi_surat_tanah',
                  [
                      'class' => 'yii\grid\ActionColumn',
                      'template' => '{view} {update-for}',
                      'urlCreator' => function ($action, $model, $key, $index) {
                          return'index.php?r=jemaat-aset-surat-tanah/'. $action . '&id=' . $model->id . '&kategorialId=8';
                      },
                      'buttons' => [
                              'view' => function ($url, $model) {
                                  return Html::button('<i class="glyphicon glyphicon-eye-open"></i>',
                                          ['value' => $url, 
                                           'class' => 'btn btn-xs btn-success btn-view-ajax']);
                              },
                              'update-for' => function ($url, $model) {
                                  return Html::button('<i class="glyphicon glyphicon-pencil"></i>',
                                          ['value' => $url, 
                                           'class' => 'btn btn-xs btn-warning btn-create-ajax']);
                              }                                                                          
                      ]                                        
                  ],
              ],
          ]); ?>        
        </div>
    </div> <!-- sectionSuratTanah -->     

</div>
