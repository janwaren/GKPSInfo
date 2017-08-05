<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use dosamigos\datepicker\DatePicker;
use kartik\select2\Select2;
use kartik\file\FileInput;
use wbraganca\dynamicform\DynamicFormWidget;
use dosamigos\selectize\SelectizeDropDownList;

use frontend\models\EtcUniversitas;
use frontend\models\EtcStrata;
use frontend\models\EtcGelar;
use frontend\models\FullTimerJabatan;
use frontend\models\Jemaat;
use frontend\models\KarirEtcJabatan;
use frontend\models\OrganisasiKantorPusat;
use frontend\models\OrganisasiLuarGkps;
use frontend\models\OrganisasiKepanitiaan;
use frontend\models\EtcRelasiKeluarga;

/* @var $this yii\web\View */
/* @var $model backend\models\FullTimer */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="full-timer-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data'], 'id' => 'dynamic-form']); ?>

    <!-- ======================================= -->
    <!-- Fill Data Utama                         -->
    <!-- ======================================= -->

    <div class="row text-center">
    <?= isset($model->photo_file) ? Html::img($model->photo_file, ['width' => '200', 'height' => '200']) : ''?> 
    </div>

    <div class="row">
        <div class="col-sm-3">
            <?= $form->field($model, 'gelarDepan')->widget(
                Select2::classname(), 
                [
                    'data' => ArrayHelper::map(EtcGelar::find()->orderBy('singkatan')->where(['posisi' => 'depan'])->all(), 'singkatan', 'singkatan'),
                    'language' => 'id',
                    'maintainOrder' => true,
                    'options' => ['placeholder' => !empty($model->gelar_depan) ? $model->gelar_depan : 'Pilih Gelar', 'multiple' => true],
                    'pluginOptions' => [
                        'allowClear' => true,
                        'tags' => true,
                        'tokenSeparators' => [',', ' ', ', '],
                    ],
                ]
            );
            ?>             
        </div>

        <div class="col-sm-6">
            <?= $form->field($model, 'nama')->textInput(['maxlength' => true]) ?>
        </div>       

        <div class="col-sm-3">
            <?= $form->field($model, 'gelarBelakang')->widget(
                Select2::classname(), 
                [
                    'data' => ArrayHelper::map(EtcGelar::find()->orderBy('singkatan')->where(['posisi' => 'belakang'])->all(), 'singkatan', 'singkatan'),
                    'language' => 'id',
                    'maintainOrder' => true,
                    'options' => ['placeholder' => !empty($model->gelar_belakang) ? $model->gelar_belakang : 'Pilih Gelar', 'multiple' => true],
                    'pluginOptions' => [
                        'allowClear' => true,
                        'tags' => true,
                        'tokenSeparators' => [', '],                        
                    ],
                ]
            );
            ?> 
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

    <?= $form->field($model, 'photoFile')->widget(FileInput::classname(), [
        'name' => 'attachment_photoFile',
        'pluginOptions' => [
            'showCaption' => false,
            'showUpload' => false,
            'browseClass' => 'btn btn-primary btn-block',
            'browseIcon' => '<i class="glyphicon glyphicon-camera"></i> ',
            'browseLabel' =>  'Pilih Foto',
            'maxFileSize'=> 2048,
            'language' => 'id',
        ],
        'options' => ['accept' => 'image/*']
    ]); ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
