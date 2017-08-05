<?php

use kartik\helpers\Html;
use yii\helpers\Url;
use yii\helpers\Json;
use yii\widgets\DetailView;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\bootstrap\Modal;

use execut\widget\TreeView;
use yii\web\JsExpression;
use wbraganca\fancytree\FancytreeWidget;
use Carbon\Carbon;

use frontend\models\Jemaat;

/* @var $this yii\web\View */
/* @var $model backend\models\Jemaat */

$this->title = $model->levelJemaatNama . ' ' .  $model->nama;
$this->params['breadcrumbs'][] = ['label' => 'Jemaat', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$this->params['title'] = $this->title;

Carbon::setLocale('id');

$bgArray = ['bg-primary', 'bg-success', 'bg-info', 'bg-warning', 'bg-danger'];
$bgCounter = 0;

// jemaat statistik
$statistikModels = $statistikDataProvider->getModels();

// jemaat photos
if (!empty($modelPhotos ))
{
  foreach ($modelPhotos as $modelPhoto) 
  {
    $modelPhoto->thumbnail = Yii::$app->urlManagerBackend->createUrl($modelPhoto->thumbnail);
    $modelPhoto->href = Yii::$app->urlManagerBackend->createUrl($modelPhoto->href);
    $modelPhoto->setForGallery();
  }
}
$thumbnailPath = empty($modelPhotos) ? 'img/logo_gkps_300_300.gif' : $modelPhotos[0]->thumbnail;

// jemaat kebaktian minggu
$kebaktianMingguModels = $kebaktianMingguDataProvider->getModels();
if (!empty($kebaktianMingguModels)) {
  $kebaktianColumns = '';
  $bgCounter = 0;
  foreach ($kebaktianMingguModels as $kebaktianMinggu) {

    $jamKebaktian = Carbon::createFromFormat('H:i:s', $kebaktianMinggu->jam);    
    $jam = Html::tag('h2', $jamKebaktian->format('H:i'), ['class' => 'font-bold']);
    $bahasa = Html::tag('h4', $kebaktianMinggu->bahasa, ['class' => 'font-bold no-margins']);

    $colJam = Html::tag('div', $jam, ['class' => 'col-xs-6 text-right']);
    $colBahasa = Html::tag('div', $bahasa, ['class' => 'col-xs-6']);

    $row = Html::tag('div', $colBahasa . $colJam , ['class' => 'row vertical-align']);
    $widget = Html::tag('div', $row, ['class' => 'widget style1 ' . $bgArray[$bgCounter++]]);
    $kebaktianColumn = Html::tag('div', $widget, ['class' => 'col-xs-6 col-sm-6 col-md-6 col-lg-4']);
    $kebaktianColumns = $kebaktianColumns . $kebaktianColumn;

    if ($bgCounter >= count($bgArray))
      $bgCounter = 0;
  }
}

// jemaat struktur di GKPS
$thisDistrik = null;
$thisResort = null;

if ($model->level_jemaat_id == 1) {
  $thisDistrik = $model;
} else if ($model->level_jemaat_id == 2) {
  $thisDistrik = $model->super;
  $thisResort = $model;
} else if ($model->level_jemaat_id == 3) {
  $thisDistrik = $model->super->super;
  $thisResort = $model->super;  
}

$dataTree = [];

if ($thisDistrik != null) {
  $distriks = Jemaat::find()->where(['level_jemaat_id' => 1, 'id' => $thisDistrik->id])->all();                 
  // walk through distrik
  foreach($distriks as $distrik) {                   
    // create empty resort node
    $resortNodes = [];
    if ($thisResort != null)   {
      // find resort under distrik
      $resorts = Jemaat::find()->where(['super_id' => $distrik->id, 'id' => $thisResort->id])->all();
    } else {
      // find resort under distrik
      $resorts = Jemaat::find()->where(['super_id' => $distrik->id])->all();
    }
   
    // fill in resort node with array of resort
    foreach ($resorts as $resort) {
      // create empty jemaat node
      $jemaatNodes = [];
      // find jemaat under resort
      $jemaats = Jemaat::find()->where(['super_id' => $resort->id])->all();

      // create an array jemaatNodes
      foreach ($jemaats as $jemaat) {
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
}

$onSelect = new JsExpression(<<<JS
function (undefined, item) {
    console.log(item);
}
JS
);

    $groupsContent = '';
    if (!empty($dataTree))
    {
        $groupsContent = TreeView::widget([
            'data' => $dataTree,
            'size' => TreeView::SIZE_MIDDLE,
            'header' => 'Dalam Struktur GKPS',
            'searchOptions' => [
                'inputOptions' => [
                    'placeholder' => 'Cari jemaat...'
                ],
            ],           
            'template'  => '{tree}',
            'clientOptions' => [
                // 'onNodeSelected' => $onSelect,
                'selectedBackColor' => 'rgb(40, 153, 57)',
                // 'borderColor' => '#fff',
                'levels' => 3,
                'showBorder' => false,
            ],
        ]);
    }

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

    <!-- Row #1 -->
    <div id="rowHeader" class="row m-b-lg m-t-lg">
      <div id="colHeaderLeft" class="col-md-4">
        <div class="profile-image">
          <img src="<?= empty($modelPhotos) ? 'img/logo_gkps_160_160.gif' : $modelPhotos[0]->thumbnail ?>" class="img-circle circle-border m-b-md" alt="profile">
        </div>
        <div class="profile-info">
          <h2 class="no-margins">
              <?= $model->namaFull ?>
          </h2>
          <h4><?= $model->superNamaFull . ((isset($model->super->super) && $model->super->super->level_jemaat_id != 0) ? ', ' . $model->super->superNamaFull : '') ?></h4>
        </div>
        <div class="widget style3">      
          <?php 
            if (empty($modelPhotos)) {
              echo Html::tag('div', 'Belum ada foto!', ['class' => 'text-muted']);
            } else {
              echo Html::tag('small', 'Foto-foto ' . $model->namaFull, []);
              echo dosamigos\gallery\Gallery::widget(
                [
                'id' => 'fotoJemaatGallery',
                'items' => $modelPhotos, 
                ]);
            }
          ?>              
        </div>
      </div> <!-- colHeaderLeft -->
      <div id="colHeaderRight" class="col-md-8">
        <div class="row">
          <div id="colHeaderStatistik" class="col-md-7">
              <table class="table small m-b-xs">
              <tbody>
              <?php
              if (count($statistikModels) > 0) {  
                $columnCounter = 0;
                $itemCounter = 0;
                $table = '';
                
                foreach($statistikModels[0] as $nameStatistik => $valueStatistik) {
                  if (in_array($nameStatistik, ['id', 'jemaat_id','nama_pengantar_jemaat','tahun_data']))
                    continue;

                  $value = Html::tag('strong', $valueStatistik,[]);
                  $column = Html::tag('td', $value . ' ' . $statistikModels[0]->getAttributeLabel($nameStatistik),[]);

                  if ($columnCounter == 0) 
                  {
                    $columns = '';
                  }

                  $columns = $columns . $column;
                  $columnCounter++;
                  $itemCounter++;

                  if ($columnCounter == 2 || $itemCounter == count($statistikModels[0])) 
                  {
                    $row = Html::tag('tr', $columns, []);
                    $table = $row . $table;
                    $columnCounter = 0;
                  }
                }

                echo $table;
              }
              ?>
              </tbody>
              </table>
          </div> <!-- colHeaderStatistik -->
          <div id="colHeaderRight2" class="col-md-5">
              <small>Pengantar Jemaat</small>
              <h3 class="no-margins"><?= !empty($statistikModels) ? $statistikModels[0]->nama_pengantar_jemaat : '-'?></h3>
              <br/>
              <p class="text-muted small">Berdasarkan data tahun <?= !empty($statistikModels) ? $statistikModels[0]->tahun_data : '-' ?></p>
          </div> <!-- colHeaderRight2 -->
        </div> <!-- row -->
        <div class="row">
        <h2>Kebaktian Minggu</h2>
        <?= isset($kebaktianColumns) ? $kebaktianColumns : '-' ?>
        </div>

      </div>
    </div> <!-- rowHeader -->

    <div id="rowNav" class="row m-b-lg m-t-lg">
      <ul class="nav nav-tabs">
        <li class="active"><a data-toggle="pill" href="#tentang-jemaat">Tentang Jemaat</a></li>
        <li><a data-toggle="pill" href="#data-jemaat">Data Jemaat</a></li>
        <li><a data-toggle="pill" href="#kegiatan-jemaat">Kegiatan Jemaat</a></li>
      </ul>

      <div class="tab-content">

        <div id="tentang-jemaat" class="tab-pane fade in active">
          <div class="row">
            <!-- colTentangJemaatLeft -->
            <div id="colTentangJemaatLeft" class="col-lg-3">
              
              <div id="boxDetailKontak" class="widget lazur-bg p-xl">
                <h2>
                    Detail Kontak
                </h2>
                <hr/>
                <ul class="list-unstyled m-t-md">
                  <li>
                    <span class="fa fa-envelope m-r-xs"></span>
                    <label>Email:</label>
                    <?= empty($modelJemaatDetails->email) ? 'Tidak ada' : Html::mailto(Html::encode($modelJemaatDetails->email), $modelJemaatDetails->email)?>
                  </li>
                  <hr/>
                  <li>
                    <span class="fa fa-home m-r-xs"></span>
                    <label>Alamat:</label>
                    <?php
                      if (isset($modelJemaatDetails->alamat_jalan))
                      {
                        $alamatArr = [];
                        if (isset($modelJemaatDetails->alamat_jalan)) array_push($alamatArr, $modelJemaatDetails->alamat_jalan . "</br>");
                        if (isset($modelJemaatDetails->alamat_desa_kelurahan)) array_push($alamatArr, $modelJemaatDetails->alamat_desa_kelurahan);
                        if (isset($modelJemaatDetails->alamat_kecamatan)) array_push($alamatArr, $modelJemaatDetails->alamat_kecamatan . "</br>");
                        if (isset($modelJemaatDetails->alamat_kota_kabupaten)) array_push($alamatArr, $modelJemaatDetails->alamat_kota_kabupaten . "</br>");
                        if (isset($modelJemaatDetails->alamat_provinsi)) array_push($alamatArr, $modelJemaatDetails->alamat_provinsi);
                        if (isset($modelJemaatDetails->alamat_kodepos)) array_push($alamatArr, $modelJemaatDetails->alamat_kodepos);
                        echo "<br>" . implode(" ", $alamatArr);
                      } else 
                      {
                        echo '<span class="text-muted">Tidak ada data alamat</span>';
                      }
                    ?>
                  </li>
                  <hr/>
                  <li>
                    <span class="fa fa-phone m-r-xs"></span>
                    <label>Telp:</label>
                    <?= empty($modelJemaatDetails->telp) ? 'Tidak ada' : $modelJemaatDetails->telp?>
                  </li>
                  <hr/>
                  <li>
                    <span class="fa fa-fax m-r-xs"></span>
                    <label>Fax:</label>
                    <?= empty($modelJemaatDetails->fax) ? 'Tidak ada' : $modelJemaatDetails->fax?>
                  </li>
                  <hr/>            
                  <li>
                    <span class="fa fa-globe m-r-xs"></span>
                    <label>Website:</label>
                    <?= empty($modelJemaatDetails->website) ? 'Tidak ada' : 
                            Html::a(Html::encode($modelJemaatDetails->website) . ' <i class="fa fa-external-link"></i>', 
                              $modelJemaatDetails->website, ['target' => '_blank']) ?>
                  </li>   
                  <hr/>                
                </ul>
              </div> <!-- boxDetailKontak -->                  

              <div class="widget style1 bg-success">
                  <h4><?= $model->namaFull?> dalam Distrik dan Resort</h4>
                  <?= $groupsContent ?>
              </div>

              <?php 
              if ($model->level_jemaat_id < 3) {
              ?>
                <div id="boxStrukturJemaat" class="box box-primary">
                  <div class="box-header with-border">
                      <h4 class="box-title label label-default">Daftar Jemaat</h4>
                  </div>
                  <div class="box-body">
                    <?php Pjax::begin(); ?>    <?= GridView::widget(
                      [
                        'id' => 'gridViewDaftarJemaat',
                        'dataProvider' => $downLineDataProvider,
                        'summary' => '',
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],
                            ['attribute' => 'nama', 'value' => 'namaFull'],
                        ],
                        'emptyText' => 'Tidak ada data',
                      ]); 
                    ?>
                    <?php Pjax::end(); ?>
                  </div>
                </div> <!-- boxStrukturJemaat -->
              <?php
              }
              ?>

            </div> <!-- colTentangJemaatLeft -->

            <div id="colTentangJemaatCenter" class="col-lg-6">

              <div class="widget style1">        
                <div id="map" style="height:300px;"></div>
              </div>              

              <div id="boxNarasi" class="widget style1">
                <h2>Narasi/Tentang Jemaat</h2>
                <p><?= $modelJemaatHistory->narasi?></p>
              </div> <!-- boxNarasi -->   
            </div>

            <div id="colTentangJemaatRight" class="col-lg-3">
              <h2>Sejarah <?= $model->namaFull?></h2>

              <div id="vertical-timeline" class="vertical-container light-timeline no-margins">

                <?php
                  $bgCounter = 0;
                  foreach ($modelJemaatHistory as $nameHistory => $valueHistory) {
                    if (in_array($nameHistory, ['id', 'jemaat_id', 'narasi']))
                      continue;

                    if (empty($valueHistory))
                      continue;

                    $judul = $modelJemaatHistory->getAttributeLabel($nameHistory);
                    $tanggalFromDB = $valueHistory;
                    $tanggal = Carbon::createFromFormat('Y-m-d', $tanggalFromDB);
                    $relative = $tanggal->diffForHumans(Carbon::now());

                    $tahunTag = Html::tag('h2', $tanggal->format('Y'), []);
                    $judulTag = Html::tag('p', $judul, []);

                    $relativeTag = Html::tag('small', $relative, []);
                    $tanggalTag = Html::tag('span',  $tanggal->format('d F Y') . '<br>' . $relativeTag, ["class" => "vertical-date"]);

                    $timeLineContent = Html::tag('div',
                      $tahunTag . $judulTag . $tanggalTag,
                      ['class' => 'vertical-timeline-content']);

                    $icon = Html::tag('i','', ['class' => 'fa fa-bookmark']);
                    $timeLineIcon = Html::tag('div', $icon, ['class' => 'vertical-timeline-icon ' . $bgArray[$bgCounter++]]);

                    $timeLineBlock = Html::tag('div', $timeLineIcon . $timeLineContent, ['class' => 'vertical-timeline-block']);

                    echo $timeLineBlock;

                    if ($bgCounter >= count($bgArray))
                      $bgCounter = 0;

                  }
                ?>      
              </div>            
            </div>

          </div>
        </div> <!-- tentang jemaat -->

        <div id="data-jemaat" class="tab-pane fade">
          <div class="row">
            <div id="colDataJemaat" class="col-lg-5">
              <div id="boxDemografi" class="widget white-bg p-xl">
                <h2>Demografi Jemaat</h2>
                <div>    
                  
                <?php
                  $arrayIcon = ['mayoritas_pekerjaan' => 'fa-briefcase',
                                'mayoritas_pendidikan' => 'fa-graduation-cap',
                                'mayoritas_ekonomi' => 'fa-money',
                                'mayoritas_agama' => 'fa-asterisk',
                                'mayoritas_budaya' => 'fa-eye'];
                  $demografiLabel = ['mayoritas_pekerjaan' => 'label-danger',
                                'mayoritas_pendidikan' => 'label-success',
                                'mayoritas_ekonomi' => 'label-warning',
                                'mayoritas_agama' => 'label-info',
                                'mayoritas_budaya' => 'label-primary'];
                  $demografiMayoritasName = ['mayoritas_pekerjaan', 'mayoritas_pendidikan', 'mayoritas_ekonomi', 'mayoritas_agama', 'mayoritas_budaya'];
                  $demografiKeteranganName = ['keterangan_pekerjaan', 'keterangan_pendidikan', 'keterangan_ekonomi', 'keterangan_agama', 'keterangan_budaya'];
                  foreach($modelJemaatDemografi as $nameDemografi => $valueDemografi) {
                    if (empty($valueDemografi))
                      continue;

                    $keteranganTag = '';
                    $allLabelDemografiTag = '';
                    $titleDemografiTag = '';

                    if (in_array($nameDemografi, $demografiMayoritasName)) {                     
                      $allLabelDemografi = '';
                      foreach ((explode(', ', $valueDemografi)) as $itemValueDemografi) {
                        $labelDemografi = Html::tag('span', $itemValueDemografi, ['class' => 'label ' . $demografiLabel[$nameDemografi]]);
                        $allLabelDemografi = $allLabelDemografi . $labelDemografi . ' ';
                      }
                      $allLabelDemografiTag = Html::tag('p', $allLabelDemografi, []);

                      $iconDemografiTag = Html::tag('i','',['class' => 'fa ' . $arrayIcon[$nameDemografi] . ' margin-r-5']);
                      $titleDemografiTag = "<hr>" . Html::tag('h5', $iconDemografiTag . ' ' . $modelJemaatDemografi->getAttributeLabel($nameDemografi), []);                      
                    }
                    
                    if (in_array($nameDemografi, $demografiKeteranganName)) {
                      $keteranganTag = Html::tag('p', $valueDemografi, ['class' => 'text-muted']);
                      $keteranganTag = $keteranganTag;
                    }

                    $blockDemografiTag = $titleDemografiTag . $allLabelDemografiTag . $keteranganTag;

                    echo $blockDemografiTag;
                  }
                ?>
                </div>
              </div> <!-- boxDemografi -->
            </div>

            <div id="colPelayan" class="col-lg-7">
              
              <div id="boxPorhanger" class="widget white-bg p-xl">
                <h2><i class="fa fa-user"></i> Pengantar Jemaat</h2>
                <hr>
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
                    ],
                ]); ?>
                <?php Pjax::end(); ?>  
              </div> <!-- boxPorhanger -->     

              <div id="boxFullTimer" class="widget white-bg p-xl">                 
                <h2><i class="fa fa-user"></i> Pendeta/Penginjil</h2>
                <hr>
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
                    ],
                ]); ?>
                <?php Pjax::end(); ?>
              </div> <!-- boxFullTimer -->    
            </div> <!-- colPelayan -->            

          </div> <!-- row -->  
        </div> <!-- data-jemaat -->
     
        <div id="kegiatan-jemaat" class="tab-pane fade">
          <div class="row">          
            <div class="col-lg-6">

              <div id="boxPartonggoan" class="widget style1 white-bg">
                <h2>Partonggoan</h2>
                <hr>
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
                    ],
                ]); ?>
                <?php Pjax::end(); ?>  
              </div> <!-- panel-body -->              

              <div id="sectionSekolahMinggu" class="widget style1 white-bg">                 
                <h2>Sekolah Minggu</h2>
                <hr>
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
                    ],
                ]); ?>
                <?php Pjax::end(); ?>  
              </div> <!-- sectionSekolahMinggu -->

              <div id="sectionRemaja" class="widget style1 white-bg">
                <h2>Remaja</h2>
                <hr>
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
                    ],
                ]); ?>
                <?php Pjax::end(); ?>  
              </div> <!-- sectionRemaja -->

              <div id="sectionPemuda" class="widget style1 white-bg">
                <h2>Pemuda</h2>
                <hr>
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
                    ],
                ]); ?>
                <?php Pjax::end(); ?>  
              </div> <!-- sectionPemuda -->      

              <div id="sectionBapa" class="widget style1 white-bg">
                <h2>Bapa</h2>
                <hr>
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
                    ],
                ]); ?>
                <?php Pjax::end(); ?>  
              </div>  <!-- sectionBapa -->    

              <div id="sectionWanita" class="widget style1 white-bg">
                <h2>Wanita</h2>
                <hr>
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
                    ],
                ]); ?>
                <?php Pjax::end(); ?>  
              </div> <!-- sectionWanita -->            

              <div id="sectionLansia" class="widget style1 white-bg">
                <h2>Lanjut Usia</h2>
                <hr>
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
                    ],
                ]); ?>
                <?php Pjax::end(); ?>  
              </div> <!-- sectionLansia -->

              <div id="sectionProfesi" class="widget style1 white-bg">
                <h2>Profesi-Dewasa</h2>
                <hr>
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
                    ],
                ]); ?>
                <?php Pjax::end(); ?>  
              </div> <!-- sectionProfesi -->

              <div id="sectionMajelis" class="widget style1 white-bg">
                <h2>Majelis Jemaat</h2>
                <hr>
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
                    ],
                ]); ?>
                <?php Pjax::end(); ?>  
              </div> <!-- sectionMajelis -->
            </div>

            <div class="col-lg-6">

              <h2>Program Jemaat</h2>

              <div id="sectionPastoral" class="widget style1 white-bg active">
                <h4>Pastoral</h4>
                <hr>
                <?php Pjax::begin(); ?>  
                <?= GridView::widget([
                    'id' => 'gridViewPastoral',
                    'dataProvider' => $pastoralDataProvider,
                    'summary' => '',
                    'columns' => [
                      ['class' => 'yii\grid\SerialColumn'],
                      'program.nama_program',
                      'keterangan:ntext',
                    ],
                ]); ?>
                <?php Pjax::end(); ?>  

                <h4>Diakonia Internal</h4>
                <hr>
                <?php Pjax::begin(); ?>  
                <?= GridView::widget([
                    'id' => 'gridViewDiakoniaInternal',
                    'dataProvider' => $diakoniaInternalDataProvider,
                    'summary' => '',
                    'columns' => [
                      ['class' => 'yii\grid\SerialColumn'],
                      'program.nama_program',
                      'keterangan:ntext',
                    ],
                ]); ?>
                <?php Pjax::end(); ?>  
                <h4>Diakonia Eksternal</h4>
                <hr>
                <?php Pjax::begin(); ?>
                <?= GridView::widget([
                    'id' => 'gridViewDiakoniaEksternal',
                    'dataProvider' => $diakoniaEksternalDataProvider,
                    'summary' => '',
                    'columns' => [
                      ['class' => 'yii\grid\SerialColumn'],
                      'program.nama_program',
                      'keterangan:ntext',
                    ],
                ]); ?>
                <?php Pjax::end(); ?>  
                <h4>Kesaksian</h4>
                <hr>
                <?php Pjax::begin(); ?>
                <?= GridView::widget([
                    'id' => 'gridViewKesaksian',
                    'dataProvider' => $kesaksianDataProvider,
                    'summary' => '',
                    'columns' => [
                      ['class' => 'yii\grid\SerialColumn'],
                      'program.nama_program',
                      'keterangan:ntext',
                    ],
                ]); ?>
                <?php Pjax::end(); ?>  
              </div>  <!-- sectionKesaksian -->              

            </div> <!-- column -->
          </div> <!-- row -->
        </div>

      </div> <!-- tab-content -->
    </div> <!-- rowContent -->

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
