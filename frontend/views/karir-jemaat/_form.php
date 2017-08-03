<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;

use frontend\models\FullTimer;
use frontend\models\KarirEtcJabatan;
use frontend\models\Jemaat;

/* @var $this yii\web\View */
/* @var $model backend\models\KarirJemaat */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="karir-jemaat-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'full_timer_id')->widget(
        Select2::classname(), 
        [
            'data' => ArrayHelper::map(FullTimer::find()->orderBy('nama')->all(), 'id', 'nama'),
            'language' => 'id',
            'options' => ['placeholder' => 'Pilih Full Timer'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]
    );
    ?> 

    <div class="row">
        <div class="col-sm-6">
            <?= $form->field($model, 'jabatan_id')->dropDownList(
                ArrayHelper::map(KarirEtcJabatan::find()->orderBy('posisi')->all(), 'id', 'posisi'),
                ['prompt' => 'Pilih Posisi']
            ) ?>
        </div>

        <div class="col-sm-6">
            <?= $form->field($model, 'jemaat_id')->widget(
                Select2::classname(), 
                [
                    'data' => ArrayHelper::map(Jemaat::find()->orderBy('nama')->all(), 'id', 'namaFull'),
                    'language' => 'id',
                    'options' => ['placeholder' => 'Pilih Penempatan'],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ]
            );
            ?> 
        </div>

    </div><!-- .row -->
    <div class="row">
        <div class="col-sm-6">
            <?= $form->field($model, 'tahun_mulai')->textInput(['maxlength' => true]) ?>
        </div>

        <div class="col-sm-6">
            <?= $form->field($model, 'tahun_selesai')->textInput(['maxlength' => true]) ?>
        </div>
    </div><!-- .row -->  

    <?= $form->field($model, 'keterangan')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
