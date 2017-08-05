<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;

use frontend\models\Jemaat;
/* @var $this yii\web\View */
/* @var $model backend\models\JemaatStatistik */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="jemaat-statistik-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-md-6">
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
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'tahun_data')->textInput(['maxlength' => true]) ?>
        </div>
    </div>

    <div class="row">    
        <div class="col-md-4">
            <?= $form->field($model, 'jumlah_tangga_banggal')->textInput() ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'jumlah_tangga_etek')->textInput() ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'jumlah_jiwa')->textInput() ?>
        </div>        
    </div>

    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'jumlah_sintua')->textInput() ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'jumlah_syamas')->textInput() ?>
        </div>
    </div>

    <?= $form->field($model, 'nama_pengantar_jemaat')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
