<?php

use kartik\helpers\Html;
use yii\helpers\Url;
use yii\helpers\Json;
use yii\widgets\DetailView;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\bootstrap\Modal;

/* @var $this yii\web\View */
/* @var $model backend\models\Jemaat */

$this->title = $model->levelJemaatNama . ' ' .  $model->nama;
$this->params['breadcrumbs'][] = ['label' => 'Jemaats', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

$canCreateUpdate = Yii::$app->user->can('create-update-jemaat');

?>
<div class="jemaat-view">

    <?php
        Modal::begin([
                'header' => '<h4>Update</h4>',
                'id' => 'modalUpdate',
                'size' => 'modal-lg',
                'options' => [
                    'tabindex' => false
                ]
            ]);
        echo "<div id='modalUpdateContent'></div>";
        Modal::end();
    ?>    

    <?php
        Modal::begin([
                'header' => '<h4>View</h4>',
                'id' => 'modalView',
                'size' => 'modal-lg',
                'options' => [
                    'tabindex' => false
                ]
            ]);
        echo "<div id='modalViewContent'></div>";
        Modal::end();
    ?>  

    <div class="clearfix">&nbsp;</div> 

    <div class="row">

      <div class="col-md-4">

        <!-- ================================================ -->
        <!-- Basic information                                -->
        <!-- ================================================ -->

        <div class="box box-primary">
          <div class="box-body box-profile">
            <div class="pull-right">
              <?= $canCreateUpdate ? Html::a('<i class="glyphicon glyphicon-pencil"></i>', ['update', 'id' => $model->id], ['class' => 'btn btn-success btn-xs']) : '' ?>
            </div>          
            <div class="clearfix">&nbsp;</div> 
            <img class="profile-user-img img-responsive img-circle" src="<?= empty($modelPhotos) ? 'img/logo_gkps_160_160.gif' : $modelPhotos[0]->thumbnail ?>" alt="User profile picture">
            <h3 class="profile-username text-center"><?= Html::encode($model->namaFull) ?></h3>
            <p class="text-muted text-center"><?= $model->superNamaFull . ((isset($model->super->super) && $model->super->super->level_jemaat_id != 0) ? ', ' . $model->super->superNamaFull : '') ?></p>  

            <?php
            $statistikModels = $statistikDataProvider->getModels();
            if (count($statistikModels) > 0) {
            ?>
              <ul class="list-group list-group-unbordered">
                <?php
                foreach($statistikModels[0] as $nameStatistik => $valueStatistik) {
                  if (in_array($nameStatistik, ['id', 'jemaat_id','nama_pengantar_jemaat','tahun_data']))
                    continue;
                ?>
                <li class="list-group-item">
                  <b><?= $statistikModels[0]->getAttributeLabel($nameStatistik) ?></b> <a class="pull-right"><?=$valueStatistik?></a>
                </li>
                <?php 
                }
                ?>
                <li class="list-group-item">
                  <p class="text-default text-center"><b>Pengantar Jemaat</b><br> <?= $statistikModels[0]->nama_pengantar_jemaat?></p>  
                </li>            
              </ul>
              <p class="text-info text-center small">Berdasarkan data tahun <?= $statistikModels[0]->tahun_data?></p>
                <div class="row">
                  <div class="col-md-6">
                    <?= $canCreateUpdate ? 
                          Html::button('<i class="glyphicon glyphicon-pencil"></i> Update Data ' . $statistikModels[0]->tahun_data,
                                 ['value' => Url::to('index.php?r=jemaat-statistik/update-for&id=' . $statistikModels[0]->id), 
                                  'class' => 'btn btn-primary btn-sm btn-block btn-update-create', 
                                  'id' => 'buttonAddStatistik'])
                          : ''
                    ?>              
                  </div>
                  <div class="col-md-6">
                    <?= $canCreateUpdate ?
                          Html::button('<i class="glyphicon glyphicon-plus"></i> Tambah Data',
                                 ['value' => Url::to('index.php?r=jemaat-statistik/create-for&jemaatId=' . $model->id), 
                                  'class' => 'btn btn-success btn-sm btn-block btn-update-create', 
                                  'id' => 'buttonAddStatistik']) : '' ?> 
                  </div>
                </div>                           
            <?php
            } else {
            ?>
              <p class="text-danger bg-danger text-center">Tidak ada data statistik</p>
              <?= $canCreateUpdate ? 
                    Html::button('<i class="glyphicon glyphicon-plus"></i> <b>Tambah Data</b>',
                                 ['value' => Url::to('index.php?r=jemaat-statistik/create-for&jemaatId=' . $model->id), 
                                  'class' => 'btn btn-success btn-sm btn-block btn-update-create', 
                                  'id' => 'buttonAddStatistik']) : '' ?>   
            <?php
            }
            ?>
          </div>
          <!-- /.box-body -->
        </div>

        <?php 
        if ($model->level_jemaat_id < 3) {
        ?>
        <div id="struktur" class="box box-primary">
          <div class="box-header with-border">
              <h4 class="box-title label label-default">Daftar Jemaat</h4>
          </div>
          <div class="box-body">
            <?php Pjax::begin(); ?>    <?= GridView::widget([
                    'id' => 'gridViewDaftarJemaat',
                    'dataProvider' => $downLineDataProvider,
                    'summary' => '',
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],
                        //'id',
                        ['attribute' => 'nama', 'value' => 'namaFull'],
                        //'superNamaFull',
                        // 'statusJemaatNama',
                        [
                            'class' => 'yii\grid\ActionColumn',
                            'template' => '{view}',                     
                        ],
                    ],
                    'emptyText' => 'Tidak ada data',
                ]); ?>
            <?php Pjax::end(); ?>
          </div>
        </div>        
        <?php
        }
        ?>

        <!-- ================================================ -->
        <!-- Jemaat Details                                   -->
        <!-- ================================================ -->        

        <div id="sectionDetail" class="box box-primary">
          <div class="box-header with-border">                        
                <h4 class="box-title label label-default">Informasi</h4>
                <div class="box-tools pull-right">
                <?= $canCreateUpdate ? 
                      ($modelJemaatDetails->isNewRecord ? 
                          Html::button('<i class="glyphicon glyphicon-pencil"></i> <b>Update</b>',
                                       ['value' => Url::to('index.php?r=jemaat-details/create-for&jemaatId=' . $model->id), 
                                        'class' => 'btn btn-box-tool btn-sm btn-update-create', 
                                        'id' => 'buttonUpdateJemaatDetails']) :
                          Html::button('<i class="glyphicon glyphicon-pencil"></i> <b>Update</b>',
                                       ['value' => Url::to('index.php?r=jemaat-details/update-for&id=' . $modelJemaatDetails->id), 
                                        'class' => 'btn btn-box-tool btn-sm btn-update-create', 
                                        'id' => 'buttonUpdateJemaatDetails'])) : ''
                ?>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="box-body">    
              <strong><i class="fa fa-map-marker margin-r-5"></i> Alamat</strong>

              <p class="text-muted">
                <?= $modelJemaatDetails->alamat_jalan . "</br>" . 
                    $modelJemaatDetails->alamat_desa_kelurahan . ", " . $modelJemaatDetails->alamat_kecamatan . "</br>" .
                    $modelJemaatDetails->alamat_kota_kabupaten . "</br>" . 
                    $modelJemaatDetails->alamat_provinsi . ", " . $modelJemaatDetails->alamat_kodepos ?>
              </p>

              <hr>

              <dl>
                <dt><i class="fa fa-phone"></i> Telepon</dt>
                <dd>
                  <?= empty($modelJemaatDetails->telp) ? 'Tidak ada' : $modelJemaatDetails->telp?>
                </dd>
                <dt><i class="fa fa-fax"></i> Fax</dt>
                <dd>
                  <?= empty($modelJemaatDetails->fax) ? 'Tidak ada' : $modelJemaatDetails->fax?>
                </dd>
                <dt><i class="fa fa-at"></i> Email</dt>
                <dd>
                  <?= empty($modelJemaatDetails->email) ? 'Tidak ada' : Html::mailto(Html::encode($modelJemaatDetails->email), $modelJemaatDetails->email)?>
                </dd>
                <dt><i class="fa fa-globe"></i> Website</dt>
                <dd>
                  <?= empty($modelJemaatDetails->website) ? 'Tidak ada' : 
                      Html::a(Html::encode($modelJemaatDetails->website) . ' <i class="fa fa-external-link"></i>', 
                        $modelJemaatDetails->website, ['target' => '_blank']) ?>
                </dd>
              </dl>

              <hr>
            </div> <!-- box-body -->
        </div> <!-- sectionDetail -->

        <!-- ================================================ -->
        <!-- Peta                                             -->
        <!-- ================================================ -->              

        <div id="sectionGeoLoc" class="box box-solid">
          <div class="box-header with-border">                        
                <h4 class="box-title pull-left">Peta Lokasi</h4>
                <div class="clearfix"></div>            
            </div>
            <div class="box-body">        
                <div id="map" style="height:300px;" class="col-sm-12"></div>
            </div>              
        </div>             

        <!-- ================================================ -->
        <!-- Jemaat Sejarah                                   -->
        <!-- ================================================ --> 

        <div id="sectionSejarah" class="box box-primary">
          <div class="box-header with-border">                        
                <h4 class="box-title pull-left label label-default">Sejarah</h4>
                <div class="box-tools pull-right">
                <?= $canCreateUpdate ?
                      ($modelJemaatHistory->isNewRecord ? 
                        Html::button('<i class="glyphicon glyphicon-pencil"></i> <b>Update</b>',
                                     ['value' => Url::to('index.php?r=jemaat-history/create-for&jemaatId=' . $model->id), 
                                      'class' => 'btn btn-box-tool btn-sm btn-update-create', 
                                      'id' => 'buttonUpdateRiwayatHidup']) :
                        Html::button('<i class="glyphicon glyphicon-pencil"></i> <b>Update</b>',
                                     ['value' => Url::to('index.php?r=jemaat-history/update-for&id=' . $modelJemaatHistory->id), 
                                      'class' => 'btn btn-box-tool btn-sm btn-update-create', 
                                      'id' => 'buttonUpdateRiwayatHidup'])) : ''
                ?>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="box-body">    
              <ul class="timeline">

                <?php
                  foreach ($modelJemaatHistory as $nameHistory => $valueHistory) {
                    if (!in_array($nameHistory, ['id', 'jemaat_id', 'narasi'])) {
                ?>
                      <li class="time-label">
                        <span class="bg-red">
                          <?= $valueHistory ?>
                        </span>
                      </li>
                      <li>
                        <i class="fa fa-check bg-blue"></i>
                        <div class="timeline-item">
                          <h3 class="timeline-header"><?= $modelJemaatHistory->getAttributeLabel($nameHistory) ?></h3>
                        </div>
                      </li>   
                <?php 
                    }
                  } 
                ?>             

                <li>
                  <i class="fa fa-clock-o bg-gray"></i>
                </li>
              </ul>
            </div>
        </div> <!-- section sejarah -->

        <!-- ================================================ -->
        <!-- Jemaat Demografi                                 -->
        <!-- ================================================ -->           

        <div id="sectionDemografi" class="box box-primary">
          <div class="box-header with-border">                        
                <h4 class="box-title pull-left label label-default">Demografi Jemaat</h4>
                <div class="box-tools pull-right">
                <?= $canCreateUpdate ?
                      (empty($modelJemaatDemografi->id) ? 
                        Html::button('<i class="glyphicon glyphicon-pencil"></i> <b>Update</b>',
                                     ['value' => Url::to('index.php?r=jemaat-demografi/create-for&jemaatId=' . $model->id), 
                                      'class' => 'btn btn-box-tool btn-sm btn-update-create', 
                                      'id' => 'buttonUpdateRiwayatHidup']) :
                        Html::button('<i class="glyphicon glyphicon-pencil"></i> <b>Update</b>',
                                     ['value' => Url::to('index.php?r=jemaat-demografi/update-for&id=' . $modelJemaatDemografi->id), 
                                      'class' => 'btn btn-box-tool btn-sm btn-update-create', 
                                      'id' => 'buttonUpdateRiwayatHidup'])) : ''
                ?>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="box-body">    

                <h5><strong><i class="fa fa-briefcase margin-r-5"></i> <?= $modelJemaatDemografi->getAttributeLabel('mayoritas_pekerjaan') ?> </strong></h5>
                <p>
                  <?php
                  if (!empty($modelJemaatDemografi->mayoritas_pekerjaan)) {
                    foreach ((explode(', ', $modelJemaatDemografi->mayoritas_pekerjaan)) as $pekerjaan) {
                  ?>
                    <span class="label label-danger"><?=$pekerjaan?></span>
                  <?php
                    }
                  }
                  ?>
                </p>                
                <p class="text-muted">
                  <?= $modelJemaatDemografi->keterangan_pekerjaan ?>
                </p>

                <hr>

                <h5><strong><i class="fa fa-graduation-cap margin-r-5"></i> <?= $modelJemaatDemografi->getAttributeLabel('mayoritas_pendidikan') ?> </strong></h5>
                <p>
                  <?php
                  if (!empty($modelJemaatDemografi->mayoritas_pendidikan)) {
                    foreach ((explode(', ', $modelJemaatDemografi->mayoritas_pendidikan)) as $pendidikan) {
                  ?>
                    <span class="label label-success"><?=$pendidikan?></span>
                  <?php
                    }
                  }
                  ?>
                </p>                
                <p class="text-muted">
                  <?= $modelJemaatDemografi->keterangan_pendidikan ?>
                </p>

                <hr>

                <h5><strong><i class="fa fa-money margin-r-5"></i> <?= $modelJemaatDemografi->getAttributeLabel('mayoritas_ekonomi') ?> </strong></h5>
                <p>
                  <?php
                  if (!empty($modelJemaatDemografi->mayoritas_ekonomi)) {
                    foreach ((explode(', ', $modelJemaatDemografi->mayoritas_ekonomi)) as $ekonomi) {
                  ?>
                    <span class="label label-warning"><?=$ekonomi?></span>
                  <?php
                    }
                  }
                  ?>
                </p>                
                <p class="text-muted">
                  <?= $modelJemaatDemografi->keterangan_ekonomi ?>
                </p>

                <hr>

                <h5><strong><i class="fa fa-asterisk margin-r-5"></i> <?= $modelJemaatDemografi->getAttributeLabel('mayoritas_agama') ?> </strong></h5>
                <p>
                  <?php
                  if (!empty($modelJemaatDemografi->mayoritas_agama)) {
                    foreach ((explode(', ', $modelJemaatDemografi->mayoritas_agama)) as $agama) {
                  ?>
                   <span class="label label-info"><?=$agama?></span>
                  <?php
                    }
                  }
                  ?>
                </p>                
                <p class="text-muted">
                  <?= $modelJemaatDemografi->keterangan_agama ?>
                </p>

                <hr>

                <h5><strong><i class="fa fa-eye margin-r-5"></i> <?= $modelJemaatDemografi->getAttributeLabel('mayoritas_budaya') ?> </strong></h5>
                <p>
                  <?php
                  if (!empty($modelJemaatDemografi->mayoritas_budaya)) {
                    foreach ((explode(', ', $modelJemaatDemografi->mayoritas_budaya)) as $budaya) {
                  ?>
                    <span class="label label-primary"><?=$budaya?></span>
                  <?php
                    }
                  }
                  ?>
                </p>                
                <p class="text-muted">
                  <?= $modelJemaatDemografi->keterangan_budaya ?>
                </p>

                <hr>                
            </div>
        </div> <!-- section demografi -->     
      </div> <!-- main left column -->

      <!-- ================================================ -->
      <!-- Main Right Column                                -->
      <!-- ================================================ -->   

      <div class="col-md-8">

        <!-- ================================================ -->
        <!-- Narasi                                             -->
        <!-- ================================================ -->                    

        <div class="box box-solid">
          <div class="box-header with-border">
            <h3 class="box-title">Narasi/Tentang Jemaat</h3>
            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
              <?= $canCreateUpdate ? 
                    ($modelJemaatHistory->isNewRecord ? 
                      Html::button('<i class="glyphicon glyphicon-pencil"></i> <b>Update</b>',
                                   ['value' => Url::to('index.php?r=jemaat-history/create-for-narasi&jemaatId=' . $model->id), 
                                    'class' => 'btn btn-box-tool btn-sm btn-update-create', 
                                    'id' => 'buttonUpdateRiwayatHidup']) :
                      Html::button('<i class="glyphicon glyphicon-pencil"></i> <b>Update</b>',
                                   ['value' => Url::to('index.php?r=jemaat-history/update-for-narasi&id=' . $modelJemaatHistory->id), 
                                    'class' => 'btn btn-box-tool btn-sm btn-update-create', 
                                    'id' => 'buttonUpdateRiwayatHidup'])) : ''
              ?>              
              </button>
            </div>            
          </div>
          <!-- /.box-header -->
          <div class="box-body">
          <div>
          <?= $modelJemaatHistory->narasi?>
          </div>
          </div>
          <!-- /.box-body -->
        </div> 

        <!-- ================================================ -->
        <!-- Foto                                             -->
        <!-- ================================================ -->                    

        <div class="box box-solid">
          <div class="box-header with-border">
            <h3 class="box-title">Foto-foto</h3>
            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>            
               <?= $canCreateUpdate ? Html::button('<i class="glyphicon glyphicon-plus"></i> <b>Tambah</b>',
                   ['value' => Url::to('index.php?r=jemaat-photos/create-for&jemaatId=' . $model->id), 
                    'class' => 'btn btn-box-tool btn-sm btn-update-create', 
                    'id' => 'buttonAddFoto']) : ''?>
            </div>            
          </div>
          <!-- /.box-header -->
          <div class="box-body">            
            <?php 
                if (empty($modelPhotos)) {
                  echo Html::well( '<b>Belum ada foto!</b><br><br>' .
                  $canCreateUpdate ? Html::button('<i class="glyphicon glyphicon-plus"></i> <b>Tambah</b>',
                   ['value' => Url::to('index.php?r=jemaat-photos/create-for&jemaatId=' . $model->id), 
                    'class' => 'btn btn-default btn-sm btn-update-create', 
                    'id' => 'buttonAddFoto']) : ''
                    , kartik\helpers\Html::SIZE_TINY, ['class' => 'btn-block text-muted text-center']);
                } else {
                  echo dosamigos\gallery\Carousel::widget([
                  'items' => $modelPhotos, 
                  'json' => true,
                  'clientEvents' => [
                      'onslide' => 'function(index, slide) {
                          console.log(slide);
                      }']]);
                }
            ?>
          </div>
          <!-- /.box-body -->
        </div>        

        <!-- ================================================ -->
        <!-- Kegiatan Tabs                                    -->
        <!-- ================================================ -->         

        <div class="nav-tabs-custom">
          <ul id="sectionKegiatanTab" class="nav nav-tabs pull-right">
            <li class="active"><a data-toggle="tab" href="#sectionKegiatanKebaktian">Kebaktian/Persekutuan</a></li>
            <li class=""><a data-toggle="tab" href="#sectionKegiatanKategorial">Kategorial</a></li>
            <li class=""><a data-toggle="tab" href="#sectionProgram">Program Jemaat</a></li>            
            <li class="pull-left header"><i class="fa fa-th"></i> Kegiatan</li>
          </ul>

          <div class="tab-content">

            <!-- ================================================ -->
            <!-- Kebaktian/Persekutuan                            -->
            <!-- ================================================ -->         

            <div id="sectionKegiatanKebaktian" class="tab-pane fade in active">
    
              <div class="nav-tabs-custom">
                <ul id="sectionKebaktianTab" class="nav nav-tabs">
                  <li class="active"><a data-toggle="tab" href="#sectionKebaktianMinggu">Kebaktian Minggu</a></li>
                  <li class=""><a data-toggle="tab" href="#sectionPartonggoan">Partonggoan</a></li>
                </ul>
              </div>

              <div class="tab-content">
                <div id="sectionKebaktianMinggu" class="box box-warning tab-pane fade in active">
                  <div class="clearfix"></div>
                  <div class="box-header with-border">                        
                        <h4 class="box-title pull-left">Kebaktian Minggu</h4>
                        <div class="box-tools pull-right">
                           <?= $canCreateUpdate ? Html::button('<i class="glyphicon glyphicon-plus"></i> <b>Tambah</b>',
                               ['value' => Url::to('index.php?r=jemaat-kebaktian-minggu/create-for&jemaatId=' . $model->id), 
                                'class' => 'btn btn-box-tool btn-sm btn-update-create', 
                                'id' => 'buttonAddKebaktianMinggu']) : '' ?>
                        </div>
                        <div class="clearfix"></div>
                  </div>
                  <div class="box-body">  
                    <?php Pjax::begin(); ?>    
                    <?= GridView::widget([
                        'id' => 'gridViewKebaktian',
                        'dataProvider' => $kebaktianMingguDataProvider,
                        'summary' => '',
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],
                            'jam',
                            'bahasa',
                            [
                                'class' => 'yii\grid\ActionColumn',
                                'template' => $canCreateUpdate ? '{view} {update-for}' : '{view}',
                                'urlCreator' => function ($action, $model, $key, $index) {
                                    return'index.php?r=jemaat-kebaktian-minggu/'. $action . '&id=' . $model->id;
                                },
                                'buttons' => [
                                        'view' => function ($url, $model) {
                                            return Html::button('<i class="glyphicon glyphicon-eye-open"></i>',
                                                    ['value' => $url, 
                                                     'class' => 'btn btn-xs btn-success btn-view']);
                                        },
                                        'update-for' => function ($url, $model) {
                                            return Html::button('<i class="glyphicon glyphicon-pencil"></i>',
                                                    ['value' => $url, 
                                                     'class' => 'btn btn-xs btn-warning btn-update-create']);
                                        }                                                                          
                                ]                        
                            ],
                        ],
                    ]); ?>
                    <?php Pjax::end(); ?>  
                  </div>
                </div>    

                <div id="sectionPartonggoan" class="box box-success tab-pane fade in">
                  <div class="clearfix"></div>
                  <div class="box-header with-border">                        
                        <h4 class="box-title pull-left">Partonggoan</h4>
                        <div class="box-tools pull-right">
                           <?= $canCreateUpdate ? Html::button('<i class="glyphicon glyphicon-plus"></i> <b>Tambah</b>',
                               ['value' => Url::to('index.php?r=jemaat-kebaktian-sektor/create-for&jemaatId=' . $model->id), 
                                'class' => 'btn btn-box-tool btn-sm btn-update-create', 
                                'id' => 'buttonAddKebaktianSektor']) : '' ?>                   
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="box-body">    
                      <?php Pjax::begin(); ?>  
                      <?= GridView::widget([
                          'id' => 'gridViewPartonggoan',
                          'dataProvider' => $kebaktianSektorDataProvider,
                          'summary' => '',
                          'columns' => [
                              ['class' => 'yii\grid\SerialColumn'],
                              'nama_sektor',
                              'hari',
                              'jam',
                              [
                                  'class' => 'yii\grid\ActionColumn',
                                  'template' => $canCreateUpdate ? '{view} {update-for}' : '{view}',
                                  'urlCreator' => function ($action, $model, $key, $index) {
                                      return'index.php?r=jemaat-kebaktian-sektor/'. $action . '&id=' . $model->id;
                                  },
                                  'buttons' => [
                                          'view' => function ($url, $model) {
                                              return Html::button('<i class="glyphicon glyphicon-eye-open"></i>',
                                                      ['value' => $url, 
                                                       'class' => 'btn btn-xs btn-success btn-view']);
                                          },
                                          'update-for' => function ($url, $model) {
                                              return Html::button('<i class="glyphicon glyphicon-pencil"></i>',
                                                      ['value' => $url, 
                                                       'class' => 'btn btn-xs btn-warning btn-update-create']);
                                          }                                                                          
                                  ]                        
                              ],
                          ],
                      ]); ?>
                      <?php Pjax::end(); ?>  
                    </div>
                </div>     
              </div> <!-- tab-content -->  
            </div> <!-- section kebaktian -->

            <!-- ================================================ -->
            <!-- Kategorial                                       -->
            <!-- ================================================ -->  

            <div id="sectionKegiatanKategorial" class="tab-pane fade in">   

              <div class="nav-tabs-custom">
                <ul id="sectionKegiatanTab" class="nav nav-tabs">
                  <li class="active"><a data-toggle="tab" href="#sectionSekolahMinggu">Sekolah Minggu</a></li>
                  <li class=""><a data-toggle="tab" href="#sectionRemaja">Remaja</a></li>            
                  <li class=""><a data-toggle="tab" href="#sectionPemuda">Pemuda</a></li>
                  <li class=""><a data-toggle="tab" href="#sectionBapa">Bapa</a></li>
                  <li class=""><a data-toggle="tab" href="#sectionWanita">Wanita</a></li>
                  <li class=""><a data-toggle="tab" href="#sectionLansia">Lanjut Usia</a></li>
                  <li class=""><a data-toggle="tab" href="#sectionProfesi">Profesi</a></li>
                  <li class=""><a data-toggle="tab" href="#sectionMajelis">Majelis Jemaat</a></li>
                </ul>
              </div>

              <div class="tab-content">
                <div id="sectionSekolahMinggu" class="panel panel-warning tab-pane fade in active">
                  <div class="clearfix"></div>
                  <div class="box-header with-border">                        
                        <h4 class="box-title pull-left">Sekolah Minggu</h4>
                        <div class="box-tools pull-right">
                          <?= $canCreateUpdate ? Html::button('<i class="glyphicon glyphicon-plus"></i> <b>Tambah</b>',
                             ['value' => Url::to('index.php?r=jemaat-kategorial/create-for&jemaatId=' . $model->id . '&kategorialId=1'), 
                              'class' => 'btn btn-box-tool btn-sm btn-update-create', 
                              'id' => 'buttonAddSekolahMinggu']) : '' ?>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="box-body">
                      <?php Pjax::begin(); ?>      
                      <?= GridView::widget([
                          'id' => 'gridViewSekolahMinggu',
                          'dataProvider' => $sekolahMingguDataProvider,
                          'summary' => '',
                          'columns' => [
                              ['class' => 'yii\grid\SerialColumn'],

                              'kegiatan.nama_kegiatan',
                              'tempat',
                              'hari',
                              'jadwal',
                              'jam',
                              // 'keterangan',
                              [
                                  'class' => 'yii\grid\ActionColumn',
                                  'template' => $canCreateUpdate ? '{view} {update-for}' : '{view}',
                                  'urlCreator' => function ($action, $model, $key, $index) {
                                      return'index.php?r=jemaat-kategorial/'. $action . '&id=' . $model->id . '&kategorialId=1';
                                  },
                                  'buttons' => [
                                          'view' => function ($url, $model) {
                                              return Html::button('<i class="glyphicon glyphicon-eye-open"></i>',
                                                      ['value' => $url, 
                                                       'class' => 'btn btn-xs btn-success btn-view']);
                                          },
                                          'update-for' => function ($url, $model) {
                                              return Html::button('<i class="glyphicon glyphicon-pencil"></i>',
                                                      ['value' => $url, 
                                                       'class' => 'btn btn-xs btn-warning btn-update-create']);
                                          }                                                                          
                                  ]                                        
                              ],
                          ],
                      ]); ?>
                      <?php Pjax::end(); ?>  
                    </div>
                </div>    

                <div id="sectionRemaja" class="panel panel-warning tab-pane fade in">
                  <div class="clearfix"></div>
                  <div class="box-header with-border">                        
                        <h4 class="box-title pull-left">Remaja</h4>
                        <div class="box-tools pull-right">
                          <?= $canCreateUpdate ? Html::button('<i class="glyphicon glyphicon-plus"></i> <b>Tambah</b>',
                             ['value' => Url::to('index.php?r=jemaat-kategorial/create-for&jemaatId=' . $model->id . '&kategorialId=2'), 
                              'class' => 'btn btn-box-tool btn-sm btn-update-create', 
                              'id' => 'buttonAddRemaja']) : ''?>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="box-body">    
                      <?php Pjax::begin(); ?>  
                      <?= GridView::widget([
                          'id' => 'gridViewRemaja',
                          'dataProvider' => $remajaDataProvider,
                          'summary' => '',
                          'columns' => [
                              ['class' => 'yii\grid\SerialColumn'],

                              'kegiatan.nama_kegiatan',
                              'tempat',
                              'hari',
                              'jadwal',
                              'jam',
                              // 'keterangan',
                              [
                                  'class' => 'yii\grid\ActionColumn',
                                  'template' => $canCreateUpdate ? '{view} {update-for}' : '{view}',
                                  'urlCreator' => function ($action, $model, $key, $index) {
                                      return'index.php?r=jemaat-kategorial/'. $action . '&id=' . $model->id . '&kategorialId=2';
                                  },
                                  'buttons' => [
                                          'view' => function ($url, $model) {
                                              return Html::button('<i class="glyphicon glyphicon-eye-open"></i>',
                                                      ['value' => $url, 
                                                       'class' => 'btn btn-xs btn-success btn-view']);
                                          },
                                          'update-for' => function ($url, $model) {
                                              return Html::button('<i class="glyphicon glyphicon-pencil"></i>',
                                                      ['value' => $url, 
                                                       'class' => 'btn btn-xs btn-warning btn-update-create']);
                                          }                                                                          
                                  ]                                        
                              ],
                          ],
                      ]); ?>
                      <?php Pjax::end(); ?>  
                    </div>
                </div> 

                <div id="sectionPemuda" class="panel panel-warning tab-pane fade in">
                  <div class="clearfix"></div>
                  <div class="box-header with-border">                        
                        <h4 class="box-title pull-left">Pemuda</h4>
                        <div class="box-tools pull-right">
                          <?= $canCreateUpdate ? Html::button('<i class="glyphicon glyphicon-plus"></i> <b>Tambah</b>',
                             ['value' => Url::to('index.php?r=jemaat-kategorial/create-for&jemaatId=' . $model->id . '&kategorialId=3'), 
                              'class' => 'btn btn-box-tool btn-sm btn-update-create', 
                              'id' => 'buttonAddPemuda']) : ''?>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="box-body">    
                      <?php Pjax::begin(); ?>  
                      <?= GridView::widget([
                          'id' => 'gridViewPemuda',
                          'dataProvider' => $pemudaDataProvider,
                          'summary' => '',
                          'columns' => [
                              ['class' => 'yii\grid\SerialColumn'],

                              'kegiatan.nama_kegiatan',
                              'tempat',
                              'hari',
                              'jadwal',
                              'jam',
                              // 'keterangan',
                              [
                                  'class' => 'yii\grid\ActionColumn',
                                  'template' => $canCreateUpdate ? '{view} {update-for}' : '{view}',
                                  'urlCreator' => function ($action, $model, $key, $index) {
                                      return'index.php?r=jemaat-kategorial/'. $action . '&id=' . $model->id . '&kategorialId=3';
                                  },
                                  'buttons' => [
                                          'view' => function ($url, $model) {
                                              return Html::button('<i class="glyphicon glyphicon-eye-open"></i>',
                                                      ['value' => $url, 
                                                       'class' => 'btn btn-xs btn-success btn-view']);
                                          },
                                          'update-for' => function ($url, $model) {
                                              return Html::button('<i class="glyphicon glyphicon-pencil"></i>',
                                                      ['value' => $url, 
                                                       'class' => 'btn btn-xs btn-warning btn-update-create']);
                                          }                                                                          
                                  ]                                        
                              ],
                          ],
                      ]); ?>
                      <?php Pjax::end(); ?>  
                    </div>
                </div>           


                <div id="sectionBapa" class="panel panel-warning tab-pane fade in">
                  <div class="clearfix"></div>
                  <div class="box-header with-border">                        
                        <h4 class="box-title pull-left">Bapa</h4>
                        <div class="box-tools pull-right">
                          <?= $canCreateUpdate ? Html::button('<i class="glyphicon glyphicon-plus"></i> <b>Tambah</b>',
                             ['value' => Url::to('index.php?r=jemaat-kategorial/create-for&jemaatId=' . $model->id . '&kategorialId=4'), 
                              'class' => 'btn btn-box-tool btn-sm btn-update-create', 
                              'id' => 'buttonAddBapa']) : ''?>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="box-body">    
                      <?php Pjax::begin(); ?>  
                      <?= GridView::widget([
                          'id' => 'gridViewBapa',
                          'dataProvider' => $bapaDataProvider,
                          'summary' => '',
                          'columns' => [
                              ['class' => 'yii\grid\SerialColumn'],

                              'kegiatan.nama_kegiatan',
                              'tempat',
                              'hari',
                              'jadwal',
                              'jam',
                              // 'keterangan',
                              [
                                  'class' => 'yii\grid\ActionColumn',
                                  'template' => $canCreateUpdate ? '{view} {update-for}' : '{view}',
                                  'urlCreator' => function ($action, $model, $key, $index) {
                                      return'index.php?r=jemaat-kategorial/'. $action . '&id=' . $model->id . '&kategorialId=4';
                                  },
                                  'buttons' => [
                                          'view' => function ($url, $model) {
                                              return Html::button('<i class="glyphicon glyphicon-eye-open"></i>',
                                                      ['value' => $url, 
                                                       'class' => 'btn btn-xs btn-success btn-view']);
                                          },
                                          'update-for' => function ($url, $model) {
                                              return Html::button('<i class="glyphicon glyphicon-pencil"></i>',
                                                      ['value' => $url, 
                                                       'class' => 'btn btn-xs btn-warning btn-update-create']);
                                          }                                                                          
                                  ]                                        
                              ],
                          ],
                      ]); ?>
                      <?php Pjax::end(); ?>  
                    </div>
                </div>      

                <div id="sectionWanita" class="panel panel-warning tab-pane fade in">
                  <div class="clearfix"></div>
                  <div class="box-header with-border">                        
                        <h4 class="box-title pull-left">Wanita</h4>
                        <div class="box-tools pull-right">
                          <?= $canCreateUpdate ? Html::button('<i class="glyphicon glyphicon-plus"></i> <b>Tambah</b>',
                                           ['value' => Url::to('index.php?r=jemaat-kategorial/create-for&jemaatId=' . $model->id . '&kategorialId=5'), 
                                            'class' => 'btn btn-box-tool btn-sm btn-update-create', 
                                            'id' => 'buttonAddWanita']) : ''?>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="box-body">    
                      <?php Pjax::begin(); ?>  
                      <?= GridView::widget([
                          'id' => 'gridViewWanita',
                          'dataProvider' => $wanitaDataProvider,
                          'summary' => '',
                          'columns' => [
                              ['class' => 'yii\grid\SerialColumn'],

                              'kegiatan.nama_kegiatan',
                              'tempat',
                              'hari',
                              'jadwal',
                              'jam',
                              // 'keterangan',
                              [
                                  'class' => 'yii\grid\ActionColumn',
                                  'template' => $canCreateUpdate ? '{view} {update-for}' : '{view}',
                                  'urlCreator' => function ($action, $model, $key, $index) {
                                      return'index.php?r=jemaat-kategorial/'. $action . '&id=' . $model->id . '&kategorialId=5';
                                  },
                                  'buttons' => [
                                          'view' => function ($url, $model) {
                                              return Html::button('<i class="glyphicon glyphicon-eye-open"></i>',
                                                      ['value' => $url, 
                                                       'class' => 'btn btn-xs btn-success btn-view']);
                                          },
                                          'update-for' => function ($url, $model) {
                                              return Html::button('<i class="glyphicon glyphicon-pencil"></i>',
                                                      ['value' => $url, 
                                                       'class' => 'btn btn-xs btn-warning btn-update-create']);
                                          }                                                                          
                                  ]                                        
                              ],
                          ],
                      ]); ?>
                      <?php Pjax::end(); ?>  
                    </div>
                </div>               

                <div id="sectionLansia" class="panel panel-warning tab-pane fade in">
                  <div class="clearfix"></div>
                  <div class="box-header with-border">                        
                        <h4 class="box-title pull-left">Lanjut Usia</h4>
                        <div class="box-tools pull-right">
                          <?= $canCreateUpdate ? Html::button('<i class="glyphicon glyphicon-plus"></i> <b>Tambah</b>',
                                           ['value' => Url::to('index.php?r=jemaat-kategorial/create-for&jemaatId=' . $model->id . '&kategorialId=6'), 
                                            'class' => 'btn btn-box-tool btn-sm btn-update-create', 
                                            'id' => 'buttonAddLansia']) : '' ?>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="box-body">
                      <?php Pjax::begin(); ?>      
                      <?= GridView::widget([
                          'id' => 'gridViewLansia',
                          'dataProvider' => $lansiaDataProvider,
                          'summary' => '',
                          'columns' => [
                              ['class' => 'yii\grid\SerialColumn'],

                              'kegiatan.nama_kegiatan',
                              'tempat',
                              'hari',
                              'jadwal',
                              'jam',
                              // 'keterangan',
                              [
                                  'class' => 'yii\grid\ActionColumn',
                                  'template' => $canCreateUpdate ? '{view} {update-for}' : '{view}',
                                  'urlCreator' => function ($action, $model, $key, $index) {
                                      return'index.php?r=jemaat-kategorial/'. $action . '&id=' . $model->id . '&kategorialId=6';
                                  },
                                  'buttons' => [
                                          'view' => function ($url, $model) {
                                              return Html::button('<i class="glyphicon glyphicon-eye-open"></i>',
                                                      ['value' => $url, 
                                                       'class' => 'btn btn-xs btn-success btn-view']);
                                          },
                                          'update-for' => function ($url, $model) {
                                              return Html::button('<i class="glyphicon glyphicon-pencil"></i>',
                                                      ['value' => $url, 
                                                       'class' => 'btn btn-xs btn-warning btn-update-create']);
                                          }                                                                          
                                  ]                                        
                              ],
                          ],
                      ]); ?>
                      <?php Pjax::end(); ?>  
                    </div>
                </div>                            

                <div id="sectionProfesi" class="panel panel-warning tab-pane fade in">
                  <div class="clearfix"></div>
                  <div class="box-header with-border">                        
                        <h4 class="box-title pull-left">Profesi/Dewasa</h4>
                        <div class="box-tools pull-right">
                          <?= $canCreateUpdate ? Html::button('<i class="glyphicon glyphicon-plus"></i> <b>Tambah</b>',
                                           ['value' => Url::to('index.php?r=jemaat-kategorial/create-for&jemaatId=' . $model->id . '&kategorialId=7'), 
                                            'class' => 'btn btn-box-tool btn-sm btn-update-create', 
                                            'id' => 'buttonAddProfesi']) : '' ?>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="box-body">  
                      <?php Pjax::begin(); ?>    
                      <?= GridView::widget([
                          'id' => 'gridViewDewasa',
                          'dataProvider' => $profesiDataProvider,
                          'summary' => '',
                          'columns' => [
                              ['class' => 'yii\grid\SerialColumn'],

                              'kegiatan.nama_kegiatan',
                              'tempat',
                              'hari',
                              'jadwal',
                              'jam',
                              // 'keterangan',
                              [
                                  'class' => 'yii\grid\ActionColumn',
                                  'template' => $canCreateUpdate ? '{view} {update-for}' : '{view}',
                                  'urlCreator' => function ($action, $model, $key, $index) {
                                      return'index.php?r=jemaat-kategorial/'. $action . '&id=' . $model->id . '&kategorialId=7';
                                  },
                                  'buttons' => [
                                          'view' => function ($url, $model) {
                                              return Html::button('<i class="glyphicon glyphicon-eye-open"></i>',
                                                      ['value' => $url, 
                                                       'class' => 'btn btn-xs btn-success btn-view']);
                                          },
                                          'update-for' => function ($url, $model) {
                                              return Html::button('<i class="glyphicon glyphicon-pencil"></i>',
                                                      ['value' => $url, 
                                                       'class' => 'btn btn-xs btn-warning btn-update-create']);
                                          }                                                                          
                                  ]                                        
                              ],
                          ],
                      ]); ?>
                      <?php Pjax::end(); ?>  
                    </div>
                </div>       

                <div id="sectionMajelis" class="panel panel-warning tab-pane fade in">
                  <div class="clearfix"></div>
                  <div class="box-header with-border">                        
                        <h4 class="box-title pull-left">Majelis Jemaat</h4>
                        <div class="box-tools pull-right">
                          <?= $canCreateUpdate ? Html::button('<i class="glyphicon glyphicon-plus"></i> <b>Tambah</b>',
                                           ['value' => Url::to('index.php?r=jemaat-kategorial/create-for&jemaatId=' . $model->id . '&kategorialId=8'), 
                                            'class' => 'btn btn-box-tool btn-sm btn-update-create', 
                                            'id' => 'buttonAddMajelis']) : ''?>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="box-body">    
                      <?php Pjax::begin(); ?>  
                      <?= GridView::widget([
                          'id' => 'gridViewMajelisJemaat',
                          'dataProvider' => $majelisDataProvider,
                          'summary' => '',
                          'columns' => [
                              ['class' => 'yii\grid\SerialColumn'],

                              'kegiatan.nama_kegiatan',
                              'tempat',
                              'hari',
                              'jadwal',
                              'jam',
                              // 'keterangan',
                              [
                                  'class' => 'yii\grid\ActionColumn',
                                  'template' => $canCreateUpdate ? '{view} {update-for}' : '{view}',
                                  'urlCreator' => function ($action, $model, $key, $index) {
                                      return'index.php?r=jemaat-kategorial/'. $action . '&id=' . $model->id . '&kategorialId=8';
                                  },
                                  'buttons' => [
                                          'view' => function ($url, $model) {
                                              return Html::button('<i class="glyphicon glyphicon-eye-open"></i>',
                                                      ['value' => $url, 
                                                       'class' => 'btn btn-xs btn-success btn-view']);
                                          },
                                          'update-for' => function ($url, $model) {
                                              return Html::button('<i class="glyphicon glyphicon-pencil"></i>',
                                                      ['value' => $url, 
                                                       'class' => 'btn btn-xs btn-warning btn-update-create']);
                                          }                                                                          
                                  ]                                        
                              ],
                          ],
                      ]); ?>
                      <?php Pjax::end(); ?>  
                    </div>
                </div> 

              </div>     
            </div>  <!-- section kategorial -->

            <!-- ================================================ -->
            <!-- Program Jemaat                                   -->
            <!-- ================================================ -->        

            <div id="sectionProgram" class="tab-pane fade in">
              <div class="nav-tabs-custom">
                <ul id="sectionProgramTab" class="nav nav-tabs">
                  <li class="active"><a data-toggle="tab" href="#sectionPastoral">Pastoral</a></li>
                  <li class=""><a data-toggle="tab" href="#sectionDiakoniaInternal">Diakonia Internal</a></li>            
                  <li class=""><a data-toggle="tab" href="#sectionDiakoniaEksternal">Diakonia Eksternal</a></li>
                  <li class=""><a data-toggle="tab" href="#sectionKesaksian">Kesaksian</a></li>
                </ul>
              </div>

              <div class="tab-content">
                <div id="sectionPastoral" class="panel panel-warning tab-pane fade in active">
                  <div class="clearfix"></div>
                  <div class="box-header with-border">                        
                        <h4 class="box-title pull-left">Pastoral</h4>
                        <div class="box-tools pull-right">
                          <?= $canCreateUpdate ? Html::button('<i class="glyphicon glyphicon-plus"></i> <b>Tambah</b>',
                                           ['value' => Url::to('index.php?r=jemaat-program/create-for&jemaatId=' . $model->id . '&bidangId=1'), 
                                            'class' => 'btn btn-box-tool btn-sm btn-update-create', 
                                            'id' => 'buttonAddPastoral']) : '' ?>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="box-body">    
                      <?php Pjax::begin(); ?>  
                      <?= GridView::widget([
                          'id' => 'gridViewPastoral',
                          'dataProvider' => $pastoralDataProvider,
                          'summary' => '',
                          'columns' => [
                              ['class' => 'yii\grid\SerialColumn'],
                              'program.nama_program',
                              'keterangan:ntext',
                                [
                                  'class' => 'yii\grid\ActionColumn',
                                  'template' => $canCreateUpdate ? '{view} {update-for}' : '{view}',
                                  'urlCreator' => function ($action, $model, $key, $index) {
                                      return'index.php?r=jemaat-program/'. $action . '&id=' . $model->id . '&bidangId=1';
                                  },
                                  'buttons' => [
                                          'view' => function ($url, $model) {
                                              return Html::button('<i class="glyphicon glyphicon-eye-open"></i>',
                                                      ['value' => $url, 
                                                       'class' => 'btn btn-xs btn-success btn-view']);
                                          },
                                          'update-for' => function ($url, $model) {
                                              return Html::button('<i class="glyphicon glyphicon-pencil"></i>',
                                                      ['value' => $url, 
                                                       'class' => 'btn btn-xs btn-warning btn-update-create']);
                                          }                                                                          
                                  ]                                        
                              ],
                          ],
                      ]); ?>
                      <?php Pjax::end(); ?>  
                    </div>
                </div>    
                <div id="sectionDiakoniaInternal" class="panel panel-warning tab-pane fade in">
                  <div class="clearfix"></div>
                  <div class="box-header with-border">                        
                        <h4 class="box-title pull-left">Diakonia Internal</h4>
                        <div class="box-tools pull-right">
                          <?= $canCreateUpdate ? Html::button('<i class="glyphicon glyphicon-plus"></i> <b>Tambah</b>',
                                           ['value' => Url::to('index.php?r=jemaat-program/create-for&jemaatId=' . $model->id . '&bidangId=2'), 
                                            'class' => 'btn btn-box-tool btn-sm btn-update-create', 
                                            'id' => 'buttonAddDiakoniaInternal']) : '' ?>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="box-body">    
                      <?php Pjax::begin(); ?>  
                      <?= GridView::widget([
                          'id' => 'gridViewDiakoniaInternal',
                          'dataProvider' => $diakoniaInternalDataProvider,
                          'summary' => '',
                          'columns' => [
                              ['class' => 'yii\grid\SerialColumn'],
                              'program.nama_program',
                              'keterangan:ntext',
                                [
                                  'class' => 'yii\grid\ActionColumn',
                                  'template' => $canCreateUpdate ? '{view} {update-for}' : '{view}',
                                  'urlCreator' => function ($action, $model, $key, $index) {
                                      return'index.php?r=jemaat-program/'. $action . '&id=' . $model->id . '&bidangId=2';
                                  },
                                  'buttons' => [
                                          'view' => function ($url, $model) {
                                              return Html::button('<i class="glyphicon glyphicon-eye-open"></i>',
                                                      ['value' => $url, 
                                                       'class' => 'btn btn-xs btn-success btn-view']);
                                          },
                                          'update-for' => function ($url, $model) {
                                              return Html::button('<i class="glyphicon glyphicon-pencil"></i>',
                                                      ['value' => $url, 
                                                       'class' => 'btn btn-xs btn-warning btn-update-create']);
                                          }                                                                          
                                  ]                                        
                              ],
                          ],
                      ]); ?>
                      <?php Pjax::end(); ?>  
                    </div>
                </div>       

                <div id="sectionDiakoniaEksternal" class="panel panel-warning tab-pane fade in">
                  <div class="clearfix"></div>
                  <div class="box-header with-border">                        
                        <h4 class="box-title pull-left">Diakonia Eksternal</h4>
                        <div class="box-tools pull-right">
                          <?= $canCreateUpdate ? Html::button('<i class="glyphicon glyphicon-plus"></i> <b>Tambah</b>',
                                           ['value' => Url::to('index.php?r=jemaat-program/create-for&jemaatId=' . $model->id . '&bidangId=3'), 
                                            'class' => 'btn btn-box-tool btn-sm btn-update-create', 
                                            'id' => 'buttonAddDiakoniaEksternal']) : ''?>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="box-body">    
                      <?php Pjax::begin(); ?>  
                      <?= GridView::widget([
                          'id' => 'gridViewDiakoniaEksternal',
                          'dataProvider' => $diakoniaEksternalDataProvider,
                          'summary' => '',
                          'columns' => [
                              ['class' => 'yii\grid\SerialColumn'],
                              'program.nama_program',
                              'keterangan:ntext',
                                [
                                  'class' => 'yii\grid\ActionColumn',
                                  'template' => $canCreateUpdate ? '{view} {update-for}' : '{view}',
                                  'urlCreator' => function ($action, $model, $key, $index) {
                                      return'index.php?r=jemaat-program/'. $action . '&id=' . $model->id . '&bidangId=3';
                                  },
                                  'buttons' => [
                                          'view' => function ($url, $model) {
                                              return Html::button('<i class="glyphicon glyphicon-eye-open"></i>',
                                                      ['value' => $url, 
                                                       'class' => 'btn btn-xs btn-success btn-view']);
                                          },
                                          'update-for' => function ($url, $model) {
                                              return Html::button('<i class="glyphicon glyphicon-pencil"></i>',
                                                      ['value' => $url, 
                                                       'class' => 'btn btn-xs btn-warning btn-update-create']);
                                          }                                                                          
                                  ]                                        
                              ],
                          ],
                      ]); ?>
                      <?php Pjax::end(); ?>  
                    </div>
                </div>  

                <div id="sectionKesaksian" class="panel panel-warning tab-pane fade in">
                  <div class="clearfix"></div>
                  <div class="box-header with-border">                        
                        <h4 class="box-title pull-left">Kesaksian</h4>
                        <div class="box-tools pull-right">
                          <?= $canCreateUpdate ? Html::button('<i class="glyphicon glyphicon-plus"></i> <b>Tambah</b>',
                                           ['value' => Url::to('index.php?r=jemaat-program/create-for&jemaatId=' . $model->id . '&bidangId=4'), 
                                            'class' => 'btn btn-box-tool btn-sm btn-update-create', 
                                            'id' => 'buttonAddKesaksian']) : ''?>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="box-body">   
                      <?php Pjax::begin(); ?>   
                      <?= GridView::widget([
                          'id' => 'gridViewKesaksian',
                          'dataProvider' => $kesaksianDataProvider,
                          'summary' => '',
                          'columns' => [
                              ['class' => 'yii\grid\SerialColumn'],
                              'program.nama_program',
                              'keterangan:ntext',
                                [
                                  'class' => 'yii\grid\ActionColumn',
                                  'template' => $canCreateUpdate ? '{view} {update-for}' : '{view}',
                                  'urlCreator' => function ($action, $model, $key, $index) {
                                      return'index.php?r=jemaat-program/'. $action . '&id=' . $model->id . '&bidangId=4';
                                  },
                                  'buttons' => [
                                          'view' => function ($url, $model) {
                                              return Html::button('<i class="glyphicon glyphicon-eye-open"></i>',
                                                      ['value' => $url, 
                                                       'class' => 'btn btn-xs btn-success btn-view']);
                                          },
                                          'update-for' => function ($url, $model) {
                                              return Html::button('<i class="glyphicon glyphicon-pencil"></i>',
                                                      ['value' => $url, 
                                                       'class' => 'btn btn-xs btn-warning btn-update-create']);
                                          }                                                                          
                                  ]                                        
                              ],
                          ],
                      ]); ?>
                      <?php Pjax::end(); ?>  
                    </div>
                </div>  
              </div>        
            </div> <!-- section program -->
          </div> <!-- tab content -->
        </div> <!-- nav-tabs-custom -->

        <!-- ================================================ -->
        <!-- Porhanger                                        -->
        <!-- ================================================ -->    

        <div id="sectionPorhanger" class="box box-primary">
          <div class="box-header with-border">                        
            <h4 class="box-title pull-left header"><i class="fa fa-user"></i> Pengantar Jemaat</h4>
            <div class="box-tools pull-right">
               <?= $canCreateUpdate ? Html::button('<i class="glyphicon glyphicon-plus"></i> <b>Tambah</b>',
                   ['value' => Url::to('index.php?r=jemaat-porhanger/create-for&jemaatId=' . $model->id), 
                    'class' => 'btn btn-box-tool btn-sm btn-update-create', 
                    'id' => 'buttonAddPorhanger']) : '' ?>
            </div>
            <div class="clearfix"></div>
          </div>
          <div class="box-body">  
            <?php Pjax::begin(); ?>    
            <?= GridView::widget([
                'id' => 'gridViewPorhanger',
                'dataProvider' => $porhangerDataProvider,
                'summary' => '',
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                      'nama_porhanger',
                      'tahun_mulai',
                      'tahun_selesai',
                    [
                        'class' => 'yii\grid\ActionColumn',
                        'template' => $canCreateUpdate ? '{view} {update-for}' : '{view}',
                        'urlCreator' => function ($action, $model, $key, $index) {
                            return'index.php?r=jemaat-porhanger/'. $action . '&id=' . $model->id;
                        },
                        'buttons' => [
                                'view' => function ($url, $model) {
                                    return Html::button('<i class="glyphicon glyphicon-eye-open"></i>',
                                            ['value' => $url, 
                                             'class' => 'btn btn-xs btn-success btn-view']);
                                },
                                'update-for' => function ($url, $model) {
                                    return Html::button('<i class="glyphicon glyphicon-pencil"></i>',
                                            ['value' => $url, 
                                             'class' => 'btn btn-xs btn-warning btn-update-create']);
                                }                                                                          
                        ]                        
                    ],
                ],
            ]); ?>
            <?php Pjax::end(); ?>  
          </div>
        </div> <!-- section Porhanger -->               

        <!-- ================================================ -->
        <!-- Pendeta/Penginjil                                -->
        <!-- ================================================ -->    

        <div id="sectionFullTimer" class="box box-primary">
          <div class="box-header with-border">                        
            <h4 class="box-title pull-left header"><i class="fa fa-user"></i> Pendeta/Penginjil</h4>
            <div class="box-tools pull-right">
               <?= $canCreateUpdate ? Html::button('<i class="glyphicon glyphicon-plus"></i> <b>Tambah</b>',
                   ['value' => Url::to('index.php?r=karir-jemaat/create-for-jemaat&jemaatId=' . $model->id), 
                    'class' => 'btn btn-box-tool btn-sm btn-update-create', 
                    'id' => 'buttonAddFullTimer']) : '' ?>
            </div>
            <div class="clearfix"></div>
          </div>
          <div class="box-body">  
            <?php Pjax::begin(); ?>  
            <?= GridView::widget([
                'id' => 'gridViewFullTimer',
                'dataProvider' => $fullTimerDataProvider,
                'summary' => '',
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                      ['attribute' => 'Nama', 'value' =>'fullTimer.namaFull'],
                      'jabatan.posisi',
                      'tahun_mulai',
                      'tahun_selesai',
                    [
                        'class' => 'yii\grid\ActionColumn',
                        'template' => $canCreateUpdate ? '{view} {update-for}' : '{view}',
                        'urlCreator' => function ($action, $model, $key, $index) {
                            return'index.php?r=karir-jemaat/'. $action . '&id=' . $model->id;
                        },
                        'buttons' => [
                                'view' => function ($url, $model) {
                                    return Html::button('<i class="glyphicon glyphicon-eye-open"></i>',
                                            ['value' => $url, 
                                             'class' => 'btn btn-xs btn-success btn-view']);
                                },
                                'update-for' => function ($url, $model) {
                                    return Html::button('<i class="glyphicon glyphicon-pencil"></i>',
                                            ['value' => $url, 
                                             'class' => 'btn btn-xs btn-warning btn-update-create']);
                                }                                                                          
                        ]                        
                    ],
                ],
            ]); ?>
            <?php Pjax::end(); ?>
          </div>
        </div> <!-- section FullTimer -->              

        <!-- ================================================ -->
        <!-- Aset Tabs                                        -->
        <!-- ================================================ -->            

        <div class="nav-tabs-custom">
          <ul id="sectionAsetTab" class="nav nav-tabs pull-right">
            <li class="active"><a data-toggle="tab" href="#sectionElektronik">Elektronik</a></li>
            <li class=""><a data-toggle="tab" href="#sectionKendaraan">Kendaraan Bermotor</a></li>            
            <li class=""><a data-toggle="tab" href="#sectionTanah">Tanah</a></li>
            <li class=""><a data-toggle="tab" href="#sectionBangunan">Bangunan</a></li>
            <li class="pull-left header"><i class="fa fa-th"></i> Aset</li>
          </ul>


          <div class="tab-content">

            <div id="sectionElektronik" class="panel panel-warning tab-pane fade in active">
              <div class="clearfix"></div>
              <div class="box-header with-border">                        
                    <h4 class="box-title pull-left">Aset Elektronik</h4>
                    <div class="box-tools pull-right">
                      <?= $canCreateUpdate ? Html::button('<i class="glyphicon glyphicon-plus"></i> <b>Tambah</b>',
                                       ['value' => Url::to('index.php?r=jemaat-aset-elektronik/create-for&jemaatId=' . $model->id), 
                                        'class' => 'btn btn-box-tool btn-sm btn-update-create', 
                                        'id' => 'buttonAddElektronik']) : '' ?>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="box-body">    
                  <?php Pjax::begin(); ?>  
                  <?= GridView::widget([
                      'id' => 'gridViewAsetElektronik',
                      'dataProvider' => $elektronikDataProvider,
                      'summary' => '',
                      'columns' => [
                          ['class' => 'yii\grid\SerialColumn'],
                            'nama_alat',
                            'jumlah_unit',
                            'kondisi',
                            [
                              'class' => 'yii\grid\ActionColumn',
                              'template' => $canCreateUpdate ? '{view} {update-for}' : '{view}',
                              'urlCreator' => function ($action, $model, $key, $index) {
                                  return'index.php?r=jemaat-aset-elektronik/'. $action . '&id=' . $model->id;
                              },
                              'buttons' => [
                                      'view' => function ($url, $model) {
                                          return Html::button('<i class="glyphicon glyphicon-eye-open"></i>',
                                                  ['value' => $url, 
                                                   'class' => 'btn btn-xs btn-success btn-view']);
                                      },
                                      'update-for' => function ($url, $model) {
                                          return Html::button('<i class="glyphicon glyphicon-pencil"></i>',
                                                  ['value' => $url, 
                                                   'class' => 'btn btn-xs btn-warning btn-update-create']);
                                      }                                                                          
                              ]                                        
                          ],
                      ],
                  ]); ?>
                  <?php Pjax::end(); ?>  
                </div>
            </div>  <!-- section -->

            <div id="sectionKendaraan" class="panel panel-warning tab-pane fade in">
              <div class="clearfix"></div>
              <div class="box-header with-border">                        
                    <h4 class="box-title pull-left">Aset Kendaraan</h4>
                    <div class="box-tools pull-right">
                      <?= $canCreateUpdate ? Html::button('<i class="glyphicon glyphicon-plus"></i> <b>Tambah</b>',
                                       ['value' => Url::to('index.php?r=jemaat-aset-kendaraan/create-for&jemaatId=' . $model->id), 
                                        'class' => 'btn btn-box-tool btn-sm btn-update-create', 
                                        'id' => 'buttonAddKendaraan']) : '' ?>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="box-body">  
                  <?php Pjax::begin(); ?>    
                  <?= GridView::widget([
                      'id' => 'gridViewAsetKendaraan',
                      'dataProvider' => $kendaraanDataProvider,
                      'summary' => '',
                      'columns' => [
                          ['class' => 'yii\grid\SerialColumn'],
                            'jenisKendaraan.jenis_kendaraan',
                            'merek',
                            'tahun',
                            'kondisi',
                            [
                              'class' => 'yii\grid\ActionColumn',
                              'template' => $canCreateUpdate ? '{view} {update-for}' : '{view}',
                              'urlCreator' => function ($action, $model, $key, $index) {
                                  return'index.php?r=jemaat-aset-kendaraan/'. $action . '&id=' . $model->id;
                              },
                              'buttons' => [
                                      'view' => function ($url, $model) {
                                          return Html::button('<i class="glyphicon glyphicon-eye-open"></i>',
                                                  ['value' => $url, 
                                                   'class' => 'btn btn-xs btn-success btn-view']);
                                      },
                                      'update-for' => function ($url, $model) {
                                          return Html::button('<i class="glyphicon glyphicon-pencil"></i>',
                                                  ['value' => $url, 
                                                   'class' => 'btn btn-xs btn-warning btn-update-create']);
                                      }                                                                          
                              ]                                        
                          ],
                      ],
                  ]); ?>
                  <?php Pjax::end(); ?>  
                </div>
            </div>  <!-- section -->          

            <div id="sectionTanah" class="panel panel-warning tab-pane fade in">
              <div class="clearfix"></div>
              <div class="box-header with-border">                        
                    <h4 class="box-title pull-left">Aset Tanah</h4>
                    <div class="box-tools pull-right">
                      <?= $canCreateUpdate ? Html::button('<i class="glyphicon glyphicon-plus"></i> <b>Tambah</b>',
                                       ['value' => Url::to('index.php?r=jemaat-aset-tanah/create-for&jemaatId=' . $model->id), 
                                        'class' => 'btn btn-box-tool btn-sm btn-update-create', 
                                        'id' => 'buttonAddTanah']) : '' ?>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="box-body">  
                  <?php Pjax::begin(); ?>    
                  <?= GridView::widget([
                    'id' => 'gridViewAsetTanah',
                    'dataProvider' => $tanahDataProvider,
                    'summary' => '',
                    'columns' => [
                      ['class' => 'yii\grid\SerialColumn'],
                        'luas',
                        'lokasi',
                        // 'kondisi_pemakaian',
                        // 'asal_perolehan',
                        [
                          'class' => 'yii\grid\ActionColumn',
                          'template' => $canCreateUpdate ? '{view} {update-for}' : '{view}',
                          'urlCreator' => function ($action, $model, $key, $index) {
                              return'index.php?r=jemaat-aset-tanah/'. $action . '&id=' . $model->id;
                          },
                          'buttons' => [
                            'view' => function ($url, $model) {
                            return Html::button('<i class="glyphicon glyphicon-eye-open"></i>',
                                    ['value' => $url, 
                                     'class' => 'btn btn-xs btn-success btn-view']);
                            },
                            'update-for' => function ($url, $model) {
                              return Html::button('<i class="glyphicon glyphicon-pencil"></i>',
                                      ['value' => $url, 
                                       'class' => 'btn btn-xs btn-warning btn-update-create']);
                            }                                                                          
                          ]                                        
                      ],
                    ],
                  ]); ?>
                  <?php Pjax::end(); ?>  
                </div>
            </div>  <!-- section -->   

            <div id="sectionBangunan" class="panel panel-warning tab-pane fade in">
              <div class="clearfix"></div>
              <div class="box-header with-border">                        
                <h4 class="box-title pull-left">Aset Bangunan</h4>
                <div class="box-tools pull-right">
                  <?= $canCreateUpdate ? Html::button('<i class="glyphicon glyphicon-plus"></i> <b>Tambah</b>',
                                   ['value' => Url::to('index.php?r=jemaat-aset-bangunan/create-for&jemaatId=' . $model->id), 
                                    'class' => 'btn btn-box-tool btn-sm btn-update-create', 
                                    'id' => 'buttonAddBangunan']) : '' ?>
                </div>
                <div class="clearfix"></div>
              </div>
                <div class="box-body"> 
                  <?php Pjax::begin(); ?>     
                  <?= GridView::widget([
                      'id' => 'gridViewAsetBangunan',
                      'dataProvider' => $bangunanDataProvider,
                      'summary' => '',
                      'columns' => [
                          ['class' => 'yii\grid\SerialColumn'],
                            'jenisBangunan.jenis_bangunan',
                            'luas_bangunan',
                            'jumlah_unit',
                            'kondisi',
                            [
                              'class' => 'yii\grid\ActionColumn',
                              'template' => $canCreateUpdate ? '{view} {update-for}' : '{view}',
                              'urlCreator' => function ($action, $model, $key, $index) {
                                  return'index.php?r=jemaat-aset-bangunan/'. $action . '&id=' . $model->id;
                              },
                              'buttons' => [
                                      'view' => function ($url, $model) {
                                          return Html::button('<i class="glyphicon glyphicon-eye-open"></i>',
                                                  ['value' => $url, 
                                                   'class' => 'btn btn-xs btn-success btn-view']);
                                      },
                                      'update-for' => function ($url, $model) {
                                          return Html::button('<i class="glyphicon glyphicon-pencil"></i>',
                                                  ['value' => $url, 
                                                   'class' => 'btn btn-xs btn-warning btn-update-create']);
                                      }                                                                          
                              ]                                        
                          ],
                      ],
                  ]); ?>
                  <?php Pjax::begin(); ?>  
                </div>
            </div>  <!-- section --> 
          </div> <!-- tab-content -->
        </div>

      </div> <!-- main right column -->
    </div> 

    </div>    

</div>

<script>
      function initMap() {
        // Create a map object and specify the DOM element for display.
        var map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: 3, lng: 99},
          scrollwheel: false,
          zoom: 8
        });
      }
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAblpOwgo0AvpiJJQSmqKjvVKoVwOgpgvA&callback=initMap" async defer>        
</script>
