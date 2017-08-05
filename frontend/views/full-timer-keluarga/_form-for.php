<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;

use frontend\models\FullTimer;
use frontend\models\EtcRelasiKeluarga;

/* @var $this yii\web\View */
/* @var $model backend\models\FullTimerKeluarga */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="full-timer-keluarga-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-sm-12">
            <?= $form->field($model, 'nama')->textInput(['maxlength' => true]) ?>
        </div>
    </div><!-- .row -->                        
    <div class="row">
        <div class="col-sm-6">
            <?= $form->field($model, 'relasi_id')->dropDownList(
                ArrayHelper::map(EtcRelasiKeluarga::find()->orderBy('nama_relasi')->all(), 'id', 'nama_relasi'),
                ['prompt' => 'Pilih Relasi Keluarga']
            ) ?>
        </div>
        <div class="col-sm-6">
            <?= $form->field($model, 'jenis_kelamin')->dropDownList([ 'Pria' => 'Pria', 'Wanita' => 'Wanita', ], ['prompt' => '']) ?>
        </div>
    </div><!-- .row -->
    <div class="row">
        <div class="col-sm-4">
            <?= $form->field($model, 'tempat_lahir')->textInput(['maxlength' => true]) ?>
        </div>

        <div class="col-sm-4">
            <?= $form->field($model, 'tanggal_lahir')->widget( DatePicker::className(), [                    
                'inline' => false, 
                'clientOptions' => [
                    'autoclose' => true,
                    'format' => 'yyyy-mm-dd'
                ]]); ?>
        </div>

        <div class="col-sm-4">
            <?= $form->field($model, 'pekerjaan')->textInput(['maxlength' => true]) ?>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
