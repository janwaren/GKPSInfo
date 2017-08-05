<?php

use yii\widgets\ListView;
use yii\widgets\Pjax;
use yii\helpers\Html;
use yii\helpers\Url;

use nhkey\arh\managers\ActiveRecordHistoryInterface;
use Carbon\Carbon;
use dosamigos\chartjs\ChartJs;

/* @var $this yii\web\View */

$this->title = 'Sistem Informasi GKPS';

$jemaatSqlCount = "SELECT COUNT(*) FROM jemaat WHERE level_jemaat_id = :levelJemaatId";
$distrikCount = Yii::$app->db->createCommand($jemaatSqlCount, [':levelJemaatId' => 1])->queryScalar();
$resortCount = Yii::$app->db->createCommand($jemaatSqlCount, [':levelJemaatId' => 2])->queryScalar();
$jemaatCount = Yii::$app->db->createCommand($jemaatSqlCount, [':levelJemaatId' => 3])->queryScalar();

$jiwaSqlCount = "SELECT SUM(jumlah_jiwa) FROM jemaat_statistik INNER JOIN (SELECT DISTINCT jemaat_id FROM jemaat_statistik) AS tblStatDistinct ON jemaat_statistik.jemaat_id = tblStatDistinct.jemaat_id";
$jiwaCount = Yii::$app->db->createCommand($jiwaSqlCount, [])->queryScalar();

$fullTimerSqlCount = "SELECT COUNT(*) FROM full_timer";
$fullTimerCount = Yii::$app->db->createCommand($fullTimerSqlCount, [])->queryScalar();

$userSqlCount = "SELECT COUNT(*) FROM user";
$userCount = Yii::$app->db->createCommand($userSqlCount, [])->queryScalar();

$fullTimerJabatanSqlCount = "SELECT COUNT(*) FROM full_timer WHERE jabatan_id = :jabatanId";
$pendetaCount = Yii::$app->db->createCommand($fullTimerJabatanSqlCount, [':jabatanId' => 1])->queryScalar();
$penginjilCount = Yii::$app->db->createCommand($fullTimerJabatanSqlCount, [':jabatanId' => 2])->queryScalar();
$penginjilWanitaCount = Yii::$app->db->createCommand($fullTimerJabatanSqlCount, [':jabatanId' => 4])->queryScalar();
$pegawaiTeknisCount = Yii::$app->db->createCommand($fullTimerJabatanSqlCount, [':jabatanId' => 6])->queryScalar();

$statusJemaatSqlCount = "SELECT COUNT(*) FROM jemaat WHERE level_jemaat_id = 3 AND status_jemaat_id = :statusJemaat";
$aktifCount = Yii::$app->db->createCommand($statusJemaatSqlCount, [':statusJemaat' => 3])->queryScalar();
$posPICount = Yii::$app->db->createCommand($statusJemaatSqlCount, [':statusJemaat' => 1])->queryScalar();
$persiapanCount = Yii::$app->db->createCommand($statusJemaatSqlCount, [':statusJemaat' => 2])->queryScalar();

$jemaatByDistrikSqlCount = "SELECT COUNT(*) FROM jemaat WHERE level_jemaat_id = 3 AND super_id IN (SELECT id FROM jemaat WHERE super_id = (SELECT id FROM jemaat WHERE level_jemaat_id = 1 AND nama = :distrik))";
$distrikNames = ['I', 'II', 'III', 'IV', 'V', 'VI', 'VII', 'VIII', 'IX'];
$distrikJemaatCounts = [];
foreach ($distrikNames as $distrikName) {
  array_push($distrikJemaatCounts, $distrik1JemaatCount = Yii::$app->db->createCommand($jemaatByDistrikSqlCount, [':distrik' => $distrikName])->queryScalar());
}
$distrikNames = ['Distrik I', 'Distrik II', 'Distrik III', 'Distrik IV', 'Distrik V', 'Distrik VI', 'Distrik VII', 'Distrik VIII', 'Distrik IX'];

$colorSeries = ["#f56954", "#00a65a", "#f39c12", "#00c0ef", "#3c8dbc", "#d2d6de", "#881177", "#A81500", "#117788"];
$hoverColorSeries = ["#f56954", "#00a65a", "#f39c12", "#00c0ef", "#3c8dbc", "#d2d6de", "#A81500", "#117788"];

?>
<div class="site-index">

  <div class="body-content">

    <!-- Small boxes (Stat box) -->
    <div id="rowInfo" class="row">
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-aqua">
          <div class="inner">
            <h3><?= $jemaatCount ?></h3>
            <p>Jemaat (<?= $resortCount ?> Resort + <?= $distrikCount ?> Distrik)</p>
          </div>
          <div class="icon">
            <i class="ion ion-home"></i>
          </div>
          <a href=<?=Url::toRoute(['jemaat/index', []])?> class="small-box-footer">Info lebih lanjut <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div> <!-- ./col -->
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-green">
          <div class="inner">
            <h3><?= number_format($jiwaCount, 0, ',', '.') ?></h3>
            <p>Jumlah Jiwa</p>
          </div>
          <div class="icon">
            <i class="ion ion-stats-bars"></i>
          </div>
          <a href=<?=Url::toRoute(['jemaat-statistik/index', []])?> class="small-box-footer">Info lebih lanjut <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div> <!-- ./col -->
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-yellow">
          <div class="inner">
            <h3><?=$fullTimerCount?></h3>
            <p>Full Timer</p>
          </div>
          <div class="icon">
            <i class="ion ion-person-add"></i>
          </div>
          <a href=<?=Url::toRoute(['full-timer/index', []])?> class="small-box-footer">Info lebih lanjut <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div> <!-- ./col -->
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-red">
          <div class="inner">
            <h3><?=$userCount?></h3>
            <p>Pengguna Terdaftar</p>
          </div>
          <div class="icon">
            <i class="ion ion-pie-graph"></i>
          </div>
          <a href=<?=Url::toRoute(['user/index', []])?> class="small-box-footer">Info lebih lanjut <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div> <!-- ./col -->
    </div> <!-- /.rowInfo -->    

    <div class="row">
      <div class="col-lg-4">

        <div id="boxFullTimerChart" class="box box-default">
          <div class="box-header with-border">
            <h3 class="box-title">Komposisi Full Timer</h3>

            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
              </button>
              <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <div class="row">
              <div class="col-md-12">
                <?= ChartJs::widget([
                    'id' => 'fullTimerPieChart',
                    'type' => 'doughnut',
                    'options' => [
                        'height' => 400,
                        'width' => 400,
                        'segmentShowStroke' => true,
                    ],
                    'data' => [
                        'labels' => ["Pendeta", "Penginjil", "Penginjil Wanita", "Pegawai Teknis"],
                        'datasets' => [
                            [
                                'backgroundColor' => $colorSeries,
                                'hoverBackgroundColor' => $hoverColorSeries,
                                'data' => [$pendetaCount, $penginjilCount, $penginjilWanitaCount, $pegawaiTeknisCount]
                            ]

                        ]                        
                    ]
                ]);
                ?>
              </div> <!-- col -->
            </div> <!-- /.row -->
          </div>
          <!-- /.box-body -->
          <div class="box-footer no-padding">
            <ul class="nav nav-pills nav-stacked">
              <li><a href="#">Pendeta
                <span class="pull-right text-red"> <?=$pendetaCount?></span></a></li>
              <li><a href="#">Penginjil <span class="pull-right text-green"> <?=$penginjilCount?></span></a>
              </li>
              <li><a href="#">Penginjil Wanita
                <span class="pull-right text-yellow"> <?=$penginjilWanitaCount?></span></a></li>
              <li><a href="#">Petugas Teknis
                <span class="pull-right text-aqua"> <?=$pegawaiTeknisCount?></span></a></li>
            </ul>
          </div>
          <!-- /.footer -->
        </div> <!-- /.boxFullTimerChart -->  

        <div id="boxStatusJemaatChart" class="box box-default">
          <div class="box-header with-border">
            <h3 class="box-title">Status Jemaat</h3>

            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
              </button>
              <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <div class="row">
              <div class="col-md-12">
                <?= ChartJs::widget([
                    'id' => 'statusJemaatDonutChart',
                    'type' => 'doughnut',
                    'options' => [
                        'height' => 400,
                        'width' => 400,
                        'segmentShowStroke' => true,
                    ],
                    'data' => [
                        'labels' => ["Pos PI", "Persiapan", "Jemaat Aktif"],
                        'datasets' => [
                            [
                                'backgroundColor' => $colorSeries,
                                'hoverBackgroundColor' => $hoverColorSeries,
                                'data' => [$posPICount, $persiapanCount, $aktifCount]
                            ]

                        ]                        
                    ]
                ]);
                ?>
              </div> <!-- col -->
            </div> <!-- /.row -->
          </div>
          <!-- /.box-body -->
          <div class="box-footer no-padding">
            <ul class="nav nav-pills nav-stacked">
              <li><a href="#">Pos PI<span class="pull-right text-red"> <?=$posPICount?></span></a></li>
              <li><a href="#">Jemaat Persiapan<span class="pull-right text-green"> <?=$persiapanCount?></span></a></li>
              <li><a href="#">Jemaat Aktif<span class="pull-right text-yellow"> <?=$aktifCount?></span></a></li>
            </ul>
          </div>
          <!-- /.footer -->
        </div> <!-- /.boxStatusJemaatChart -->      

        <div id="boxJemaatByDistrikChart" class="box box-default">
          <div class="box-header with-border">
            <h3 class="box-title">Jumlah Jemaat per Distrik</h3>

            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
              </button>
              <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <div class="row">
              <div class="col-md-12">
                <?= ChartJs::widget([
                    'id' => 'jemaatByDistrikDonutChart',
                    'type' => 'bar',
                    'options' => [
                        'height' => 400,
                        'width' => 400,
                        'segmentShowStroke' => true,
                    ],
                    'data' => [
                        'labels' => $distrikNames,
                        'datasets' => [
                            [
                                'backgroundColor' => $colorSeries,
                                'hoverBackgroundColor' => $hoverColorSeries,
                                'data' => $distrikJemaatCounts
                            ]

                        ]                        
                    ]
                ]);
                ?>
              </div> <!-- col -->
            </div> <!-- /.row -->
          </div>
          <!-- /.box-body -->
          <div class="box-footer no-padding">
<!--             <ul class="nav nav-pills nav-stacked">
              <li><a href="#">Pos PI<span class="pull-right text-red"> <?=$posPICount?></span></a></li>
              <li><a href="#">Jemaat Persiapan<span class="pull-right text-green"> <?=$persiapanCount?></span></a></li>
              <li><a href="#">Jemaat Aktif<span class="pull-right text-yellow"> <?=$aktifCount?></span></a></li>
            </ul> -->
          </div>
          <!-- /.footer -->
        </div> <!-- /.boxJemaatByDistrikChart -->                

        <!-- Calendar -->
        <div id="boxCalendar" class="box box-solid bg-green-gradient">
          <div class="box-header">
            <i class="fa fa-calendar"></i>

            <h3 class="box-title">Calendar</h3>
            <!-- tools box -->
            <div class="pull-right box-tools">
              <!-- button with a dropdown -->
              <div class="btn-group">
                <button type="button" class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-bars"></i></button>
                <ul class="dropdown-menu pull-right" role="menu">
                  <li><a href="#">Add new event</a></li>
                  <li><a href="#">Clear events</a></li>
                  <li class="divider"></li>
                  <li><a href="#">View calendar</a></li>
                </ul>
              </div>
              <button type="button" class="btn btn-success btn-sm" data-widget="collapse"><i class="fa fa-minus"></i>
              </button>
              <button type="button" class="btn btn-success btn-sm" data-widget="remove"><i class="fa fa-times"></i>
              </button>
            </div>
            <!-- /. tools -->
          </div>
          <!-- /.box-header -->
          <div class="box-body no-padding">
            <!--The calendar -->
            <div id="calendar" style="width: 100%"></div>
          </div>
          <!-- /.box-body -->
          <div class="box-footer text-black">
            <div class="row">
              <div class="col-sm-6">
                <!-- Progress bars -->
                <div class="clearfix">
                  <span class="pull-left">Task #1</span>
                  <small class="pull-right">90%</small>
                </div>
                <div class="progress xs">
                  <div class="progress-bar progress-bar-green" style="width: 90%;"></div>
                </div>

                <div class="clearfix">
                  <span class="pull-left">Task #2</span>
                  <small class="pull-right">70%</small>
                </div>
                <div class="progress xs">
                  <div class="progress-bar progress-bar-green" style="width: 70%;"></div>
                </div>
              </div>
              <!-- /.col -->
              <div class="col-sm-6">
                <div class="clearfix">
                  <span class="pull-left">Task #3</span>
                  <small class="pull-right">60%</small>
                </div>
                <div class="progress xs">
                  <div class="progress-bar progress-bar-green" style="width: 60%;"></div>
                </div>

                <div class="clearfix">
                  <span class="pull-left">Task #4</span>
                  <small class="pull-right">40%</small>
                </div>
                <div class="progress xs">
                  <div class="progress-bar progress-bar-green" style="width: 40%;"></div>
                </div>
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
          </div>
        </div> <!-- /.box calendar -->      

      </div> <!-- col -->

      <div class="col-lg-8">
        <div id="modelHistory" class="box box-success">
          <div class="box-header with-border">
              <h4 class="box-title">Update Terkini</h4>
          </div>
          <div class="box-body">      
            <div class="table-responsive mailbox-messages">     
                <?php Pjax::begin(); ?>   <?= ListView::widget([
                  'dataProvider' => $modelHistoryDataProvider,
                  'options' => [
                      'tag' => 'table',
                      'class' => 'table table-hover table-striped',
                      'id' => 'list-wrapper',
                  ],
                  'itemOptions' => ['tag' => 'tr', 'class' => 'item'],
                  'layout' => "{items}\n{pager}\n",    
                  'itemView' => function ($model, $key, $index, $widget) {

                      $dateTimeValue = Carbon::createFromFormat('Y-m-d H:i:s', $model->date);

                      Carbon::setLocale('id');
                      $colTime = Html::tag('td', $dateTimeValue->diffForHumans(Carbon::now(), false), ['class' => 'mailbox-date']);

                      $colUser = Html::tag('td', $model->user->username, ['class' => 'mailbox-name']);
                      if ($model->type == ActiveRecordHistoryInterface::AR_INSERT)
                        $updateLabel = Html::tag('span', 'TAMBAH',['class' => 'label label-success']);
                      else if (($model->type == ActiveRecordHistoryInterface::AR_UPDATE_PK) || ($model->type == ActiveRecordHistoryInterface::AR_UPDATE))
                        $updateLabel = Html::tag('span', 'UBAH',['class' => 'label label-primary']);
                      else if ($model->type == ActiveRecordHistoryInterface::AR_DELETE)
                        $updateLabel = Html::tag('span', 'HAPUS',['class' => 'label label-danger']);

                      $modelLabel = Html::tag('span', $model->model_label,['class' => 'label label-default']);

                      $colType = Html::tag('td', $updateLabel . '<br>' . $modelLabel, ['class' => 'mailbox-star']);

                      $fieldLabel = empty($model->field_label) ? '' : Html::tag('span', $model->field_label,['class' => 'label label-warning']) . '<br>';

                      $colMain = Html::tag('td', $fieldLabel . Html::a(Html::encode($model->fieldCaption), ['model-history/view', 'id' => $model->id]), ['class' => 'mailbox-subject']);

                      return $colTime . $colType . $colMain . $colUser;
                  },
                ]) ?>
                <?php Pjax::end(); ?>
            </div>

          </div> <!-- box-body -->
        </div> <!-- box modelHistory -->
      </div> <!-- col-8 -->
    </div>

  </div>
</div>
