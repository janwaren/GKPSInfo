<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\DashboardAsset;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;

DashboardAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
  <meta charset="<?= Yii::$app->charset ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?= Html::csrfMetaTags() ?>
  <title><?= Html::encode($this->title) ?></title>
  <?php $this->head() ?>
</head>
<body class="hold-transition skin-green-light sidebar-mini fixed">
<?php $this->beginBody() ?>

<div class="wrapper">
  <header class="main-header">

    <!-- Logo -->
    <a href="index.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><img class="img-circle" src="img/logo_gkps_white_50_50.png" alt="GKPS"></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><img class="img-circle" src="img/logo_gkps_white_50_50.png" alt="GKPS"> <b>GKPS</b>Info</span>
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
          <span class="sr-only">Toggle navigation</span>
      </a>

      <!-- Navbar Header Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
            <!-- User Account: style can be found in dropdown.less -->
            <?php
                if (Yii::$app->user->isGuest) {
                    $menuItemsRight[] = ['label' => 'Login', 'url' => ['/user/security/login']];
                    echo Nav::widget([
                        'options' => ['class' => 'navbar-nav'],
                        'items' => $menuItemsRight,
                    ]);                            
                } else {
            ?>
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
                            <span class="hidden-xs"><?= Yii::$app->user->identity->username ?></span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header">
                                <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                                <p>
                                    <?= Yii::$app->user->identity->username ?> - Web Developer
                                    <small>Member since Nov. 2012</small>
                                </p>
                            </li>
                            <!-- Menu Body -->
                            <li class="user-body">
                                <div class="row">
                                    <div class="col-xs-4 text-center">
                                        <a href="#">Followers</a>
                                    </div>
                                    <div class="col-xs-4 text-center">
                                        <a href="#">Sales</a>
                                    </div>
                                    <div class="col-xs-4 text-center">
                                        <a href="#">Friends</a>
                                    </div>
                                </div>
                                <!-- /.row -->
                            </li>
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="#" class="btn btn-default btn-flat">Profile</a>
                                </div>
                                <div class="pull-right">
                                    <?= Html::beginForm(['/user/security/logout'], 'post')
                                            . Html::submitButton(
                                                'Logout',
                                                ['class' => 'btn btn-default btn-flat']
                                            )
                                            . Html::endForm() 
                                    ?>
                                </div>
                            </li>
                        </ul>
                    </li>
            <?php                            
                }                            
            ?>
        </ul> <!-- nav navbar-nav -->
      </div> <!-- navbar-custom-menu -->
    </nav>
  </header>

  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?= Yii::$app->user->isGuest ? 'Login' : Yii::$app->user->identity->username ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">DATA UTAMA</li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-user"></i> <span>Full Timer</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li>
              <!-- search form -->
              <form action="" method="get" class="sidebar-form">
                <div class="input-group">
                  <input type="text" name="FullTimerSearch[nama]" class="form-control" placeholder="Cari Nama...">
                      <span class="input-group-btn">
                        <button type="submit" value="full-timer/index" name="r" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                        </button>
                      </span>
                </div>
              </form>
              <!-- /.search form -->                    
            </li>


            <li>
              <?= Html::a('<i class="fa fa-circle-o"></i> Tampil Semua</a>', 
                          Url::toRoute(['full-timer/index'])
              ) ?>                      
            </li>

            <li >
              <a href="#"><i class="fa fa-circle-o"></i> Menurut Jabatan
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li>
                  <?= Html::a('<i class="fa fa-circle-o"></i> Pendeta</a>', 
                              Url::toRoute(['full-timer/index', 'FullTimerSearch' => ['jabatan_id' => 1]])
                  ) ?>                      
                </li>
                <li>
                  <?= Html::a('<i class="fa fa-circle-o"></i> Penginjil</a>', 
                              Url::toRoute(['full-timer/index', 'FullTimerSearch' => ['jabatan_id' => 2]])
                  ) ?>
                </li>
              </ul>
            </li> <!-- Menu Menurut Jabatan -->

          </ul> <!-- treeview-menu-level1 -->
        </li> <!-- treeview -->
        <li class="treeview">
          <a href="#">
            <i class="fa fa-group"></i> <span>Jemaat</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li>
              <!-- search form -->
              <form action="" method="get" class="sidebar-form">
                <div class="input-group">
                  <input type="text" name="JemaatSearch[nama]" class="form-control" placeholder="Cari Jemaat...">
                      <span class="input-group-btn">
                        <button type="submit" value="jemaat/index" name="r" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                        </button>
                      </span>
                </div>
              </form>
              <!-- /.search form -->                    
            </li>
            <li>
                <?= Html::a('<i class="fa fa-circle-o"></i> Struktur</a>', 
                            Url::toRoute(['jemaat/index', 'id' => 1])
                ) ?>   
            </li>
            <li>
                <?= Html::a('<i class="fa fa-circle-o"></i> Distrik</a>', 
                            Url::toRoute(['jemaat/index', 'JemaatSearch' => ['level_jemaat_id' => 1]])
                ) ?>   
            </li>
          </ul> <!-- treeview-menu -->
        </li> <!-- treeview -->                           
      </ul> <!-- sidebar-menu -->

      <ul class="sidebar-menu">
        <li class="header">DATA PENDUKUNG</li>
        <li class="treeview">
          <?= Html::a('<i class="fa fa-circle-o"></i> Universitas</a>', 
                      Url::toRoute(['etc-universitas/index'])
          ) ?>         
        </li>
        <li class="treeview">
          <?= Html::a('<i class="fa fa-circle-o"></i> Gelar</a>', 
                      Url::toRoute(['etc-gelar/index'])
          ) ?>         
        </li>      
        <li class="treeview">
          <?= Html::a('<i class="fa fa-circle-o"></i> Posisi penempatan</a>', 
                      Url::toRoute(['karir-etc-jabatan/index'])
          ) ?>         
        </li>   
        <li class="treeview">
          <?= Html::a('<i class="fa fa-circle-o"></i> Kegiatan Kategorial</a>',
                      Url::toRoute(['jemaat-kategorial-kegiatan/index'])
          ) ?>        
        </li>
        <li class="treeview">
          <?= Html::a('<i class="fa fa-circle-o"></i> Jenis Program Jemaat</a>',
                      Url::toRoute(['jemaat-program-jenis/index'])
          ) ?>        
        </li>
        <li >
          <a href="#"><i class="fa fa-circle-o"></i> Organisasi
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="treeview">
              <?= Html::a('<i class="fa fa-circle-o"></i> Kepanitiaan GKPS</a>', 
                          Url::toRoute(['organisasi-kepanitiaan/index'])
              ) ?>         
            </li> 
            <li class="treeview">
              <?= Html::a('<i class="fa fa-circle-o"></i> External GKPS</a>', 
                          Url::toRoute(['organisasi-luar-gkps/index'])
              ) ?>         
            </li>             
            <li class="treeview">
              <?= Html::a('<i class="fa fa-circle-o"></i> Kantor Pusat GKPS</a>', 
                          Url::toRoute(['organisasi-kantor-pusat/index'])
              ) ?>         
            </li>                         
          </ul>
        </li> <!-- Menu Menurut Jabatan -->

         
      </ul> <!-- sidebar-menu -->      
    </section>
  <!-- /.sidebar -->
  </aside>  

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <?= Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>

        </section>

        <!-- Main content -->
        <section class="content">
            <?= Alert::widget() ?>
            <?= $content ?>
        </section>
        </div>

    <!-- /.control-sidebar -->
    <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>

</div> 

<footer class="main-footer">
    <div class="pull-right hidden-xs">
        <b>Version</b> 0.0.1
    </div>
    <strong>Copyright &copy; 2016 <a href="http://gkpsinfo.or.id">Gereja Kristen Protestan Simalungun (GKPS)</a>.</strong> All rights
    reserved.
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
