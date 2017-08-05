<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;
use yii\widgets\Pjax;
use yii\grid\GridView;
use yii\app;
use yii\bootstrap\Modal;

use backend\models\JemaatPhotos;

/* @var $this yii\web\View */
/* @var $model backend\models\FullTimer */

$this->title = $model->nama;
$this->params['breadcrumbs'][] = ['label' => 'Full Timers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

$modelsKarir = $karirDataProvider->getModels();

?>
<div class="full-timer-view">

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

  <!-- ==================================== -->
  <!-- Header Row -->
  <!-- ==================================== -->  
 
  <div class="row">  
    <div class="col-md-12">          
      <!-- Widget: user widget style 1 -->
      <div class="box box-widget widget-user">
        <!-- Add the bg color to the header using any of the bg-* classes -->
        <div class="widget-user-header bg-black" style="background: url('dist/img/photo1.png') center center;">
            <div class="pull-right">
              <?= Html::a('<i class="glyphicon glyphicon-pencil"></i>', ['update', 'id' => $model->id], ['class' => 'btn btn-success btn-sm']) ?>
            </div>          
            <h3 class="widget-user-username title-shadow"><?=$model->namaFull?></h3>
            <h5 class="widget-user-desc"><?= !empty($modelsKarir) ? $modelsKarir[0]['posisi'] . ' di ' . $modelsKarir[0]['penempatan'] : $model->jabatan->nama?></h5>   
            <h5 class="widget-user-desc small muted">No Induk: <?=$model->no_induk?></h5> 
        </div>
        <div class="widget-user-image">
          <img class="img-circle" src="<?= empty($model->photo_file) ? 'img/logo_gkps_160_160.gif' : str_replace("photo_full_timer", "photo_full_timer\\thumbnails", $model->photo_file) ?>" alt="Foto Full Timer">
        </div>
        <div class="box-footer">
          <div class="row">
            <div class="col-sm-4 border-right">
              <div class="description-block">
                <h5 class="description-header"><?=$modelPelayanan->getAttributeLabel('motto')?></h5>
                <span class="description-text"><?=$modelPelayanan->motto?></span>
              </div>
              <!-- /.description-block -->
            </div>
            <!-- /.col -->
            <div class="col-sm-4 border-right">
              <div class="description-block">
                <h5 class="description-header"><?=$modelPelayanan->getAttributeLabel('visi_pribadi')?></h5>
                <span class="description-text"><?=$modelPelayanan->visi_pribadi?></span>
              </div>
              <!-- /.description-block -->
            </div>
            <!-- /.col -->
            <div class="col-sm-4">
              <div class="description-block">
                <h5 class="description-header"><?=$modelPelayanan->getAttributeLabel('misi_pribadi')?></h5>
                <span class="description-text"><?=$modelPelayanan->misi_pribadi?></span>
              </div>
              <!-- /.description-block -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
      </div>
      <!-- /.widget-user -->
    </div>
  </div>

  <!-- ==================================== -->
  <!-- Content Row -->
  <!-- ==================================== -->    

  <div class="nav-tabs-custom">
    <ul id="sectionMainTab" class="nav nav-tabs">
      <li class="active"><a data-toggle="tab" href="#sectionTabInformasi">Informasi</a></li>
      <li class=""><a data-toggle="tab" href="#sectionTabKarir">Karir</a></li>      
      <li class=""><a data-toggle="tab" href="#sectionTabTimeline">Garis Waktu</a></li>      
    </ul>
    <div class="tab-content">

      <div id="sectionTabInformasi" class="tab-pane fade in active">
        <!-- About Me Box -->
        <div class="box box-success">
          <div class="box-header with-border">
            <h3 class="box-title">Tentang Saya</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <strong><i class="fa fa-user margin-r-5"></i> Jenis Kelamin</strong>

            <p class="text-muted">
              <?=$model->jenis_kelamin?>
            </p>

            <hr>

            <strong><i class="fa fa-map-marker margin-r-5"></i> Alamat Rumah</strong>

            <p class="text-muted"><?=$model->alamat_rumah?></p>
            <hr>

            <strong><i class="fa fa-pencil margin-r-5"></i> Kontak</strong>
            <p>
              <dl class="dl-horizontal h5">
                <dt> <i class="fa fa-envelope "></i> </dt>
                <dd> <?= empty($model->email) ? 'Tidak ada' : $model->email?> </dd>
                <dt> <i class="fa fa-phone"></i> </dt>
                <dd> <?= empty($model->hp) ? 'Tidak ada' : $model->hp?></dd>                   
              </dl>
            </p>        
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->

        <!-- ======================================= -->
        <!-- View/Update Riwayat Hidup               -->
        <!-- ======================================= -->

        <div class="box box-success">
          <div class="box-header with-border">                       
            <h4 class="box-title pull-left">Riwayat Hidup</h4>
            <div class="pull-right">
            <?= empty($modelRiwayatHidup->id) ? 
              Html::button('<i class="glyphicon glyphicon-pencil"></i> <b>Update</b>',
               ['value' => Url::to('index.php?r=full-timer-riwayat-hidup/create-for&fullTimerId=' . $model->id), 
                'class' => 'btn btn-box-tool btn-sm btn-update-create', 
                'id' => 'buttonUpdateRiwayatHidup']) :
              Html::button('<i class="glyphicon glyphicon-pencil"></i> <b>Update</b>',
               ['value' => Url::to('index.php?r=full-timer-riwayat-hidup/update-for&id=' . $modelRiwayatHidup->id), 
                'class' => 'btn btn-box-tool btn-sm btn-update-create', 
                'id' => 'buttonUpdateRiwayatHidup'])                     
            ?>
            </div>
            <div class="clearfix"></div>
          </div>
          <div class="box-body">    
            <?= DetailView::widget([
              'model' => $modelRiwayatHidup,
              'attributes' => [
                'tempat_lahir',
                'tanggal_lahir',
                'gereja_baptis',
                'tanggal_baptis',
                'gereja_nikah',
                'tanggal_nikah',
                'nama_pendeta',
                'gereja_sidi',
                'tanggal_sidi',
                'kisah_hidup:ntext',
              ],
            ]) ?>
          </div>
        </div>      

        <!-- ======================================= -->
        <!-- View Pelayanan                          -->
        <!-- ======================================= -->

        <div class="box box-success">
          <div class="box-header with-border">                       
            <h4 class="box-title pull-left">Pelayanan</h4>
            <div class="pull-right">
            <?= empty($modelPelayanan->id) ? 
              Html::button('<i class="glyphicon glyphicon-pencil"></i> <b>Update</b>',
               ['value' => Url::to('index.php?r=full-timer-pelayanan/create-for&fullTimerId=' . $model->id), 
                'class' => 'btn btn-box-tool btn-sm btn-update-create', 
                'id' => 'buttonUpdatePelayanan']) :
              Html::button('<i class="glyphicon glyphicon-pencil"></i> <b>Update</b>',
               ['value' => Url::to('index.php?r=full-timer-pelayanan/update-for&id=' . $modelPelayanan->id), 
                'class' => 'btn btn-box-tool btn-sm btn-update-create', 
                'id' => 'buttonUpdatePelayanan'])                     
            ?>
            </div>
            <div class="clearfix"></div>
          </div>
          <div class="box-body">    
            <?= DetailView::widget([
              'model' => $modelPelayanan,
              'attributes' => [
                ['attribute' => 'Jemaat Penahbisan', 
                 'value' => isset($modelPelayanan->jemaatTahbis->namaFull) ? $modelPelayanan->jemaatTahbis->namaFull : 'Tidak Ada',
                ],
                'tanggal_tahbis',
                'golongan',
                'ruang',
                'gaji_terakhir',
                'refleksi_pribadi_pelayanan:ntext',
                'pencapaian_pelayanan:ntext',
                'visi_pribadi:ntext',
                'misi_pribadi:ntext',
                'motto:ntext',
              ],
            ]) ?>    
          </div>
        </div>         

        <!-- ======================================= -->
        <!-- View Keluarga                           -->
        <!-- ======================================= -->

        <div class="box box-success">
            <div class="box-header with-border">                       
                <h4 class="box-title pull-left">Keluarga</h4>
                <div class="pull-right">
                    <?= Html::button('<i class="glyphicon glyphicon-plus"></i> <b>Tambah</b>',
                                     ['value' => Url::to('index.php?r=full-timer-keluarga/create-for&fullTimerId=' . $model->id), 
                                      'class' => 'btn btn-box-tool btn-sm btn-update-create', 
                                      'id' => 'buttonAddKeluarga']) ?>
                </div>
                <div class="clearfix"></div>
            </div>    
            <div class="box-body">
                <?= GridView::widget([
                    'dataProvider' => $keluargaDataProvider,
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],

                        'nama',
                        'jenis_kelamin',
                        ['attribute' => 'Relasi', 'value' => 'relasi.nama_relasi'],
                        // 'tempat_lahir',
                        'tanggal_lahir:date',
                        'pekerjaan',

                        [
                            'class' => 'yii\grid\ActionColumn',
                            'template' => '{view} {update-for} {delete}',
                            'urlCreator' => function ($action, $model, $key, $index) {
                                return'index.php?r=full-timer-keluarga/'. $action . '&id=' . $model->id;
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
            </div>
        </div> <!-- keluarga -->             
      </div> <!-- sectionInformasi -->

      <div id="sectionTabKarir" class="tab-pane fade in">

        <!-- ======================================= -->
        <!-- View Pendidikan                         -->
        <!-- ======================================= -->    

        <div class="box box-success">
          <div class="box-header">
            <h4 class="box-title pull-left">Pendidikan</h4>
          </div>
          <div class="box-body">    

            <!-- ======================================= -->
            <!-- View Sekolah                            -->
            <!-- ======================================= -->   

            <div class="box box-success">
              <div class="box-header with-border">                       
                <h4 class="box-title pull-left">Sekolah</h4>
                <div class="pull-right">
                  <?= empty($modelSekolah->id) ? 
                    Html::button('<i class="glyphicon glyphicon-pencil"></i> <b>Update</b>',
                     ['value' => Url::to('index.php?r=full-timer-sekolah/create-for&fullTimerId=' . $model->id), 
                      'class' => 'btn btn-box-tool btn-sm btn-update-create', 
                      'id' => 'buttonUpdateSekolah']) :
                    Html::button('<i class="glyphicon glyphicon-pencil"></i> <b>Update</b>',
                     ['value' => Url::to('index.php?r=full-timer-sekolah/update-for&id=' . $modelSekolah->id), 
                      'class' => 'btn btn-box-tool btn-sm btn-update-create', 
                      'id' => 'buttonUpdateSekolah']) ?>
                </div>
                <div class="clearfix"></div>
              </div>
              <div class="box-body">    
                <?= DetailView::widget([
                  'model' => $modelSekolah,
                  'attributes' => [
                    'sd',
                    'tahun_lulus_sd',
                    'smp',
                    'tahun_lulus_smp',
                    'sma',
                    'tahun_lulus_sma',
                  ],
                ]) ?> 
              </div>
            </div>

            <!-- ======================================= -->
            <!-- View Kuliah                             -->
            <!-- ======================================= -->   

            <div class="box box-success">
              <div class="box-header with-border">                       
                <h4 class="box-title pull-left">Kuliah</h4>
                <div class="pull-right">
                  <?= Html::button('<i class="glyphicon glyphicon-plus"></i> <b>Tambah</b>',
                   ['value' => Url::to('index.php?r=full-timer-kuliah/create-for&fullTimerId=' . $model->id), 
                    'class' => 'btn btn-box-tool btn-sm btn-update-create', 
                    'id' => 'buttonAddKuliah']) ?>
                </div>
                <div class="clearfix"></div>
              </div>
              <div class="box-body">    
                <?= GridView::widget([
                'dataProvider' => $kuliahDataProvider,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    ['attribute' => 'Universitas', 'value' => 'universitas.nama'],
                    'tahun_masuk',
                    ['attribute' => 'Strata', 'value' => 'strata.nama'],
                    ['attribute' => 'Gelar', 'value' => 'gelar.gelarLengkap'],
                    // 'judul_thesis',
                    [
                      'class' => 'yii\grid\ActionColumn',
                      'template' => '{view} {update-for} {delete}',
                      'urlCreator' => function ($action, $model, $key, $index) {
                        return'index.php?r=full-timer-kuliah/'. $action . '&id=' . $model->id;
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
              </div>
            </div>

            <!-- ======================================= -->
            <!-- View Kursus                             -->
            <!-- ======================================= -->   

            <div class="box box-success">
                <div class="box-header with-border">                       
                    <h4 class="box-title pull-left">Kursus</h4>
                    <div class="pull-right">
                        <?= Html::button('<i class="glyphicon glyphicon-plus"></i> <b>Tambah</b>',
                                         ['value' => Url::to('index.php?r=full-timer-kursus/create-for&fullTimerId=' . $model->id), 
                                          'class' => 'btn btn-box-tool btn-sm btn-update-create', 
                                          'id' => 'buttonAddKursus']) ?>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="box-body">    
                    <?= GridView::widget([
                        'dataProvider' => $kursusDataProvider,
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],
                            'nama_kursus',
                            'tahun',
                            [
                                'class' => 'yii\grid\ActionColumn',
                                'template' => '{view} {update-for} {delete}',
                                'urlCreator' => function ($action, $model, $key, $index) {
                                    return'index.php?r=full-timer-kursus/'. $action . '&id=' . $model->id;
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
                </div>
            </div>
          </div>

        </div>

        <!-- ======================================= -->
        <!-- View Karir Ber-jemaat                   -->
        <!-- ======================================= -->     

        <div class="box box-success">
            <div class="box-header with-border">                       
                <h4 class="box-title pull-left">Tugas Ber-Jemaat</h4>
                <div class="pull-right">
                    <?= Html::button('<i class="glyphicon glyphicon-plus"></i> <b>Tambah</b>',
                                     ['value' => Url::to('index.php?r=karir-jemaat/create-for&fullTimerId=' . $model->id), 
                                      'class' => 'btn btn-box-tool btn-sm btn-update-create', 
                                      'id' => 'buttonAddKarirJemaat']) ?>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="box-body">
                <?= GridView::widget([
                    'dataProvider' => $karirJemaatDataProvider,
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],
                        ['attribute' => 'Posisi', 'value' => 'jabatan.posisi'],
                        ['attribute' => 'Penempatan', 'value' => 'jemaat.nama'],
                        'tahun_mulai',
                        'tahun_selesai',
                        [
                            'class' => 'yii\grid\ActionColumn',
                            'template' => '{view} {update-for} {delete}',
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
            </div>
        </div>    

        <!-- ======================================= -->
        <!-- View Karir Kantor Pusat                 -->
        <!-- ======================================= -->

        <div class="box box-success">
            <div class="box-header with-border">                       
                <h4 class="box-title pull-left">Tugas Kantor Pusat</h4>
                <div class="pull-right">
                    <?= Html::button('<i class="glyphicon glyphicon-plus"></i> <b>Tambah</b>',
                                     ['value' => Url::to('index.php?r=karir-kantor-pusat/create-for&fullTimerId=' . $model->id), 
                                      'class' => 'btn btn-box-tool btn-sm btn-update-create', 
                                      'id' => 'buttonAddKarirKantorPusat']) ?>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="box-body">

                <?= GridView::widget([
                    'dataProvider' => $karirKantorPusatDataProvider,
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],
                        ['attribute' => 'Posisi', 'value' => 'jabatan.posisi'],
                        ['attribute' => 'Penempatan', 'value' => 'organisasiKantorPusat.fullName'],
                        'tahun_mulai',
                        'tahun_selesai',
                        [
                            'class' => 'yii\grid\ActionColumn',
                            'template' => '{view} {update-for} {delete}',
                            'urlCreator' => function ($action, $model, $key, $index) {
                                return'index.php?r=karir-kantor-pusat/'. $action . '&id=' . $model->id;
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
            </div>
        </div>

        <!-- ======================================= -->
        <!-- View Karir Kepanitiaan                  -->
        <!-- ======================================= -->

        <div class="box box-success">
            <div class="box-header with-border">                       
                <h4 class="box-title pull-left">Tugas Kepanitiaan</h4>
                <div class="pull-right">
                    <?= Html::button('<i class="glyphicon glyphicon-plus"></i> <b>Tambah</b>',
                                     ['value' => Url::to('index.php?r=karir-kepanitiaan/create-for&fullTimerId=' . $model->id), 
                                      'class' => 'btn btn-box-tool btn-sm btn-update-create', 
                                      'id' => 'buttonAddKarirKepanitiaan']) ?>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="box-body">
                <?= GridView::widget([
                    'dataProvider' => $karirKepanitiaanDataProvider,
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],
                        ['attribute' => 'Posisi', 'value' => 'posisi.posisi'],
                        ['attribute' => 'Penempatan', 'value' => 'kepanitiaan.fullName'],
                        'tahun',
                        [
                            'class' => 'yii\grid\ActionColumn',
                            'template' => '{view} {update-for} {delete}',
                            'urlCreator' => function ($action, $model, $key, $index) {
                                return'index.php?r=karir-kepanitiaan/'. $action . '&id=' . $model->id;
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
            </div>
        </div>    

        <!-- ======================================= -->
        <!-- View Karir Oikoumene External           -->
        <!-- ======================================= -->

        <div class="box box-success">
            <div class="box-header with-border">                       
                <h4 class="box-title pull-left">Tugas Oikoumenis/Organisasi Eksternal</h4>
                <div class="pull-right">
                    <?= Html::button('<i class="glyphicon glyphicon-plus"></i> <b>Tambah</b>',
                                     ['value' => Url::to('index.php?r=karir-external/create-for&fullTimerId=' . $model->id), 
                                      'class' => 'btn btn-box-tool btn-sm btn-update-create', 
                                      'id' => 'buttonAddKarirExternal']) ?>
                </div>
                <div class="clearfix"></div>
            </div>        
            <div class="box-body">
                <?= GridView::widget([
                    'dataProvider' => $karirExternalDataProvider,
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],
                        ['attribute' => 'Posisi', 'value' => 'jabatan.posisi'],
                        ['attribute' => 'Penempatan', 'value' => 'externalOrg.fullName'],
                        'tahun_mulai',
                        'tahun_selesai',
                        [
                            'class' => 'yii\grid\ActionColumn',
                            'template' => '{view} {update-for} {delete}',
                            'urlCreator' => function ($action, $model, $key, $index) {
                                return'index.php?r=karir-external/'. $action . '&id=' . $model->id;
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
            </div>
        </div>         
      </div> <!-- sectionKarir -->

      <div id="sectionTabTimeline" class="tab-pane fade in">
        <!-- row -->
        <div class="row">
          <div class="col-md-12">
            <!-- The time line -->
            <ul class="timeline">

              <?php 

              if (!empty($modelsKarir))
              {
                foreach ($modelsKarir as $modelKarir) {
                  
                  $jemaatPhotos = '';
                  if (strcmp($modelKarir['model'], 'KarirJemaat') == 0) {
                    $jemaatPhotos = JemaatPhotos::find()->where(['jemaat_id' => $modelKarir['penempatan_id']])->one();                
                  }

                  // timeline label
                  echo Html::tag('li',
                      Html::tag('span', $modelKarir['tahun_mulai'] . ' - ' . $modelKarir['tahun_selesai'], 
                        ['class' => 'bg-red']), 
                    ['class' => 'time-label']);

                  // timeline item
                  $timeLineIcon = Html::tag('i','', ['class' => 'fa fa-check-circle bg-blue']);
                  $timeIcon = Html::tag('i','', ['class' => 'fa fa-clock-o']);
                  $timeSpan = Html::tag('span', $timeIcon . $modelKarir['tipe'], ['class' => 'time']);
                  $timeLineHeader = Html::tag('h3', '<a>' . $modelKarir['posisi'] . '</a> di ' . $modelKarir['penempatan'], ['class' => 'timeline-header']);
                  $timeLineBodyPhoto = !empty($jemaatPhotos) ? Html::img($jemaatPhotos->thumbnail, ['alt' => 'Foto Jemaat', 'class' => 'margin']) : '';                  
                  $timeLineBody = Html::tag('div', $modelKarir['keterangan'] . $timeLineBodyPhoto, ['class' => 'timeline-body']);
                  $timeLineFooter = Html::tag('div','', ['class' => 'timeline-footer']);

                  $timeLineItem = Html::tag('div',
                    $timeSpan . 
                    $timeLineHeader .
                    $timeLineBody .
                    $timeLineFooter,
                    ['class' => 'timeline-item']);

                  echo Html::tag('li', $timeLineIcon . $timeLineItem);
                }
              } else {
                  echo kartik\helpers\Html::well( '<b>Belum ada data!</b>', kartik\helpers\Html::SIZE_TINY, ['class' => 'btn-block text-muted text-center']);                
              } ?>

              <li>
                <i class="fa fa-clock-o bg-gray"></i>
              </li>
            </ul>
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->      
      </div>

    </div> <!-- tab-content -->
  </div> <!-- the big nav-tabs -->
</div>
