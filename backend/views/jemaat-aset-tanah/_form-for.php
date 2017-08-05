<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use wbraganca\dynamicform\DynamicFormWidget;

use backend\models\Jemaat;
use backend\models\EtcJenisSuratTanah;

/* @var $this yii\web\View */
/* @var $model backend\models\JemaatAsetTanah */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="jemaat-aset-tanah-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data'], 'id' => 'dynamic-form']); ?>

    <div class="row">
      <div class="col-sm-6">
        <?= $form->field($model, 'luas')->textInput() ?>
      </div>

      <div class="col-sm-6">
        <?= $form->field($model, 'lokasi')->textInput(['maxlength' => true]) ?>
      </div>
    </div>

    <div class="row">
      <div class="col-sm-6">
        <?= $form->field($model, 'kondisi_pemakaian')->dropDownList([ 'Hak Guna Bangunan' => 'Hak Guna Bangunan', 'Hak Milik' => 'Hak Milik', ], ['prompt' => '']) ?>
      </div>
      <div class="col-sm-6">
        <?= $form->field($model, 'asal_perolehan')->dropDownList([ 'Pembelian' => 'Pembelian', 'Hibah' => 'Hibah', ], ['prompt' => '']) ?>
      </div>
    </div>

    <div id="sectionSuratTanah" class="box box-primary">
      <div class="box-header with-border">                        
            <h4 class="box-title">Surat-Surat Tanah</h4>
            <div class="clearfix"></div>
        </div>
        <div class="box-body">    
             <?php DynamicFormWidget::begin([
                'widgetContainer' => 'dynamicform_wrapper', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]
                'widgetBody' => '.container-items', // required: css class selector
                'widgetItem' => '.item', // required: css class
                'limit' => 4, // the maximum times, an element can be cloned (default 999)
                'min' => 1, // 0 or 1 (default 1)
                'insertButton' => '.add-item', // css class
                'deleteButton' => '.remove-item', // css class
                'model' => $modelsJemaatAsetSuratTanah[0],
                'formId' => 'dynamic-form',
                'formFields' => [
                    'jenis_surat_tanah_id',
                    'lokasi_surat_tanah',
                ],
            ]); ?>

            <div class="container-items"><!-- widgetContainer -->
            <?php foreach ($modelsJemaatAsetSuratTanah as $i => $modelJemaatAsetSuratTanah): ?>
                <div class="item box box-danger"><!-- widgetBody -->
                    <div class="box-header with-border">
                        <h5 class="box-title">Surat Tanah</h5>
                        <div class="pull-right">
                            <button type="button" class="add-item btn btn-success btn-xs"><i class="glyphicon glyphicon-plus"></i></button>
                            <button type="button" class="remove-item btn btn-danger btn-xs"><i class="glyphicon glyphicon-minus"></i></button>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="box-body">
                        <?php
                            // necessary for update action.
                            if (! $modelJemaatAsetSuratTanah->isNewRecord) {
                                echo Html::activeHiddenInput($modelJemaatAsetSuratTanah, "[{$i}]id");
                            }
                        ?>
                        <div class="row">
                          <div class="col-sm-6">
                            <?= $form->field($modelJemaatAsetSuratTanah, "[{$i}]jenis_surat_tanah_id")->dropDownList(
                                ArrayHelper::map(EtcJenisSuratTanah::find()->orderBy('jenis_surat_tanah')->all(), 'id', 'jenis_surat_tanah'),
                                ['prompt' => 'Pilih Jenis Surat Tanah']
                            ) ?>
                          </div>
                          <div class="col-sm-6">
                            <?= $form->field($modelJemaatAsetSuratTanah, "[{$i}]lokasi_surat_tanah")->textInput(['maxlength' => true]) ?>
                          </div>
                        </div><!-- .row -->
                    </div>
                </div>
            <?php endforeach; ?>
            </div>
            <?php DynamicFormWidget::end(); ?>        
        </div>
    </div> <!-- sectionSuratTanah -->          

    <?= $form->field($model, 'keterangan')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
