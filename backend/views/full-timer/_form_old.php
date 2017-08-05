<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use dosamigos\datepicker\DatePicker;
use kartik\select2\Select2;
use wbraganca\dynamicform\DynamicFormWidget;
use dosamigos\selectize\SelectizeDropDownList;

use backend\models\EtcUniversitas;
use backend\models\EtcStrata;
use backend\models\EtcGelar;
use backend\models\FullTimerJabatan;
use backend\models\Jemaat;
use backend\models\KarirEtcJabatan;
use backend\models\OrganisasiKantorPusat;
use backend\models\OrganisasiLuarGkps;
use backend\models\OrganisasiKepanitiaan;
use backend\models\EtcRelasiKeluarga;

/* @var $this yii\web\View */
/* @var $model backend\models\FullTimer */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="full-timer-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data'], 'id' => 'dynamic-form']); ?>

    <!-- ======================================= -->
    <!-- Fill Data Utama                         -->
    <!-- ======================================= -->

    <div class="row">
        <div class="col-sm-2">
            <?= $form->field($model, 'gelar_depan')->textInput(['maxlength' => true]) ?>
        </div>

        <div class="col-sm-8">
            <?= $form->field($model, 'nama')->textInput(['maxlength' => true]) ?>
        </div>

        <div class="col-sm-2">
            <?= $form->field($model, 'gelar_belakang')->textInput(['maxlength' => true]) ?>
        </div>
    </div>

    <?= $form->field($model, 'jabatan_id')->dropDownList(
            ArrayHelper::map(FullTimerJabatan::find()->all(), 'id', 'nama'),
            ['prompt' => 'Pilih Jabatan']
        ) ?>

    <?= $form->field($model, 'jenis_kelamin')->dropDownList([ 'Pria' => 'Pria', 'Wanita' => 'Wanita', '?' => '?', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'hp')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'alamat_rumah')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'user_id')->textInput() ?>

    <?= $form->field($model, 'no_induk')->textInput(['maxlength' => true]) ?>

    <?= isset($model->photo_file) ? Html::img($model->photo_file, ['width' => '200', 'height' => '200']) : ''?>
    <?= $form->field($model, 'photoFile')->fileInput(); ?>    

    <!-- ======================================= -->
    <!-- Fill Riwayat Hidup                      -->
    <!-- ======================================= -->

    <div class="panel panel-primary">
        <div class="panel-heading">Riwayat Hidup</div>
        <div class="panel-body">            

            <div class="row">
                <div class="col-sm-6">
                    <?= $form->field($modelRiwayatHidup, 'tempat_lahir')->textInput(['maxlength' => true]) ?>
                </div>

                <div class="col-sm-6">
                    <?= $form->field($modelRiwayatHidup, 'tanggal_lahir')->widget( DatePicker::className(), [                    
                        'inline' => false, 
                        'clientOptions' => [
                            'autoclose' => true,
                            'format' => 'yyyy-mm-dd'
                        ]]); ?>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-6">
                    <?= $form->field($modelRiwayatHidup, 'gereja_baptis')->textInput(['maxlength' => true]) ?>
                </div>

                <div class="col-sm-6">
                    <?= $form->field($modelRiwayatHidup, 'tanggal_baptis')->widget( DatePicker::className(), [
                        'inline' => false, 
                        'clientOptions' => [
                            'autoclose' => true,
                            'format' => 'yyyy-mm-dd'
                        ]]); ?>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-6">
                    <?= $form->field($modelRiwayatHidup, 'gereja_sidi')->textInput(['maxlength' => true]) ?>
                </div>

                <div class="col-sm-6">
                    <?= $form->field($modelRiwayatHidup, 'tanggal_sidi')->widget( DatePicker::className(), [
                        'inline' => false, 
                        'clientOptions' => [
                            'autoclose' => true,
                            'format' => 'yyyy-mm-dd'
                        ]]); ?>          
                </div>
            </div>

            <div class="panel panel-danger">
                <div class="panel-heading">Pernikahan</div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <?= $form->field($modelRiwayatHidup, 'gereja_nikah')->textInput(['maxlength' => true]) ?>
                        </div>

                        <div class="col-sm-6">
                            <?= $form->field($modelRiwayatHidup, 'tanggal_nikah')->widget( DatePicker::className(), [
                                'inline' => false, 
                                'clientOptions' => [
                                    'autoclose' => true,
                                    'format' => 'yyyy-mm-dd'
                                ]]); ?>
                        </div>
                    </div>
                    <?= $form->field($modelRiwayatHidup, 'nama_pendeta')->textInput(['maxlength' => true]) ?>
                </div>
            </div>  

            <?= $form->field($modelRiwayatHidup, 'kisah_hidup')->textarea(['rows' => 6]) ?>

        </div>
    </div>



    <!-- ======================================= -->
    <!-- Fill Pelayanan                          -->
    <!-- ======================================= -->

    <div class="panel panel-primary">
        <div class="panel-heading">Pelayanan</div>
        <div class="panel-body">    

            <div class="row">
                <div class="col-sm-6">
                    <?= $form->field($modelPelayanan, 'jemaat_tahbis_id')->widget(
                            Select2::classname(), 
                            [
                                'data' => ArrayHelper::map(Jemaat::find()->where('level_jemaat_id = 3')->orderBy('nama')->all(), 'id', 'nama'),
                                'language' => 'id',
                                'options' => ['placeholder' => 'Pilih jemaat'],
                                'pluginOptions' => [
                                    'allowClear' => true
                                ],
                            ]
                        );
                    ?>    
                </div>

                <div class="col-sm-6">
                    <?= $form->field($modelPelayanan, 'tanggal_tahbis')->widget( DatePicker::className(), [
                        'inline' => false, 
                        'clientOptions' => [
                            'autoclose' => true,
                            'format' => 'yyyy-mm-dd'
                        ]]); ?>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-3">
                    <?= $form->field($modelPelayanan, 'golongan')->textInput() ?>
                </div>
                <div class="col-sm-3">
                    <?= $form->field($modelPelayanan, 'ruang')->textInput() ?>
                </div>
                <div class="col-sm-6">
                    <?= $form->field($modelPelayanan, 'gaji_terakhir')->textInput() ?>
                </div>
            </div>

            <?= $form->field($modelPelayanan, 'refleksi_pribadi_pelayanan')->textarea(['rows' => 6]) ?>

            <?= $form->field($modelPelayanan, 'pencapaian_pelayanan')->textarea(['rows' => 6]) ?>

            <?= $form->field($modelPelayanan, 'visi_pribadi')->textarea(['rows' => 6]) ?>

            <?= $form->field($modelPelayanan, 'misi_pribadi')->textarea(['rows' => 6]) ?>

            <?= $form->field($modelPelayanan, 'motto')->textarea(['rows' => 6]) ?>
        </div>
    </div>

    <!-- ======================================= -->
    <!-- Fill Pendidikan                         -->
    <!-- ======================================= -->

    <div class="panel panel-primary">
        <div class="panel-heading">Riwayat Pendidikan</div>
        <div class="panel-body">

            <div class="row">
                <div class="col-sm-10">
                    <?= $form->field($modelSekolah, 'sd')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-sm-2">
                    <?= $form->field($modelSekolah, 'tahun_lulus_sd')->textInput(['maxlength' => true]) ?>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-10">
                    <?= $form->field($modelSekolah, 'smp')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-sm-2">
                    <?= $form->field($modelSekolah, 'tahun_lulus_smp')->textInput(['maxlength' => true]) ?>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-10">
                    <?= $form->field($modelSekolah, 'sma')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-sm-2">
                    <?= $form->field($modelSekolah, 'tahun_lulus_sma')->textInput(['maxlength' => true]) ?>
                </div>
            </div> 

            <?php DynamicFormWidget::begin([
                'widgetContainer' => 'dynamicform_wrapper', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]
                'widgetBody' => '.container-items', // required: css class selector
                'widgetItem' => '.item-kuliah', // required: css class
                'limit' => 5, // the maximum times, an element can be cloned (default 999)
                'min' => 1, // 0 or 1 (default 1)
                'insertButton' => '.add-item-kuliah', // css class
                'deleteButton' => '.remove-item-kuliah', // css class
                'model' => $modelsKuliah[0],
                'formId' => 'dynamic-form',
                'formFields' => [
                    'universitas_id',
                    'tahun_masuk',
                    'strata_id',
                    'gelar_id',
                    'judul_thesis'
                ],
            ]); ?>

            <div class="container-items"><!-- widgetContainer -->
            <?php foreach ($modelsKuliah as $i => $modelKuliah): ?>
                <div class="item-kuliah panel panel-success"><!-- widgetBody -->
                    <div class="panel-heading">
                        <h3 class="panel-title pull-left">Perkuliahaan</h3>
                        <div class="pull-right">
                            <button type="button" class="add-item-kuliah btn btn-success btn-xs"><i class="glyphicon glyphicon-plus"></i></button>
                            <button type="button" class="remove-item-kuliah btn btn-danger btn-xs"><i class="glyphicon glyphicon-minus"></i></button>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-body">
                        <?php
                            // necessary for update action.
                            if (! $modelKuliah->isNewRecord) {
                                echo Html::activeHiddenInput($modelKuliah, "[{$i}]id");
                            }
                        ?>
                        <div class="row">
                            <div class="col-sm-6">
                                <?= $form->field($modelKuliah, "[{$i}]universitas_id")->dropDownList(
                                    ArrayHelper::map(EtcUniversitas::find()->orderBy('nama')->all(), 'id', 'nama'),
                                    ['prompt' => 'Pilih Universitas']
                                ) ?>
                            </div>
                            <div class="col-sm-6">
                                <?= $form->field($modelKuliah, "[{$i}]tahun_masuk")->textInput(['maxlength' => true]) ?>
                            </div>
                        </div><!-- .row -->
                        <div class="row">
                            <div class="col-sm-6">
                                <?= $form->field($modelKuliah, "[{$i}]strata_id")->dropDownList(
                                    ArrayHelper::map(EtcStrata::find()->orderBy('nama')->all(), 'id', 'nama'),
                                    ['prompt' => 'Pilih Strata']
                                ) ?>
                            </div>
                            <div class="col-sm-6">
                                <?= $form->field($modelKuliah, "[{$i}]gelar_id")->dropDownList(
                                    ArrayHelper::map(EtcGelar::find()->orderBy('singkatan')->all(), 'id', 'singkatan'),
                                    ['prompt' => 'Pilih Gelar']
                                ) ?>
                            </div>
                        </div><!-- .row -->
                        <?= $form->field($modelKuliah, "[{$i}]judul_thesis")->textarea(['rows' => 3]) ?>
                    </div>
                </div>
            <?php endforeach; ?>
            </div>
            <?php DynamicFormWidget::end(); ?>
        </div>
    </div>


    <!-- ======================================= -->
    <!-- Fill Kursus                             -->
    <!-- ======================================= -->

    <div class="panel panel-primary">
        <div class="panel-heading">Riwayat Pendidikan Informal</div>
        <div class="panel-body">

            <?php DynamicFormWidget::begin([
                'widgetContainer' => 'dynamicform_wrapper', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]
                'widgetBody' => '.container-items', // required: css class selector
                'widgetItem' => '.item-kursus', // required: css class
                'limit' => 10, // the maximum times, an element can be cloned (default 999)
                'min' => 1, // 0 or 1 (default 1)
                'insertButton' => '.add-item-kursus', // css class
                'deleteButton' => '.remove-item-kursus', // css class
                'model' => $modelsKursus[0],
                'formId' => 'dynamic-form',
                'formFields' => [
                    'nama_kursus',
                    'tahun',
                ],
            ]); ?>

            <div class="container-items"><!-- widgetContainer -->
            <?php foreach ($modelsKursus as $i => $modelKursus): ?>
                <div class="item-kursus panel panel-success"><!-- widgetBody -->
                    <div class="panel-heading">
                        <h3 class="panel-title pull-left">Kursus dan Pelatihan</h3>
                        <div class="pull-right">
                            <button type="button" class="add-item-kursus btn btn-success btn-xs"><i class="glyphicon glyphicon-plus"></i></button>
                            <button type="button" class="remove-item-kursus btn btn-danger btn-xs"><i class="glyphicon glyphicon-minus"></i></button>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-body">
                        <?php
                            // necessary for update action.
                            if (! $modelKursus->isNewRecord) {
                                echo Html::activeHiddenInput($modelKursus, "[{$i}]id");
                            }
                        ?>
                        <div class="row">
                            <div class="col-sm-6">
                                <?= $form->field($modelKursus, "[{$i}]nama_kursus")->textInput(['maxlength' => true]) ?>
                            </div>
                            <div class="col-sm-6">
                                <?= $form->field($modelKursus, "[{$i}]tahun")->textInput(['maxlength' => true]) ?>
                            </div>
                        </div><!-- .row -->
                    </div>
                </div>
            <?php endforeach; ?>
            </div>
            <?php DynamicFormWidget::end(); ?>
        </div>
    </div>

    <!-- ======================================= -->
    <!-- Fill Karir Ber-jemaat                   -->
    <!-- ======================================= -->

    <div class="panel panel-primary">
        <div class="panel-heading">Tugas Berjemaat</div>
        <div class="panel-body">

            <?php DynamicFormWidget::begin([
                'widgetContainer' => 'dynamicform_wrapper', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]
                'widgetBody' => '.container-items', // required: css class selector
                'widgetItem' => '.item-karir-jemaat', // required: css class
                'limit' => 20, // the maximum times, an element can be cloned (default 999)
                'min' => 1, // 0 or 1 (default 1)
                'insertButton' => '.add-item-karir-jemaat', // css class
                'deleteButton' => '.remove-item-karir-jemaat', // css class
                'model' => $modelsKarirJemaat[0],
                'formId' => 'dynamic-form',
                'formFields' => [
                    'jabatan_id',
                    'jemaat_id',
                    'tahun_mulai',
                    'tahun_selesai'
                ],
            ]); ?>

            <div class="container-items"><!-- widgetContainer -->
            <?php foreach ($modelsKarirJemaat as $i => $modelKarirJemaat): ?>
                <div class="item-karir-jemaat panel panel-success"><!-- widgetBody -->
                    <div class="panel-heading">
                        <h3 class="panel-title pull-left">Penempatan Jemaat</h3>
                        <div class="pull-right">
                            <button type="button" class="add-item-karir-jemaat btn btn-success btn-xs"><i class="glyphicon glyphicon-plus"></i></button>
                            <button type="button" class="remove-item-karir-jemaat btn btn-danger btn-xs"><i class="glyphicon glyphicon-minus"></i></button>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-body">
                        <?php
                            // necessary for update action.
                            if (! $modelKarirJemaat->isNewRecord) {
                                echo Html::activeHiddenInput($modelKarirJemaat, "[{$i}]id");
                            }
                        ?>
                        <div class="row">
                            <div class="col-sm-6">
                                <?= $form->field($modelKarirJemaat, "[{$i}]jabatan_id")->dropDownList(
                                    ArrayHelper::map(KarirEtcJabatan::find()->orderBy('posisi')->all(), 'id', 'posisi'),
                                    ['prompt' => 'Pilih Posisi']
                                ) ?>
                            </div>
                            <div class="col-sm-6">
                                <?= $form->field($modelKarirJemaat, "[{$i}]jemaat_id")->dropDownList(
                                    ArrayHelper::map(Jemaat::find()->orderBy('nama')->all(), 'id', 'namaFull'),
                                    ['prompt' => 'Pilih Penempatan']
                                ) ?>
                            </div>
                        </div><!-- .row -->
                        <div class="row">
                            <div class="col-sm-6">
                                <?= $form->field($modelKarirJemaat, "[{$i}]tahun_mulai")->textInput(['maxlength' => true]) ?>
                            </div>

                            <div class="col-sm-6">
                                <?= $form->field($modelKarirJemaat, "[{$i}]tahun_selesai")->textInput(['maxlength' => true]) ?>
                            </div>
                        </div><!-- .row -->                        
                    </div>
                </div>
            <?php endforeach; ?>
            </div>
            <?php DynamicFormWidget::end(); ?>
        </div>
    </div>

    <!-- ======================================= -->
    <!-- Fill Karir Kantor Pusat                 -->
    <!-- ======================================= -->

    <div class="panel panel-primary">
        <div class="panel-heading">Tugas Kantor Pusat</div>
        <div class="panel-body">

            <?php DynamicFormWidget::begin([
                'widgetContainer' => 'dynamicform_wrapper', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]
                'widgetBody' => '.container-items', // required: css class selector
                'widgetItem' => '.item-karir-kantor-pusat', // required: css class
                'limit' => 20, // the maximum times, an element can be cloned (default 999)
                'min' => 1, // 0 or 1 (default 1)
                'insertButton' => '.add-item-karir-kantor-pusat', // css class
                'deleteButton' => '.remove-item-karir-kantor-pusat', // css class
                'model' => $modelsKarirKantorPusat[0],
                'formId' => 'dynamic-form',
                'formFields' => [
                    'jabatan_id',
                    'organisasi_kantor_pusat_id',
                    'tahun_mulai',
                    'tahun_selesai'
                ],
            ]); ?>

            <div class="container-items"><!-- widgetContainer -->
            <?php foreach ($modelsKarirKantorPusat as $i => $modelKarirKantorPusat): ?>
                <div class="item-karir-kantor-pusat panel panel-success"><!-- widgetBody -->
                    <div class="panel-heading">
                        <h3 class="panel-title pull-left">Penempatan Kantor Pusat</h3>
                        <div class="pull-right">
                            <button type="button" class="add-item-karir-kantor-pusat btn btn-success btn-xs"><i class="glyphicon glyphicon-plus"></i></button>
                            <button type="button" class="remove-item-karir-kantor-pusat btn btn-danger btn-xs"><i class="glyphicon glyphicon-minus"></i></button>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-body">
                        <?php
                            // necessary for update action.
                            if (! $modelKarirKantorPusat->isNewRecord) {
                                echo Html::activeHiddenInput($modelKarirKantorPusat, "[{$i}]id");
                            }
                        ?>
                        <div class="row">
                            <div class="col-sm-6">
                                <?= $form->field($modelKarirKantorPusat, "[{$i}]jabatan_id")->dropDownList(
                                    ArrayHelper::map(KarirEtcJabatan::find()->orderBy('posisi')->all(), 'id', 'posisi'),
                                    ['prompt' => 'Pilih Posisi']
                                ) ?>
                            </div>
                            <div class="col-sm-6">
                                <?= $form->field($modelKarirKantorPusat, "[{$i}]organisasi_kantor_pusat_id")->dropDownList(
                                    ArrayHelper::map(OrganisasiKantorPusat::find()->orderBy('level_internal_id')->all(), 'id', 'fullName'),
                                    ['prompt' => 'Pilih Penempatan']
                                ) ?>
                            </div>
                        </div><!-- .row -->
                        <div class="row">
                            <div class="col-sm-6">
                                <?= $form->field($modelKarirKantorPusat, "[{$i}]tahun_mulai")->textInput(['maxlength' => true]) ?>
                            </div>

                            <div class="col-sm-6">
                                <?= $form->field($modelKarirKantorPusat, "[{$i}]tahun_selesai")->textInput(['maxlength' => true]) ?>
                            </div>
                        </div><!-- .row -->                        
                    </div>
                </div>
            <?php endforeach; ?>
            </div>
            <?php DynamicFormWidget::end(); ?>
        </div>
    </div>

    <!-- ======================================= -->
    <!-- Fill Karir Kepanitiaan                  -->
    <!-- ======================================= -->

    <div class="panel panel-primary">
        <div class="panel-heading">Tugas Kepanitiaan</div>
        <div class="panel-body">

            <?php DynamicFormWidget::begin([
                'widgetContainer' => 'dynamicform_wrapper', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]
                'widgetBody' => '.container-items', // required: css class selector
                'widgetItem' => '.item-karir-kepanitiaan', // required: css class
                'limit' => 20, // the maximum times, an element can be cloned (default 999)
                'min' => 1, // 0 or 1 (default 1)
                'insertButton' => '.add-item-karir-kepanitiaan', // css class
                'deleteButton' => '.remove-item-karir-kepanitiaan', // css class
                'model' => $modelsKarirKepanitiaan[0],
                'formId' => 'dynamic-form',
                'formFields' => [
                    'posisi_id',
                    'kepanitiaan_id',
                    'tahun_mulai',
                    'tahun_selesai'
                ],
            ]); ?>

            <div class="container-items"><!-- widgetContainer -->
            <?php foreach ($modelsKarirKepanitiaan as $i => $modelKarirKepanitiaan): ?>
                <div class="item-karir-kepanitiaan panel panel-success"><!-- widgetBody -->
                    <div class="panel-heading">
                        <h3 class="panel-title pull-left">Penempatan Kepanitiaan di GKPS</h3>
                        <div class="pull-right">
                            <button type="button" class="add-item-karir-kepanitiaan btn btn-success btn-xs"><i class="glyphicon glyphicon-plus"></i></button>
                            <button type="button" class="remove-item-karir-kepanitiaan btn btn-danger btn-xs"><i class="glyphicon glyphicon-minus"></i></button>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-body">
                        <?php
                            // necessary for update action.
                            if (! $modelKarirKepanitiaan->isNewRecord) {
                                echo Html::activeHiddenInput($modelKarirKepanitiaan, "[{$i}]id");
                            }
                        ?>
                        <div class="row">
                            <div class="col-sm-4">
                                <?= $form->field($modelKarirKepanitiaan, "[{$i}]posisi_id")->dropDownList(
                                    ArrayHelper::map(KarirEtcJabatan::find()->orderBy('posisi')->all(), 'id', 'posisi'),
                                    ['prompt' => 'Pilih Posisi']
                                ) ?>
                            </div>
                            <div class="col-sm-6">
                                <?= $form->field($modelKarirKepanitiaan, "[{$i}]kepanitiaan_id")->dropDownList(
                                    ArrayHelper::map(OrganisasiKepanitiaan::find()->orderBy('nama')->all(), 'id', 'fullName'),
                                    ['prompt' => 'Pilih Penempatan']
                                ) ?>
                            </div>
                            <div class="col-sm-2">
                                <?= $form->field($modelKarirKepanitiaan, "[{$i}]tahun")->textInput(['maxlength' => true]) ?>
                            </div>                            
                        </div><!-- .row -->                      
                    </div>
                </div>
            <?php endforeach; ?>
            </div>
            <?php DynamicFormWidget::end(); ?>
        </div>
    </div>

    <!-- ======================================= -->
    <!-- Fill Karir Oikoumene External           -->
    <!-- ======================================= -->

    <div class="panel panel-primary">
        <div class="panel-heading">Tugas Oikoumenis/Organisasi Eksternal</div>
        <div class="panel-body">

            <?php DynamicFormWidget::begin([
                'widgetContainer' => 'dynamicform_wrapper', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]
                'widgetBody' => '.container-items', // required: css class selector
                'widgetItem' => '.item-karir-external', // required: css class
                'limit' => 20, // the maximum times, an element can be cloned (default 999)
                'min' => 1, // 0 or 1 (default 1)
                'insertButton' => '.add-item-karir-external', // css class
                'deleteButton' => '.remove-item-karir-external', // css class
                'model' => $modelsKarirExternal[0],
                'formId' => 'dynamic-form',
                'formFields' => [
                    'jabatan_id',
                    'external_org_id',
                    'tahun_mulai',
                    'tahun_selesai'
                ],
            ]); ?>

            <div class="container-items"><!-- widgetContainer -->
            <?php foreach ($modelsKarirExternal as $i => $modelKarirExternal): ?>
                <div class="item-karir-external panel panel-success"><!-- widgetBody -->
                    <div class="panel-heading">
                        <h3 class="panel-title pull-left">Penempatan Luar GKPS</h3>
                        <div class="pull-right">
                            <button type="button" class="add-item-karir-external btn btn-success btn-xs"><i class="glyphicon glyphicon-plus"></i></button>
                            <button type="button" class="remove-item-karir-external btn btn-danger btn-xs"><i class="glyphicon glyphicon-minus"></i></button>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-body">
                        <?php
                            // necessary for update action.
                            if (! $modelKarirExternal->isNewRecord) {
                                echo Html::activeHiddenInput($modelKarirExternal, "[{$i}]id");
                            }
                        ?>
                        <div class="row">
                            <div class="col-sm-6">
                                <?= $form->field($modelKarirExternal, "[{$i}]jabatan_id")->dropDownList(
                                    ArrayHelper::map(KarirEtcJabatan::find()->orderBy('posisi')->all(), 'id', 'posisi'),
                                    ['prompt' => 'Pilih Posisi']
                                ) ?>
                            </div>
                            <div class="col-sm-6">
                                <?= $form->field($modelKarirExternal, "[{$i}]external_org_id")->dropDownList(
                                    ArrayHelper::map(OrganisasiLuarGkps::find()->orderBy('nama')->all(), 'id', 'fullName'),
                                    ['prompt' => 'Pilih Penempatan']
                                ) ?>
                            </div>
                        </div><!-- .row -->
                        <div class="row">
                            <div class="col-sm-6">
                                <?= $form->field($modelKarirExternal, "[{$i}]tahun_mulai")->textInput(['maxlength' => true]) ?>
                            </div>

                            <div class="col-sm-6">
                                <?= $form->field($modelKarirExternal, "[{$i}]tahun_selesai")->textInput(['maxlength' => true]) ?>
                            </div>
                        </div><!-- .row -->                        
                    </div>
                </div>
            <?php endforeach; ?>
            </div>
            <?php DynamicFormWidget::end(); ?>
        </div>
    </div>

    <!-- ======================================= -->
    <!-- Fill Keluarga                           -->
    <!-- ======================================= -->

    <div class="panel panel-primary">
        <div class="panel-heading">Keluarga</div>
        <div class="panel-body">

            <?php DynamicFormWidget::begin([
                'widgetContainer' => 'dynamicform_wrapper', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]
                'widgetBody' => '.container-items', // required: css class selector
                'widgetItem' => '.item-keluarga', // required: css class
                'limit' => 20, // the maximum times, an element can be cloned (default 999)
                'min' => 1, // 0 or 1 (default 1)
                'insertButton' => '.add-item-keluarga', // css class
                'deleteButton' => '.remove-item-keluarga', // css class
                'model' => $modelsKarirExternal[0],
                'formId' => 'dynamic-form',
                'formFields' => [
                    'nama',
                    'jenis_kelamin',
                    'relasi_id',
                    'tempat_lahir',
                    'tanggal_lahir',
                    'pekerjaan',
                ],
            ]); ?>

            <div class="container-items"><!-- widgetContainer -->
            <?php foreach ($modelsKeluarga as $i => $modelKeluarga): ?>
                <div class="item-keluarga panel panel-success"><!-- widgetBody -->
                    <div class="panel-heading">
                        <h3 class="panel-title pull-left">Anggota Keluarga</h3>
                        <div class="pull-right">
                            <button type="button" class="add-item-keluarga btn btn-success btn-xs"><i class="glyphicon glyphicon-plus"></i></button>
                            <button type="button" class="remove-item-keluarga btn btn-danger btn-xs"><i class="glyphicon glyphicon-minus"></i></button>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-body">
                        <?php
                            // necessary for update action.
                            if (! $modelKeluarga->isNewRecord) {
                                echo Html::activeHiddenInput($modelKeluarga, "[{$i}]id");
                            }
                        ?>
                        <div class="row">
                            <div class="col-sm-12">
                                <?= $form->field($modelKeluarga, 'nama')->textInput(['maxlength' => true]) ?>
                            </div>
                        </div><!-- .row -->                        
                        <div class="row">
                            <div class="col-sm-6">
                                <?= $form->field($modelKeluarga, "[{$i}]relasi_id")->dropDownList(
                                    ArrayHelper::map(EtcRelasiKeluarga::find()->orderBy('nama_relasi')->all(), 'id', 'nama_relasi'),
                                    ['prompt' => 'Pilih Relasi Keluarga']
                                ) ?>
                            </div>
                            <div class="col-sm-6">
                                <?= $form->field($modelKeluarga, 'jenis_kelamin')->dropDownList([ 'Pria' => 'Pria', 'Wanita' => 'Wanita', ], ['prompt' => '']) ?>
                            </div>
                        </div><!-- .row -->
                        <div class="row">
                            <div class="col-sm-4">
                                <?= $form->field($modelKeluarga, 'tempat_lahir')->textInput(['maxlength' => true]) ?>
                            </div>

                            <div class="col-sm-4">
                                <?= $form->field($modelKeluarga, 'tanggal_lahir')->widget( DatePicker::className(), [                    
                                    'inline' => false, 
                                    'clientOptions' => [
                                        'autoclose' => true,
                                        'format' => 'yyyy-mm-dd'
                                    ]]); ?>
                            </div>

                            <div class="col-sm-4">
                                <?= $form->field($modelKeluarga, 'pekerjaan')->textInput(['maxlength' => true]) ?>
                            </div>

                        </div><!-- .row -->                        
                    </div>
                </div>
            <?php endforeach; ?>
            </div>
            <?php DynamicFormWidget::end(); ?>

        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
