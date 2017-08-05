<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;

use frontend\models\FullTimer;
use frontend\models\EtcUniversitas;
use frontend\models\EtcStrata;
use frontend\models\EtcGelar;

/* @var $this yii\web\View */
/* @var $model backend\models\FullTimerKuliah */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="full-timer-kuliah-form">

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
            <?= $form->field($model, 'universitas_id')->widget(
                Select2::classname(), 
                [
                    'data' => ArrayHelper::map(EtcUniversitas::find()->orderBy('nama')->all(), 'id', 'nama'),
                    'language' => 'id',
                    'options' => ['placeholder' => 'Pilih Full Timer'],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                    'addon' => [
                        'append' => [
                            'content' => Html::button('<i class="glyphicon glyphicon-plus"></i>', [
                                'class' => 'btn btn-primary', 
                                'title' => 'Tambah baru', 
                                'data-toggle' => 'tooltip'
                            ]),
                            'asButton' => true
                        ]
                    ], 
                ]) 
            ?>
        </div>
        <div class="col-sm-6">
            <?= $form->field($model, 'tahun_masuk')->textInput(['maxlength' => true]) ?>
        </div>
    </div><!-- .row -->
    <div class="row">
        <div class="col-sm-6">
            <?= $form->field($model, 'strata_id')->widget(
                Select2::classname(), 
                [
                    'data' => ArrayHelper::map(EtcStrata::find()->orderBy('nama')->all(), 'id', 'nama'),
                    'language' => 'id',
                    'options' => ['placeholder' => 'Pilih Full Timer'],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ]) 
            ?>
        </div>
        <div class="col-sm-6">
            <?= $form->field($model, 'gelar_id')->widget(
                Select2::classname(), 
                [
                    'data' => ArrayHelper::map(EtcGelar::find()->orderBy('singkatan')->all(), 'id', 'singkatan'),
                    'language' => 'id',
                    'options' => ['placeholder' => 'Pilih Full Timer'],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                    'addon' => [
                        'append' => [
                            'content' => Html::button('<i class="glyphicon glyphicon-plus"></i>', [
                                'class' => 'btn btn-primary', 
                                'title' => 'Tambah baru', 
                                'data-toggle' => 'tooltip'
                            ]),
                            'asButton' => true
                        ]
                    ], 
                ]) 
            ?>
        </div>
    </div><!-- .row -->

    <?= $form->field($model, 'judul_thesis')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
