<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;

use backend\models\FullTimer;
use backend\models\KarirEtcJabatan;
use backend\models\OrganisasiKantorPusat;

/* @var $this yii\web\View */
/* @var $model backend\models\KarirKantorPusat */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="karir-kantor-pusat-form">

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
            <?= $form->field($model, 'organisasi_kantor_pusat_id')->widget(
                Select2::classname(), 
                [
                    'data' => ArrayHelper::map(OrganisasiKantorPusat::find()->orderBy('level_internal_id')->all(), 'id', 'fullName'),
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

    <?= $form->field($model, 'keterangan')->textarea(['rows' => 6]) ?>     

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
