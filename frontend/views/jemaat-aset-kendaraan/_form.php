<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\bootstrap\Modal;

use frontend\models\Jemaat;
use frontend\models\EtcJenisKendaraan;

/* @var $this yii\web\View */
/* @var $model backend\models\JemaatAsetKendaraan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="jemaat-aset-kendaraan-form">

    <?php
        Modal::begin([
                'header' => '<h4>Tambah</h4>',
                'id' => 'modalAdd',
                'size' => 'modal-lg',
                'options' => [
                    'tabindex' => false
                ]
            ]);
        echo "<div id='modalAddContent'></div>";
        Modal::end();
    ?>   

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'jemaat_id')->widget(
        Select2::classname(), 
        [
            'data' => ArrayHelper::map(Jemaat::find()->orderBy('nama')->all(), 'id', 'nama'),
            'language' => 'id',
            'options' => ['placeholder' => 'Pilih Jemaat'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]
    );
    ?> 

    <?= $form->field($model, 'jenis_kendaraan_id')->widget(
        Select2::classname(), 
        [
            'data' => ArrayHelper::map(EtcJenisKendaraan::find()->orderBy('jenis_kendaraan')->all(), 'id', 'jenis_kendaraan'),
            'language' => 'id',
            'options' => ['placeholder' => 'Pilih Jenis Kendaraan'],
            'pluginOptions' => [
                'allowClear' => true
            ],
            'addon' => [
                'append' => [
                    'content' => Html::button('<i class="glyphicon glyphicon-plus"></i>', [
                        'value' => Url::to('index.php?r=etc-jenis-kendaraan/create-ajax'), 
                        'class' => 'btn btn-primary btn-create', 
                        'title' => 'Tambah baru', 
                        'data-toggle' => 'tooltip'
                    ]),
                    'asButton' => true
                ]
            ],              
        ]
    );
    ?>     

    <?= $form->field($model, 'merek')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tahun')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kondisi')->dropDownList([ 'Berfungsi Baik' => 'Berfungsi Baik', 'Rusak' => 'Rusak', ], ['prompt' => '']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
